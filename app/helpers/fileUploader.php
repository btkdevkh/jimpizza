<?php

function fileUploader($files) {
  $allowedExt = ['jpg', 'jpeg', 'png'];

  // Upload File
  if(!empty($files['imgUrl']['name'])) {
    $fileName = $files['imgUrl']["name"];
    $fileSize = $files['imgUrl']["size"];
    $fileTmp = $files['imgUrl']["tmp_name"];
    
    $targetdDir = "../public/uploads/${fileName}";
    $fileExt = explode('.', $fileName);
    $fileExt = strtolower(end($fileExt));

    if(in_array($fileExt, $allowedExt)) {
      if($fileSize <= 1000000) {
        move_uploaded_file($fileTmp, $targetdDir);
      } else {
        return 'File too large';
      }
    } else {
      return 'Invalid file type';
    }
  } else {
    return 'Please select an image (jpg, jpeg, png) only';
  }
}
