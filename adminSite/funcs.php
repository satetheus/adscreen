<?php

function imageCheck($target_file, $file_name, $submit) {
    // starting code from https://www.w3schools.com/php/php_file_upload.asp
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
        echo "Sorry, only JPG, JPEG, PNG, & GIF files are allowed.";
        return False;
    }

    // If all checks pass, return True
    return True;
}


function uploadImage($directory, $input_id, $submit_id) {
    $image = $directory . basename($_FILES[$input_id]["name"]);
    
    // if everything is ok, try to upload small ad
    if (imageCheck($image, $input_id, $submit_id) == True) {
        if (move_uploaded_file($_FILES[$input_id]["tmp_name"], $image)) {
            echo "The file ". basename( $_FILES[$input_id]["name"]). " has been uploaded.";
        }
        
        else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

?>