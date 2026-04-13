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
        $stmt = $mysqlConn->prepare('SELECT id, email, password FROM users WHERE email = ? LIMIT 1');
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    return null;
}

function insertUser(string $email, string $passwordHash)
{
    global $useMongo, $mongoClient, $mysqlConn;

    if ($useMongo && $mongoClient) {
        $db = $mongoClient->i_mongoDB;
        return $db->users->insertOne([
            'email' => $email,
            'password' => $passwordHash,
            'createdAt' => new MongoDB\BSON\UTCDateTime(),
        ]);
    }

    if ($mysqlConn) {
        ensureUsersTableExists();
        $stmt = $mysqlConn->prepare('INSERT INTO users (email, password) VALUES (?, ?)');
        $stmt->bind_param('ss', $email, $passwordHash);
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
        email VARCHAR(255) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

    $mysqlConn->query($createSql);
}

function redirect(string $url)
{
    header('Location: ' . $url);
    exit;
}

$action = $_REQUEST['action'] ?? '';
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!$email || !$password) {
        $message = 'Email and password are required.';
    } elseif ($action === 'signup') {
        if (getUserByEmail($email)) {
            $message = 'User already exists. Please choose a different email.';
        } else {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            if (insertUser($email, $hashedPassword)) {
                $message = 'Signup successful! You may now log in.';
            } else {
                $message = 'Signup failed. Please try again.';
            }
        }
    } elseif ($action === 'login') {
        $user = getUserByEmail($email);
        if (!$user) {
            $message = 'User not found.';
        } elseif (!password_verify($password, $user['password'])) {
            $message = 'Invalid password. Please try again.';
        } else {
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
 