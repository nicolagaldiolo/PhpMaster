<?php
  function reArrayFiles($file_post) {
    
    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);
    
    for ($i=0; $i<$file_count; $i++) {
      foreach ($file_keys as $key) {
        $file_ary[$i][$key] = (is_array($file_post[$key])) ?
          $file_post[$key][$i] :
          $file_post[$key];
      }
    }
    return $file_ary;
  }
  
  if(!empty($_FILES)){
    $result = "";
    
    try{
  
      $files = reArrayFiles($_FILES['the_file']);
      
      if(!empty($files)){
        foreach ($files as $item) {
          // controllo se trovo errori
          if ($item['error'] > 0) { // constant: UPLOAD_ERROR_OK
            switch ($item['error']) {
              case 1:  // or constant: UPLOAD_ERR_INI_SIZE
                throw new Exception('File exceeded upload_max_filesize.');
              case 2: // or constant: UPLOAD_ERR_FORM_SIZE - means that the size of the uploaded file exceeds the maximum value specified in the HTML form in the MAX_FILE_SIZE element.
                throw new Exception('File exceeded max_file_size.');
              case 3: // or constant: UPLOAD_ERR_PARTIAL
                throw new Exception('File only partially uploaded.');
              case 4: // or constant: UPLOAD_ERR_NO_FILE
                throw new Exception('No file uploaded.');
              case 6: // or constant: UPLOAD_ERR_NO_TMP_DIR
                throw new Exception('Cannot upload file: No temp directory specified.');
              case 7: // or constant: UPLOAD_ERR_CANT_WRITE
                throw new Exception('Upload failed: Cannot write to disk.');
              case 8: // or constant: UPLOAD_ERR_EXTENSION
                throw new Exception('A PHP extension blocked the file upload.');
            }
          }
          
          // Controllo se il file ha il corretto MIME type
          if ($item['type'] != 'image/png' && $item['type'] != 'image/jpeg') {
            throw new Exception('File is not a Permitted format (PNG or JPEG)');
          }
          
          // Controllo se il file è stato creato nella cartella temporanea
          if (is_uploaded_file($item['tmp_name'])) {
            $folder_path = $_SERVER['DOCUMENT_ROOT'] . '/17/imageUpload/uploads/'; // definisco il path della nuova cartella uploads
            
            // Se non esiste la cartella la creo
            if (!file_exists($folder_path)) {
              mkdir($folder_path, 0777);
            }
            
            $uploaded_file = $folder_path . $item['name']; // dichiaro la nuova posizione dove risiederà il file
            
            // Sposto il file nella nuova cartella e ne verifico la riuscita
            if (!move_uploaded_file($item['tmp_name'], $uploaded_file)) {
              throw new Exception('Could not move file to destination directory.');
            } else {
              $result .= '<img src="/17/imageUpload/uploads/' . $item['name'] . '">';
            }
          } else {
            throw new Exception('Possible file upload attack. Filename: ' . $item['name']);
          }
        }
      }
      
    }catch (Exception $e){
      $result = "Problem: ,  {$e->getMessage()}";
    }
  }
  
?>

<html>
<head>
  <title>Uploading...</title>
  <style>
    img{
      width: 200px;
      display: block;
      margin: 0 0 10px 0;
    }
  </style>
</head>
<body>
<h1>Uploading File...</h1>
<?php echo $result ?>
</body>
</html>