<?php
include "../displaySite/import.php";

echo '<!DOCTYPE html>
<html>
<body>';


if(isset($_GET['size'])) {
    if($_GET['size'] == 'large') {
        $images = importImages('../displaySite/img/large_ad/');
    }

    else if($_GET['size'] == 'small') {
        $images = importImages('../displaySite/img/small_ad/');
    }
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