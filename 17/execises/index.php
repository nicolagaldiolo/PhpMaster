<!-- 1 Modify the following HTML form code to set the maximum file size that can be uploaded to the PHP server. -->

<!-- Funziona solo se il MAX_FILE_SIZE è più piccolo delle direttive upload_max_filesize e post_max_size
<form>
    <input type="hidden" name="MAX_FILE_SIZE" value=" 1000000">
</form>
-->


<!-- 2 Modify the following form input field to allow for multiple uploaded files. -->
<!--<input type="file" name="the_files___[]" id="the_files"/>-->


<!-- 3 Modify the following code to employ a function that allows you to open a directory for reading. Do not use fopen(). -->
<?php
    $dir = opendir("/Users/chloe/Projects/Httpdocs/Corsi/phpmaster/17");

    while (false !== ($file = readdir($dir))){
        echo '<pre>' . $file . '</pre>' . PHP_EOL;
    }
?>

<!-- 4 Which PHP function gives an indication of how much space is left for uploads on your PHP server? -->


<?php
    echo disk_free_space('/Users/chloe/Projects/Httpdocs/Corsi/phpmaster/17');
    // torna lo spazio dispobile sul disco a cui questa cartella appartiene
?>

<!-- 5 Use the Unix chmod function to set the permissions on somefile.txt to 0777. -->

<?php

$file = "somefile.txt";
touch( $file);
chmod($file, 0777);



