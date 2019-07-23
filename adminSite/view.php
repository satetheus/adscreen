<?php
include "../displaySite/import.php";

$big_images = importImages('../displaySite/img/large_ad/');
$small_images = importImages('../displaySite/img/small_ad/');
$single_images = importImages('../displaySite/img/single_ad/');

echo '<!DOCTYPE html>
<html>
<body>';

echo '<h1>Large Ads</h1>';

foreach($big_images as $file) {
    $big_link = "edit.php?size=large&index=".array_search($file, $big_images);
    echo "<a href='{$big_link}'><img class='image' class='big_picture' src='{$file}'></a>";
}

echo '<h1>Small Ads</h1>';

foreach($small_images as $file) {
    $small_link = "edit.php?size=small&index=".array_search($file, $small_images);
    echo "<a href='{$small_link}'><img class='image' class='small_picture' src='{$file}'></a>";
}

echo '<h1>Single Ads</h1>';

foreach($single_images as $file) {
    $single_link = "edit.php?size=single&index=".array_search($file, $single_images);
    echo "<a href='{$single_link}'><img class='image' class='single_picture' src='{$file}'></a>";
}

echo '
</body>
</html>';

?>