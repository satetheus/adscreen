<?php
include "funcs.php";

session_start();

if(!isset($_SESSION['auth'])) {
    header("Location: /admin/pass");
}

elseif($_SESSION['auth'] != true) {
    header("Location: /admin/pass");
}

echo '<!DOCTYPE html>
<html>
<body>
<h2>Upload Images</h2>
<form action="" method="post" enctype="multipart/form-data">
    <strong>Large Ad Upload:<strong>
    <input type="file" name="bigImage" id="bigImage">
    <input type="submit" value="Upload Image" name="submitBig">
</form>';

if(isset($_POST["submitBig"])) {
    $big_dir = "../displaySite/img/large_ad/";
    uploadImage($big_dir, "bigImage", "submitBig");
}

echo '
<form action="" method="post" enctype="multipart/form-data">
    <strong>Small Ad Upload:<strong>
    <input type="file" name="smallImage" id="smallImage">
    <input type="submit" value="Upload Image" name="submitSmall">
</form>';

if(isset($_POST["submitSmall"])) {
    $small_dir = "../displaySite/img/small_ad/";
    uploadImage($small_dir, 'smallImage', 'submitSmall');
}

echo '
<form action="" method="post" enctype="multipart/form-data">
    <strong>Single Ad Upload:<strong>
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

echo "<br><br><h2>Set Rotation Times</h2><h4>(numbers are in seconds)</h4>
<form action='' method='post'>
    <label for='adrot-large'>Large ad rotation:</label>
        <input type='number' name='adrot-large' min='1' max='3600' value='{$rotLarge}' required>
    <br>
    <label for='adrot-small'>Small ad rotation:</label>
        <input type='number' name='adrot-small' min='1' max='3600' value='{$rotSmall}' required>
    <br>
    <label for='adrot-single'>Single ad rotation:</label>
        <input type='number' name='adrot-single' min='1' max='3600' value='{$rotSingle}' required>
    <br>
  <input type='submit' value='Set rotation' name='rotSet'>
</form>";

if(isset($_POST["rotSet"])) {
    $newRotSettings = array('largeRot' => $_POST["adrot-large"]*1000, 
                         'smallRot' => $_POST["adrot-small"]*1000,
                         'singleRot' => $_POST["adrot-single"]*1000);
    $rotSettings = array_replace($rotSettings, $newRotSettings);
}

echo '
<br><h2>Set ad viewing mode</h2>
<form action="" method="post">
  <input type="radio" name="mode" value="multi"';

if($rotSettings['mode']=="multi") {echo ' checked="checked" ';}

echo 'required>Multi-ad
<input type="radio" name="mode" value="single"';

if($rotSettings['mode']=='single') {echo ' checked="checked" ';}

echo 'required>Single ad
<input type="submit" value="Set Mode" name="modeSet">
</form>';

if(isset($_POST['modeSet'])) {
    $modeSettings = array('mode' => $_POST['mode']);
    $rotSettings = array_replace($rotSettings, $modeSettings);
}

file_put_contents('../settings.json', json_encode($rotSettings));

echo '
<br>
<h2>View Images on Display</h2>
<form action="view.php" method="get" enctype="multipart/form-data">
  <input type="submit" value="View Images">
</form>';

echo '
<br>
<h2>View Display Website</h2>
<form action="../displaySite/index.php" method="get" enctype="multipart/form-data">
  <input type="submit" value="View Website">
</form>';

echo '
</body>
</html>';

?>