<?php
// starting code from https://www.w3schools.com/php/php_file_upload.asp

$big_dir = "../displaySite/img/large_ad/";
$big_image = $big_dir . basename($_FILES["bigImage"]["name"]);

$small_dir = "../displaySite/img/small_ad";
$small_image = $small_dir . basename($_FILES["smallImage"]["name"]);

// if everything is ok, try to upload file
if (imageCheck($big_image, "bigImage") == True) {
    if (move_uploaded_file($_FILES["bigImage"]["tmp_name"], $big_image)) {
        echo "The file ". basename( $_FILES["bigImage"]["name"]). " has been uploaded.";
    }
    
    else {
        echo "Sorry, there was an error uploading your file.";
    }
}


function imageCheck($target_file, $file_name) {
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES[$file_name]["tmp_name"]); //To-Do: Update bigImage to a variable?
        if($check == false) {
            echo "File is not an image.";
            return False;
        }
    }
    
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        return False;
    }
    
    // Check file size
    if ($_FILES[$file_name]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        return False;
    }
    
    // Allow certain file formats
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if(!in_array($imageFileType, array("jpg", "png","jpeg", "gif"))) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        return False;
    }

    // If all checks pass, return True
    return True;
}


?>