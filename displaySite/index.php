<?php
include "import.php";

$big_images = importImages('img/large_ad/');
$small_images = importImages('img/small_ad/');

echo "
<!doctype html>
<html>
  <head>
    <meta charset='utf-8'>
    <title>Ad Test</title>
    <meta name='viewport' content='width=device-width', initial-scale='1'>
    <meta name='description' content=''>
    <link rel='stylesheet' href='css/app.css'>
  </head>
  <body>
      <img class='large_image' id='big_picture' src='{$big_images[0]}'>

      <img class='small_image' id='small_top_ad' src='{$small_images[1]}'>

      <img class='small_image' id='small_bottom_ad' src='{$small_images[0]}'>

    <script src='js/app.js'></script>
  </body>
</html>
";

?>

<script type="text/javascript">
var big_images = <?php echo json_encode($big_images) ?>;
var small_images = <?php echo json_encode($small_images) ?>;
</script>
