<?php
include "checks.php";

$small_dir = "../displaySite/img/small_ad/";
$small_image = $small_dir . basename($_FILES["smallImage"]["name"]);

// if everything is ok, try to upload small ad
if (imageCheck($small_image, "smallImage", "submitSmall") == True) {
    if (move_uploaded_file($_FILES["smallImage"]["tmp_name"], $small_image)) {
        $_SESSION['sf_success'] = "The file ". basename( $_FILES["smallImage"]["name"]). " has been uploaded.";
    }
    
    else {
        $_SESSION['sf_success'] = "Sorry, there was an error uploading your file.";
    }
}

header('Location: index.php');
exit;

?>