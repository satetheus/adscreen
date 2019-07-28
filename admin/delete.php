<?php
include "../displaySite/import.php";
include "funcs.php";


echo '<!DOCTYPE html>
<html>
<body>';

list($dir, $image, $name) = set_image_vars();

echo '
<form action="" method="post" enctype="multipart/form-data">
    Are you sure you want to delete '.$name.'?
    <input type="submit" value="Delete Image" name="deleteImage">
</form>';

if(isset($_POST['deleteImage'])) {
    unlink($image) || die('Couldn\'t delete image.');
    if(!file_exists($image)) {
        echo $name.' deleted.';
        header("Location: /adscreen/adminSite/view");
    }
}

echo '
</body>
</html>';

?>