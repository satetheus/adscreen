<?php

session_start();

echo '<!DOCTYPE html>
<html>
<body>

<form action="bigUpload.php" method="post" enctype="multipart/form-data">
    Select image to upload as Large Ad:
    <input type="file" name="bigImage" id="bigImage">
    <input type="submit" value="Upload Image" name="submitBig">
</form>';

if(isset($_SESSION['bf_success'])) {
    echo $_SESSION['bf_success'];
}

echo '
<form action="smallUpload.php" method="post" enctype="multipart/form-data">
    Select image to upload as Small Ad:
    <input type="file" name="smallImage" id="smallImage">
    <input type="submit" value="Upload Image" name="submitSmall">
</form>';

if(isset($_SESSION['sf_success'])) {
    echo $_SESSION['sf_success'];
}

echo '
</body>
</html>';

?>