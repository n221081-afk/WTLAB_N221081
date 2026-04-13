<?php
session_start();

$hardcodedString = "   Hello PHP String Functions Lab!   ";
$userInput = trim($_POST['user_string'] ?? '');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $userInput === '') {
    die('Please enter a string to analyze.');
}

$sourceString = $userInput !== '' ? $userInput : $hardcodedString;
$cleanedString = trim($sourceString);
$wordCount = str_word_count($sourceString);
$reversed = strrev($sourceString);
$upper = strtoupper($sourceString);
$lower = strtolower($sourceString);
$firstUpper = ucfirst(trim($sourceString));
$wordsUpper = ucwords(trim($sourceString));
$searchTerm = 'PHP';
$position = strpos($sourceString, $searchTerm);
$replaced = str_replace('PHP', 'PHP-LAB', $sourceString);
$substring = substr($sourceString, 0, 20);
$ltrimmed = ltrim($sourceString);
$rtrimmed = rtrim($sourceString);
$compare = strcmp($sourceString, $hardcodedString);
$compareIgnore = strcasecmp($sourceString, $hardcodedString);
$secureOutput = htmlspecialchars($sourceString, ENT_QUOTES, 'UTF-8');
$escapedOutput = addslashes($sourceString);

$sessionUser = $_SESSION['user'] ?? 'Not logged in';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String Functions</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <section class="section">
        <div class="card">
            <h1>PHP String Functions</h1>
            <p>Outputs below use both hardcoded strings and logged-in user input where available.</p>

            <p><strong>Logged-in Email / Input Source:</strong> <?php echo htmlspecialchars($sessionUser, ENT_QUOTES, 'UTF-8'); ?></p>
            <p><strong>String source:</strong> <?php echo htmlspecialchars($sourceString, ENT_QUOTES, 'UTF-8'); ?></p>

            <h2>Function Results</h2>
            <p><strong>strlen():</strong> <?php echo strlen($sourceString); ?></p>
            <p><strong>str_word_count():</strong> <?php echo $wordCount; ?></p>
            <p><strong>strrev():</strong> <?php echo htmlspecialchars($reversed, ENT_QUOTES, 'UTF-8'); ?></p>
            <p><strong>strtoupper():</strong> <?php echo htmlspecialchars($upper, ENT_QUOTES, 'UTF-8'); ?></p>
            <p><strong>strtolower():</strong> <?php echo htmlspecialchars($lower, ENT_QUOTES, 'UTF-8'); ?></p>
            <p><strong>ucfirst():</strong> <?php echo htmlspecialchars($firstUpper, ENT_QUOTES, 'UTF-8'); ?></p>
            <p><strong>ucwords():</strong> <?php echo htmlspecialchars($wordsUpper, ENT_QUOTES, 'UTF-8'); ?></p>
            <p><strong>strpos() for "<?php echo htmlspecialchars($searchTerm, ENT_QUOTES, 'UTF-8'); ?>":</strong> <?php echo ($position === false ? 'Not found' : $position); ?></p>
            <p><strong>str_replace():</strong> <?php echo htmlspecialchars($replaced, ENT_QUOTES, 'UTF-8'); ?></p>
            <p><strong>substr():</strong> <?php echo htmlspecialchars($substring, ENT_QUOTES, 'UTF-8'); ?></p>
            <p><strong>trim():</strong> <?php echo htmlspecialchars($cleanedString, ENT_QUOTES, 'UTF-8'); ?></p>
            <p><strong>ltrim():</strong> <?php echo htmlspecialchars($ltrimmed, ENT_QUOTES, 'UTF-8'); ?></p>
            <p><strong>rtrim():</strong> <?php echo htmlspecialchars($rtrimmed, ENT_QUOTES, 'UTF-8'); ?></p>
            <p><strong>strcmp() vs hardcoded:</strong> <?php echo $compare; ?></p>
            <p><strong>strcasecmp() vs hardcoded:</strong> <?php echo $compareIgnore; ?></p>
            <p><strong>htmlspecialchars():</strong> <?php echo $secureOutput; ?></p>
            <p><strong>addslashes():</strong> <?php echo htmlspecialchars($escapedOutput, ENT_QUOTES, 'UTF-8'); ?></p>

            <h2>Try your own string</h2>
            <form method="post" action="string_functions.php">
                <textarea name="user_string" rows="4" placeholder="Type a string and press Analyze..."><?php echo htmlspecialchars($userInput, ENT_QUOTES, 'UTF-8'); ?></textarea>
                <br><br>
                <button class="btn-primary" type="submit">Analyze String</button>
            </form>

            <p><a href="HomePage.html" class="btn-secondary">Back to Homepage</a>
            <a href="variables_scope.php" class="btn-primary">Go to Variables & Scope</a></p>
        </div>
    </section>
</body>
</html>
