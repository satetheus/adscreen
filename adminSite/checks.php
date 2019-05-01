<?php
// starting code from https://www.w3schools.com/php/php_file_upload.asp

function imageCheck($target_file, $file_name, $submit) {
    // Check if image file is a actual image or fake image
    if(isset($_POST[$submit])) {
        $check = getimagesize($_FILES[$file_name]["tmp_name"]);
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