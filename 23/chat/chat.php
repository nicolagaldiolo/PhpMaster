<?php
session_start();
ob_start();
header("Content-type: application/json");

date_default_timezone_set('UTC');

//connect to database
$db = mysqli_connect('localhost', 'root', '', 'phpmaster');

if (mysqli_connect_errno()) {
   echo '<p>Error: Could not connect to database.<br/>
   Please try again later.</p>';
   exit;
}

try {

    $currentTime = microtime(true);
    $session_id = session_id();
    $lastPoll = isset($_SESSION['last_poll']) ? $_SESSION['last_poll'] : $currentTime;
    $action = isset($_SERVER['REQUEST_METHOD']) && ($_SERVER['REQUEST_METHOD'] == 'POST') ? 'send' : 'poll';

    switch($action) {
        case 'poll':

           $query = "SELECT * FROM chatlog WHERE date_created >= ?";
           $stmt = $db->prepare($query);
           $stmt->bind_param('s', $lastPoll);
           $stmt->execute();
           $stmt->bind_result($id, $message, $session_id, $date_created);
           $result = $stmt->get_result();

           $newChats = [];
           while($chat = $result->fetch_assoc()) {
               $chat['sent_by'] = ($session_id == $chat['sent_by']) ? 'self' : 'other';
               $newChats[] = $chat;
            }

           print json_encode([
               'success' => true,
               'messages' => $newChats
           ]);

           $_SESSION['last_poll'] = $currentTime;

           exit;

        case 'send':

            $message = isset($_POST['message']) ? $_POST['message'] : '';
            $message = strip_tags($message);

            $query = "INSERT INTO chatlog (message, sent_by, date_created) VALUES(?, ?, ?)";
            $stmt = $db->prepare($query);
            $stmt->bind_param('ssd', $message, $session_id, $currentTime);
            $stmt->execute();

            print json_encode(['success' => true]);
            exit;
    }
} catch(\Exception $e) {
    print json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);

}