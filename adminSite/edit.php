<?php
include "../displaySite/import.php";


echo '<!DOCTYPE html>
<html>
<body>';


if(isset($_GET['size'])) {
    $dir = '../displaySite/img/'.$_GET['size'].'_ad/';
    $image = importImages($dir)[$_GET['index']];
    $name = str_replace($dir, "", $image);
}

else {
    // Redirect if parameters are not set
    header("location: view.php");
    exit;
}

echo '<form action="" method="post" enctype="multipart/form-data">
Rename Image
<input type="text" name="fileName" value="'.$name.'" id="newName">
<input type="submit" value="Rename" name="editSubmit">
</form>'; 

if(isset($_POST['editSubmit'])) {
    // Check if file already exists
    if (file_exists($dir.$_POST['fileName'])) {
        echo "Sorry, file already exists.";
    }
    else {
        echo 'Success!';
    }
}

echo '<span><p>Delete</p></span>';

echo "<img src='".$image."'/>";

echo '
</body>
</html>';

?>