<?php
$imageName2 =base64_decode($_GET['img']);

$imageName2=urldecode($imageName2);



$path= dirname($imageName2);



$imageName =str_replace($path."/","",$imageName2);







if (file_exists("./thumb_cache/" . $imageName)) {
  // 2592000 = 30 days
  if ( time() - filemtime("./thumb_cache/".$imageName) > 2592000 ) {
    unlink("./thumb_cache/".$imageName);
  }
}
if (!file_exists("./thumb_cache/" . $imageName)) {
  include('class.ImageResize.php');
  // if cache file does not exist then create it.
  $originalImage = new ImageResize(".".$imageName2);
  $originalImage->size_width(50);
  $originalImage->save("./thumb_cache/".$imageName);
}
