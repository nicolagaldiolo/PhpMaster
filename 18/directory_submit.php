<!DOCTYPE html>
<html>
<head>
    <title>Site Submission Results</title>
</head>
<body>
<h1>Site Submission Results</h1>

<?php


////////
/// FUNCTIONS:
/// parse_url() torna una array con info sull'url, es: http://nobody:secret@example.com:80/script.php?variable=value#anchor
/// array(8) {
//      ["scheme"]=>    "http"
//      ["host"]=>      "example.com"
//      ["port"]=>      80
//      ["user"]=>      "nobody"
//      ["pass"]=>      "secret"
//      ["path"]=>      "/script.php"
//      ["query"]=>     "variable=value"
//      ["fragment"]=>  "anchor"
//}
/// gethostbyname() torna l'indirizzo ip dato un host
/// gethostbyaddr() torna l'host dato un ip
/// getmxrr($emailhost, $mxhostsarr) dato un email host, popola il 2 parametro passato con la lista dei record mx
/// checkdnsrr() Check DNS records corresponding to a given Internet host name or IP address

// Extract form fields
$url = $_POST['url'];
$email = $_POST['email'];

echo var_dump(checkdnsrr("206.189.116.144", "A"));
die();


// Check the URL
$url = parse_url($url);

$host = $url['host'];

if (!($ip = gethostbyname($host)))
{
    echo 'Host for URL does not have valid IP address.';
    exit;
}

echo 'Host ('.$host.') is at IP '.$ip.'<br/>';

// Check the email address
$email = explode('@', $email);
$emailhost = $email[1];


if (!getmxrr($emailhost, $mxhostsarr))
{
    echo 'Email address is not at valid host.';
    exit;
}

echo 'Email is delivered via: <br/>
<ul>';


foreach ($mxhostsarr as $mx)
{
    echo '<li>'.$mx.'</li>';
}
echo '</ul>';

// If reached here, all ok
echo '<p>All submitted details are ok.</p>';
echo '<p>Thank you for submitting your site.
      It will be visited by one of our staff members soon.</p>';
// In real case, add to db of waiting sites...
?>
</body>
</html>