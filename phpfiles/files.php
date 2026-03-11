<?php
echo "<h2>FILE READ / WRITE</h2>";

$filename = "sample.txt";

/* fopen + fwrite */
$fp = fopen($filename, "w");
fwrite($fp, "Hello Ammu\nLearning PHP File Handling\n");
fclose($fp);

/* fread */
$fp = fopen($filename, "r");
$content = fread($fp, filesize($filename));
echo "fread(): <br>$content<br>";
fclose($fp);

/* file_get_contents */
$data = file_get_contents($filename);
echo "<br>file_get_contents(): <br>$data<br>";

/* file_put_contents */
file_put_contents("sample2.txt", "Second file created using file_put_contents");

/* file() → array of lines */
$lines = file($filename);
echo "<br>file() line by line:<br>";
print_r($lines);

echo "<h2>FILE INFORMATION</h2>";

echo "Exists: " . file_exists($filename) . "<br>";
echo "Size: " . filesize($filename) . " bytes<br>";
echo "Type: " . filetype($filename) . "<br>";
echo "Access Time: " . date("Y-m-d H:i:s", fileatime($filename)) . "<br>";
echo "Modified Time: " . date("Y-m-d H:i:s", filemtime($filename)) . "<br>";
echo "Created Time: " . date("Y-m-d H:i:s", filectime($filename)) . "<br>";
echo "Permissions: " . fileperms($filename) . "<br>";
echo "Owner: " . fileowner($filename) . "<br>";
echo "Group: " . filegroup($filename) . "<br>";
echo "Inode: " . fileinode($filename) . "<br>";

echo "<h2>FILE & FOLDER MANAGEMENT</h2>";

copy("sample.txt", "copy.txt");
echo "File copied<br>";

rename("copy.txt", "renamed.txt");
echo "File renamed<br>";

if(is_file("renamed.txt"))
    echo "renamed.txt is a file<br>";

mkdir("testFolder");
echo "Folder created<br>";

if(is_dir("testFolder"))
    echo "testFolder is directory<br>";

unlink("renamed.txt");
echo "File deleted<br>";

rmdir("testFolder");
echo "Folder deleted<br>";

echo "<h2>DIRECTORY HANDLING</h2>";

echo "Current Directory: " . getcwd() . "<br>";

echo "<br>scandir():<br>";
print_r(scandir("."));

echo "<br>Using opendir() + readdir():<br>";

$dir = opendir(".");
while(($file = readdir($dir)) !== false){
    echo $file . "<br>";
}
closedir($dir);

/* change directory */
mkdir("newDir");
chdir("newDir");
echo "<br>Changed Directory: " . getcwd() . "<br>";

chdir("..");
rmdir("newDir");
echo "<h2>FILE LOCKING</h2>";

$fp = fopen("lockfile.txt", "w");

if(flock($fp, LOCK_EX)){
    fwrite($fp, "Writing safely with lock");
    flock($fp, LOCK_UN);
    echo "File written with lock<br>";
}

fclose($fp);
?>
