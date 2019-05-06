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

echo '
<form action="" method="post" enctype="multipart/form-data">
    Are you sure you want to delete '.$name.'?
    <input type="submit" value="Delete Image" name="deleteImage">
</form>';

if(isset($_POST['deleteImage'])) {
    unlink($image) || die('Couldn\'t delete image.');
    if(!file_exists($image)) {
        echo $name.' deleted.';
    }
}

echo '
</body>
</html>';

?>