<?php
include "checks.php";

$small_dir = "../displaySite/img/small_ad/";

uploadImage($small_dir, 'smallImage', 'submitSmall', 'sf_success');

header('Location: index.php');
exit;

?>