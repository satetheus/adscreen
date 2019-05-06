<?php
include "funcs.php";


echo '<!DOCTYPE html>
<html>
<body>

<form action="" method="post" enctype="multipart/form-data">
    Select image to upload as Large Ad:
    <input type="file" name="bigImage" id="bigImage">
    <input type="submit" value="Upload Image" name="submitBig">
</form>';

if(isset($_POST["submitBig"])) {
    $big_dir = "../displaySite/img/large_ad/";
    uploadImage($big_dir, "bigImage", "submitBig");
}

echo '
<form action="" method="post" enctype="multipart/form-data">
    Select image to upload as Small Ad:
    <input type="file" name="smallImage" id="smallImage">
    <input type="submit" value="Upload Image" name="submitSmall">
</form>';

if(isset($_POST["submitSmall"])) {
    $small_dir = "../displaySite/img/small_ad/";
    uploadImage($small_dir, 'smallImage', 'submitSmall');
}


echo '<form action="view.php" method="get" enctype="multipart/form-data">
  <input type="submit" value="View all images on display">
</form>';

echo '
</body>
</html>';

?>