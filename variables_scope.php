<?php
session_start();

$projectName = "PHP Login & Registration Lab";
$integerValue = 12;
$floatValue = 9.75;
$booleanValue = true;
$arrayValue = ["PHP", "HTML", "CSS", "JavaScript"];

function localScopeExample()
{
    $localValue = "This text is only available inside localScopeExample().";
    echo "<p><strong>Local Scope:</strong> $localValue</p>";
}

function globalScopeExample()
{
    global $projectName, $integerValue;
    $integerValue += 5;
    echo "<p><strong>Global Scope:</strong> Project = " . htmlspecialchars($projectName, ENT_QUOTES, 'UTF-8') . ", count = $integerValue</p>";
}

function staticScopeExample()
{
    static $counter = 0;
    $counter++;
    echo "<p><strong>Static Scope:</strong> This function has been called $counter time(s) in this request.</p>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variables & Scope</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <section class="section">
        <div class="card">
            <h1>PHP Variables & Scope</h1>
            <p>This page demonstrates PHP datatypes and scope behavior in the same project folder.</p>

            <h2>PHP Datatypes</h2>
            <p><strong>String:</strong> <?php echo htmlspecialchars($projectName, ENT_QUOTES, 'UTF-8'); ?></p>
            <p><strong>Integer:</strong> <?php echo $integerValue; ?></p>
            <p><strong>Float:</strong> <?php echo $floatValue; ?></p>
            <p><strong>Boolean:</strong> <?php echo $booleanValue ? 'true' : 'false'; ?></p>
            <p><strong>Array:</strong> <?php echo htmlspecialchars(implode(', ', $arrayValue), ENT_QUOTES, 'UTF-8'); ?></p>

            <h2>Scope Examples</h2>
            <?php
            localScopeExample();
            globalScopeExample();
            staticScopeExample();
            staticScopeExample();
            staticScopeExample();
            ?>

            <h3>How static works</h3>
            <p>The static counter above keeps its value across repeated calls inside the same page request.</p>

            <p><a href="HomePage.html" class="btn-secondary">Back to Homepage</a>
            <a href="string_functions.php" class="btn-primary">Go to String Functions</a></p>
        </div>
    </section>
</body>
</html>
