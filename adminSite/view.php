<?php
include "../displaySite/import.php";

$big_images = importImages('../displaySite/img/large_ad/');
$small_images = importImages('../displaySite/img/small_ad/');

echo '<!DOCTYPE html>
<html>
<body>';

echo '<h1>Large Ads</h1>';

foreach($big_images as $file) {
    echo "<img class='image' class='big_picture' src='{$file}'>";
}

echo '<h1>Small Ads</h1>';

foreach($small_images as $file) {
    echo "<img class='image' class='small_picture' src='{$file}'>";
}

echo '
</body>
</html>';

?>