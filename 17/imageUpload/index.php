<html>
<head>
  <title>Upload a File</title>
  <style>
    .replicable {
      padding: 10px;
      border-bottom: 1px solid #999;
    }
    
    .replicable a {
      background: #999;
      padding: 10px;
      color: #fff;
      text-decoration: none;
      margin-left: 10px;
      display: inline-block;
    }
    
    form input[type="submit"] {
      display: block;
      margin-top: 20px;
      background: #000;
      border: 0;
      padding: 10px;
      color: #fff;
    }
  </style>
</head>
<body>
<h1>Upload a file</h1>
<form id="uploadFile" action="upload.php" method="POST" enctype="multipart/form-data">
  <!-- Imposta la dimensione massima che devono avere SINGOLARMENTE i file, sovrascrive il parametro
  upload_max_filesize del php.ini solo se MAX_FILE_SIZE è più basso -->
  <!--<input type="hidden" name="MAX_FILE_SIZE" value="2000000"/>-->
  <div class="replicable">
      <input type="hidden" value="myForm" name="<?php echo ini_get("session.upload_progress.name"); ?>">
    <input type="file" name="the_file[]">
    <a href="#" data-action="add">+</a>
    <a href="#" data-action="remove">-</a>
  </div>
  <input type="submit" value="Upload File"/>
</form>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function () {
    $('.replicable').find('a').click(function (e) {
      var parent = $(this).parent();
      switch (e.target.dataset.action) {
        case 'add':
          parent.clone(true, true).insertAfter(parent).find(":input").val('');
          break;
        case 'remove':
          if ($('.replicable').length > 1) {
            parent.remove();
          }
          break;
      }
    });
    
  })
</script>
</body>
</html>