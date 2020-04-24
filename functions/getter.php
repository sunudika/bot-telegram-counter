<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/bot-telegram-counter/database/config.php';

date_default_timezone_set('Asia/Jakarta');

function getMessage() {
    global $connection;

    $querySelectLastData = "SELECT username, frequency FROM chat WHERE DATE(created_at) = CURDATE()";
    $resultQuery         = mysqli_query($connection, $querySelectLastData);

    $message = "";

    while($resultLastDataId = mysqli_fetch_assoc($resultQuery)) {
        $resultToday = (object) $resultLastDataId;

        $message .= "Username: " . $resultToday->username . PHP_EOL;
        $message .= "Frekuensi: " . $resultToday->frequency . PHP_EOL . PHP_EOL;
    }
    
    return $message;
}