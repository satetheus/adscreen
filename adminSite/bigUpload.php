<?php
include "checks.php";

$big_dir = "../displaySite/img/large_ad/";

uploadImage($big_dir, "bigImage", "submitBig", "bf_success");

header('Location: index.php');
exit;

?>