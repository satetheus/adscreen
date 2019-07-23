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

echo '
<form action="" method="post" enctype="multipart/form-data">
    Select image to upload as Single Ad:
    <input type="file" name="singleImage" id="singleImage">
    <input type="submit" value="Upload Image" name="submitSingle">
</form>';

if(isset($_POST["submitSingle"])) {
    $single_dir = "../displaySite/img/single_ad/";
    uploadImage($single_dir, 'singleImage', 'submitSingle');
}

$rotSettings = json_decode(file_get_contents("../settings.json"), true);
$rotLarge = $rotSettings['largeRot']/1000;
$rotSmall = $rotSettings['smallRot']/1000;
$rotSingle = $rotSettings['singleRot']/1000;

echo "
<form action='' method='post'>
    <label for='adrot-large'>Large ad rotation</label>
        <input type='number' name='adrot-large' min='1' max='3600' value='{$rotLarge}' required>

    <label for='adrot-small'>Small ad rotation</label>
        <input type='number' name='adrot-small' min='1' max='3600' value='{$rotSmall}' required>

    <label for='adrot-single'>Single ad rotation</label>
        <input type='number' name='adrot-single' min='1' max='3600' value='{$rotSingle}' required>

  <input type='submit' value='Set rotation' name='rotSet'>
</form>";

if(isset($_POST["rotSet"])) {
    $rotSettings = array('largeRot' => $_POST["adrot-large"]*1000, 
                         'smallRot' => $_POST["adrot-small"]*1000,
                         'singleRot' => $_POST["adrot-single"]*1000);
}

echo '
<form action="" method="post">
  <input type="radio" name="mode" value="multi" required>Multi-ad
  <input type="radio" name="mode" value="single" required>Single ad
  <input type="submit" value="Set Mode" name="modeSet">
</form>';

if(isset($_POST['modeSet'])) {
    $modeSettings = array('mode' => $_POST['mode']);
    $rotSettings = array_replace($rotSettings, $modeSettings);
}

file_put_contents('../settings.json', json_encode($rotSettings));

echo '<form action="view.php" method="get" enctype="multipart/form-data">
  <input type="submit" value="View all images on display">
</form>';

echo '
</body>
</html>';

?>