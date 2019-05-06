<?php
include "../displaySite/import.php";

echo '<!DOCTYPE html>
<html>
<body>';


if(isset($_GET['size'])) {
    $dir = '../displaySite/img/'.$_GET['size'].'_ad/';
    $images = importImages($dir);
}

echo '<form action="" method="post" enctype="multipart/form-data">
Rename Image
<input type="text" name="FileName" value="New Name" id="newName">
<input type="submit" value="Rename" name="editSubmit">
</form> 
  
<span><p>Delete</p></span>';

echo "<img src='".$images[$_GET['index']]."'/>";

echo '
</body>
</html>';

?>