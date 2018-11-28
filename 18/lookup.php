<!DOCTYPE html>
<html>
<head>
    <title>Stock Quote From NASDAQ</title>
</head>
<body>

<?php

$url = 'http://phpmaster.local/18/servicemanager.csv';

if (!($contents = file_get_contents($url))) {
    die('Failed to open ' . $url);
}

$csv = explode("\n", $contents);


$data_formatted = [];
unset($csv[0]);
foreach ($csv as $line){
    $single = array_slice(explode('","', $line), 1,-1);
    array_push($data_formatted, $single);
}


if(!empty($data_formatted)){
    $html = "";
    foreach ($data_formatted as $item){
        list($name, $provider, $type, $deadline, $amount, $status, $not_solved) = $item;
        $html .= <<<HTML
            <tr>
                <td>{$name}</td>
                <td>{$provider}</td>
                <td>{$type}</td>
                <td>{$deadline}</td>
                <td>{$amount}</td>
                <td>{$status}</td>
                <td>{$not_solved}</td>
            </tr>
HTML;
    }

}

?>

<table>
    <tr>
        <td>Name</td>
        <td>Provider</td>
        <td>Type</td>
        <td>Deadline</td>
        <td>Amount</td>
        <td>Status</td>
        <td>Not solved</td>
    </tr>
    <?php echo $html; ?>
</table>


</body>
</html>