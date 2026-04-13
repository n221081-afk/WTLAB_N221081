<?php
session_start();

$useMongo = false;
$mongoLoaded = false;
$mysqlLoaded = false;
$mongoClient = null;
$mysqlConn = null;

$vendorAutoload = __DIR__ . '/vendor/autoload.php';
if (file_exists($vendorAutoload)) {
    require_once $vendorAutoload;

    try {
        $mongoClient = new MongoDB\Client('mongodb://localhost:27017');
        $mongoLoaded = true;
        $useMongo = true;
    } catch (Throwable $e) {
        $mongoLoaded = false;
        $useMongo = false;
    }
}

if (!$mongoLoaded) {
    require_once __DIR__ . '/db.php';
    $mysqlConn = $conn ?? null;
    if (!$mysqlConn) {
        die('MySQL connection failed.');
    }
    $mysqlLoaded = true;
    $useMongo = false;
}

function getUserByEmail(string $email)
{
    global $useMongo, $mongoClient, $mysqlConn;

    if ($useMongo && $mongoClient) {
        $db = $mongoClient->i_mongoDB;
        return $db->users->findOne(['email' => $email]);
    }

    if ($mysqlConn) {
        $stmt = $mysqlConn->prepare('SELECT id, full_name, username, email, password FROM users WHERE email = ? LIMIT 1');
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    return null;
}

function insertUser(string $email, string $fullName, string $username, string $passwordHash)
{
    global $useMongo, $mongoClient, $mysqlConn;

    if ($useMongo && $mongoClient) {
        $db = $mongoClient->i_mongoDB;
        return $db->users->insertOne([
            'full_name' => $fullName,
            'username' => $username,
            'email' => $email,
            'password' => $passwordHash,
            'createdAt' => new MongoDB\BSON\UTCDateTime(),
        ]);
    }

    if ($mysqlConn) {
        ensureUsersTableExists();
        $stmt = $mysqlConn->prepare('INSERT INTO users (full_name, username, email, password) VALUES (?, ?, ?, ?)');
        $stmt->bind_param('ssss', $fullName, $username, $email, $passwordHash);
        return $stmt->execute();
    }

    return false;
}

function ensureUsersTableExists()
{
    global $mysqlConn;
    if (!$mysqlConn) {
        return;
    }

    $createSql = "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        full_name VARCHAR(255) NOT NULL,
        username VARCHAR(100) NOT NULL UNIQUE,
        email VARCHAR(255) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

    $mysqlConn->query($createSql);

    $columnCheck = $mysqlConn->query("SHOW COLUMNS FROM users LIKE 'full_name'");
    if ($columnCheck && $columnCheck->num_rows === 0) {
        $mysqlConn->query("ALTER TABLE users ADD COLUMN full_name VARCHAR(255) NOT NULL DEFAULT ''");
    }

    $columnCheck = $mysqlConn->query("SHOW COLUMNS FROM users LIKE 'username'");
    if ($columnCheck && $columnCheck->num_rows === 0) {
        $mysqlConn->query("ALTER TABLE users ADD COLUMN username VARCHAR(100) NOT NULL DEFAULT ''");
    }
}

function cleanInput(string $value): string
{
    return trim(htmlspecialchars(stripslashes($value), ENT_QUOTES, 'UTF-8'));
}

function formatName(string $name): string
{
    return ucwords(strtolower(trim($name)));
}

function formatUsername(string $username): string
{
    return strtolower(trim($username));
}

function redirect(string $url)
{
    header('Location: ' . $url);
    exit;
}

$action = $_REQUEST['action'] ?? '';
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$fullName = cleanInput($_POST['full_name'] ?? '');
$username = cleanInput($_POST['username'] ?? '');
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($action === 'signup') {
        if (!$email || !$password || !$fullName || !$username) {
            die('All signup fields are required. Please provide full name, username, email, and password.');
        }

        $email = strtolower($email);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            die('Please enter a valid email address.');
        }

        if (strlen($password) < 8) {
            die('Password must be at least 8 characters long.');
        }

        if (strlen($fullName) < 3 || strlen($fullName) > 50) {
            die('Full name must be between 3 and 50 characters.');
        }

        if (strlen($username) < 4 || strlen($username) > 30) {
            die('Username must be between 4 and 30 characters.');
        }

        if (strpos($username, ' ') !== false) {
            die('Username cannot contain spaces.');
        }

        $formattedFullName = formatName($fullName);
        $formattedUsername = formatUsername($username);

        if (getUserByEmail($email)) {
            die('User already exists. Please choose a different email.');
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        if (insertUser($email, $formattedFullName, $formattedUsername, $hashedPassword)) {
            $message = 'Signup successful! You may now log in.';
        } else {
            die('Signup failed. Please try again later.');
        }
    } elseif ($action === 'login') {
        if (!$email || !$password) {
            die('Email and password are required.');
        }

        $email = strtolower($email);
        $user = getUserByEmail($email);
        if (!$user) {
            die('User not found.');
        }

        if (!password_verify($password, $user['password'])) {
            print('Invalid password. Please try again.');
        } else {
            if (strcasecmp($user['email'], $email) === 0) {
                echo 'Email comparison is case-insensitive and valid.<br>';
            }
            $_SESSION['user'] = $user['email'];
            redirect('?action=dashboard');
        }
    }
}

if ($action === 'logout') {
    session_destroy();
    redirect('?action=login');
}

if ($action === 'dashboard') {
    if (empty($_SESSION['user'])) {
        redirect('?action=login');
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
    </head>
    <body>
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION['user'], ENT_QUOTES, 'UTF-8'); ?></h1>
        <p>You are logged in successfully.</p>
        <p><a href="?action=logout">Logout</a></p>
    </body>
    </html>
    <?php
    exit;
}

$formAction = $action === 'signup' ? 'signup' : 'login';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $formAction === 'signup' ? 'Sign Up' : 'Login'; ?></title>
</head>
<body>
    <h1><?php echo $formAction === 'signup' ? 'Sign Up' : 'Login'; ?></h1>
    <?php if ($message): ?>
        <div style="color: red;"><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></div>
    <?php endif; ?>
    <form method="post" action="?action=<?php echo $formAction; ?>">
        <?php if ($formAction === 'signup'): ?>
            <label>Full Name:<br>
                <input type="text" name="full_name" value="<?php echo htmlspecialchars($fullName, ENT_QUOTES, 'UTF-8'); ?>" required>
            </label>
            <br><br>
            <label>Username:<br>
                <input type="text" name="username" value="<?php echo htmlspecialchars($username, ENT_QUOTES, 'UTF-8'); ?>" required>
            </label>
            <br><br>
        <?php endif; ?>
        <label>Email:<br>
            <input type="email" name="email" value="<?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>" required>
        </label>
        <br><br>
        <label>Password:<br>
            <input type="password" name="password" required>
        </label>
        <br><br>
        <button type="submit"><?php echo $formAction === 'signup' ? 'Sign Up' : 'Login'; ?></button>
    </form>
    <p>
        <?php if ($formAction === 'signup'): ?>
            Already have an account? <a href="?action=login">Login</a>
        <?php else: ?>
            Need an account? <a href="?action=signup">Sign Up</a>
        <?php endif; ?>
    </p>
</body>
</html>
 