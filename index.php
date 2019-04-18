<?php

$big_pic_dir = 'img/large_ad/';
$big_images = array();

$small_pic_dir = 'img/small_ad/';
$small_images = array();

foreach(array_filter(glob($big_pic_dir.'*.*'), 'is_file') as $file) {
    array_push($big_images, $file);
}

foreach(array_filter(glob($small_pic_dir.'*.*'), 'is_file') as $file) {
    array_push($small_images, $file);
}

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
    <div class='large_ads'>
      <img class='image' id='big_picture' src='{$big_images[0]}'>
    </div>

    <div class='subad_1'>
      <img class='image' id='small_top_ad' src='{$small_images[0]}'>
    </div>

    <div class='subad_2'>
      <img class='image' id='small_bottom_ad' src='{$small_images[0]}'>
    </div>

    <script src='js/app.js'></script>
  </body>
</html>
";

?>

<script type="text/javascript">
var big_images = <?php echo json_encode($big_images) ?>;
var small_images = <?php echo json_encode($small_images) ?>;
</script>
