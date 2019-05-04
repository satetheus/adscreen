<?php

function importImages($location) {
    $pic_dir = $location;
    $images = array();
    
    foreach(array_filter(glob($pic_dir.'*.*'), 'is_file') as $file) {
        array_push($images, $file);
    }

    return $images;
}

?>