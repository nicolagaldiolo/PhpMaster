<?php

//1. Edit the following code to get the IP address of the $host host.

// Check the Url
$url = parse_url($url);
$ip = gethostbyname($url['host']);

//2. Edit the following code to obtain the host part of the user's email address.

$email = explode('@', $email);
$emailhost = $email[1];

//3. Edit the following code to handle the condition of a failed FTP connection attempt.

$conn = ftp_connect($host);
if (!$conn) {
  echo 'Error: Could not connect to '.$host;
  exit;
}
echo 'Connected to '.$host.'<br />';

//4. Edit the following code to ensure FTP passive mode is used in your PHP script.

ftp_pasv($conn, true);

//5. Edit the following code to obtain the modification time of the remote file on your FTP server.

$remotetime = ftp_mdtm($conn, $remotefile);