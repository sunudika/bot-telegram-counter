<?php

namespace Chat;

require_once $_SERVER['DOCUMENT_ROOT'] . 'bot-telegram-counter/database/config.php';

date_default_timezone_set('Asia/Jakarta');

class Chat
{
    function getTodayData()
    {
        global $connection;

        $querySelectData    = "SELECT * FROM chat WHERE DATE(created_at) = CURDATE()";
        $resultQuery        = mysqli_query($connection, $querySelectData);

        return (object) mysqli_fetch_assoc($resultQuery);
    }

    function getLastData()
    {
        global $connection;

        $querySelectLastData    = "SELECT * FROM chat WHERE DATE(created_at) = CURDATE()
                                    ORDER BY updated_at DESC
                                    LIMIT 1";
        $resultQuery        = mysqli_query($connection, $querySelectLastData);

        return (object) mysqli_fetch_assoc($resultQuery);
    }

    function insertNewRow($dataUser)
    {
        global $connection;

        $queryInsertUser    = "INSERT INTO chat (id_user, username, name, frequency, created_at, updated_at)
                                VALUES ($dataUser->id_user, $dataUser->username, $dataUser->name, $dataUser->frequency, $dataUser->created_at, $dataUser->updated_at)";

        mysqli_query($connection, $queryInsertUser);
    }

    function isDBExpired($dataUser, $dataDB)
    {
        $current_time = time();
        $convert_current_time = date('Y:m:d H:i:s', $current_time);
        if (
            $dataDB->frequency < $dataUser->frequency ||
            $dataDB->updated_at < $convert_current_time
        ) {

            return true;
        }

        return false;
    }

    function updateTodayData($id, $dataUser) {
        global $connection;

        $queryUpdateData    = "UPDATE chat
                                SET frequency   = $dataUser->frequency,
                                    updated_at  = CURRENT_TIMESTAMP()
                                WHERE id = $id";

        mysqli_query($connection, $queryUpdateData);
    }
}