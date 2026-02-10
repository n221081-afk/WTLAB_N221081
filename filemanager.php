<?php
$uploadDir = "uploads/";

/* CREATE FOLDER IF NOT EXISTS */
if(!is_dir($uploadDir)){
    mkdir($uploadDir);
}

/* DELETE */
if(isset($_GET['delete'])){
    unlink($uploadDir.$_GET['delete']);
}

/* UPLOAD */
if(isset($_POST['upload'])){
    move_uploaded_file($_FILES['file']['tmp_name'],
                       $uploadDir.$_FILES['file']['name']);
}
?>

<h2>Mini File Manager</h2>

<!-- Upload -->
<form method="post" enctype="multipart/form-data">
    <input type="file" name="file" required>
    <button name="upload">Upload</button>
</form>

<hr>

<h3>Uploaded Files</h3>

<table border="1" cellpadding="8">
<tr>
    <th>Name</th>
    <th>Size (KB)</th>
    <th>Last Modified</th>
    <th>Download</th>
    <th>Delete</th>
</tr>

<?php
$files = scandir($uploadDir);

foreach($files as $f){

    if($f=="." || $f=="..") continue;

    $path = $uploadDir.$f;

    echo "<tr>";
    echo "<td>$f</td>";
    echo "<td>".round(filesize($path)/1024,2)."</td>";
    echo "<td>".date("Y-m-d H:i:s", filemtime($path))."</td>";
    echo "<td><a href='$path' download>Download</a></td>";
    echo "<td><a href='?delete=$f'>Delete</a></td>";
    echo "</tr>";
}
?>
</table>
