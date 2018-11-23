<html>
<head>
    <title>Scan Directories</title>
</head>
<body>
<h1>Browsing</h1>
<?php

    if(!isset($_GET['file'])){
        echo 'You have not specified a file name';
    }else{
        $uploads_dir = '/Users/chloe/Projects/Httpdocs/Corsi/phpmaster/17/interactingFileSystem';

        // strip off directory information for securety
        $the_file = basename($_GET['file']);

        $safe_file = $uploads_dir . '/' . $the_file;

        echo '<h2>Details of File: ' . $safe_file . '</h2>';

        echo '<h3>File Data</h3>';
        echo 'File Last Accessed: ' . date('j F Y H:i', fileatime($safe_file)) . '</br>'; // data di esecuzione (richiesta http del file)
        echo 'File Last Modified: ' . date('j F Y H:i', filemtime($safe_file)) . '</br>';

        $user = posix_getpwuid(fileowner($safe_file));
        echo 'File Owner: ' . $user['name'] . '</br>';

        $group = posix_getgrgid(filegroup($safe_file));
        echo 'File Owner: ' . $group['name'] . '</br>';

        echo 'File Permissions: ' . decoct(fileperms($safe_file)) . '</br>';
        echo 'File Type: ' . filetype($safe_file) . '</br>';
        echo 'File Size: ' . filesize($safe_file) . ' bytes</br>';

        echo '<h3>File Tests</h3>';
        echo 'is_dir: ' . (is_dir($safe_file) ? 'true' : 'false') . '</br>';
        echo 'is_executable: ' . (is_executable($safe_file) ? 'true' : 'false') . '</br>'; // generalmente .sh
        echo 'is_file: ' . (is_file($safe_file) ? 'true' : 'false') . '</br>';
        echo 'is_link: ' . (is_link($safe_file) ? 'true' : 'false') . '</br>';
        echo 'is_readable: ' . (is_readable($safe_file) ? 'true' : 'false') . '</br>';
        echo 'is_writable: ' . (is_writable($safe_file) ? 'true' : 'false') . '</br>';

        echo '<h3>Stats</h3>'; // se i link simbolici usare lstat()
        echo '<pre>' , var_dump(stat($safe_file)) , '</pre></br>';
    }

?>
</body>
</html>