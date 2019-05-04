<?php
include "../displaySite/import.php";

$big_images = importImages('../displaySite/img/large_ad/');
$small_images = importImages('../displaySite/img/small_ad/');

echo '<!DOCTYPE html>
<html>
<body>';


foreach($big_images as $file) {
    echo "<img class='image' id='big_picture' src='{$file}'>";
}

echo '
</body>
</html>';

?>