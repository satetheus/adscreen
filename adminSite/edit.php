<?php
include "../displaySite/import.php";
include "funcs.php";


echo '<!DOCTYPE html>
<html>
<body>';

list($dir, $image, $name) = set_image_vars();

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
        rename($image, $dir.$_POST['fileName']);
        if (file_exists($dir.$_POST['fileName'])) {
            echo 'Success, file renamed to '.$_POST['fileName'];
        }
        else {
            echo 'Upload Failed';
        }
    }
}

echo '<a href="delete.php?size='.$_GET['size'].'&index='.$_GET['index'].'"><span><p>Delete</p></span></a>';

echo "<img src='".$image."'/>";

echo '
</body>
</html>';

?>