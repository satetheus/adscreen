<?php
include "checks.php";

$big_dir = "../displaySite/img/large_ad/";
$big_image = $big_dir . basename($_FILES["bigImage"]["name"]);

// if everything is ok, try to upload large ad
if (imageCheck($big_image, "bigImage", "submitBig") == True) {
    if (move_uploaded_file($_FILES["bigImage"]["tmp_name"], $big_image)) {
        $_SESSION['bf_success'] = "The file ". basename( $_FILES["bigImage"]["name"]). " has been uploaded.";
    }
    
    else {
        $_SESSION['bf_success'] = "Sorry, there was an error uploading your file.";
    }
}

header('Location: index.php');
exit;

?>