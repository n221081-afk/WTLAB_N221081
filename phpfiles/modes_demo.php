<?php
echo "<h2>FILE MODES DEMO</h2>";

$file = "modefile.txt";

/* w */
$fp = fopen($file, "w");
fwrite($fp, "Hello\n");
fclose($fp);

/* a */
$fp = fopen($file, "a");
fwrite($fp, "Appended line in the existed file \n");
fclose($fp);

/* r */
$fp = fopen($file, "r");
echo "<pre>".fread($fp, filesize($file))."</pre>";
fclose($fp);

/* r+ */
$fp = fopen($file, "r+");
fwrite($fp, "START-");
fclose($fp);

/* a+ */
$fp = fopen($file, "a+");
fwrite($fp, "END");
fclose($fp);

/* x (fails if exists) */
if(!file_exists("newfile.txt")){
    fopen("newfile.txt","x");
    echo "newfile created<br>";
}
?>
 