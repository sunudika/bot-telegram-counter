<?php

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\Drivers\Telegram\TelegramDriver;

require_once $_SERVER['DOCUMENT_ROOT'] . '/bot-telegram-counter/vendor/autoload.php';

date_default_timezone_set('Asia/Jakarta');

$configs = [
    "telegram" => [
        "token" => file_get_contents("private/TOKEN.txt")
    ]
];

require_once 'database/config.php';


DriverManager::loadDriver(TelegramDriver::class);

$botman = BotManFactory::create($configs);

// $botman->group(['recipient' => ['-1001307666764', '-1001184380882']], function(Botman $bot) {

//     $bot->hears("/start", function (BotMan $bot) {
//         $user = $bot->getUser();
//         $firstname = $user->getFirstName();
//         $bot->reply("Willkommen $firstname 😊");
//     });

//     $bot->hears("/kenal {nama}, {npm}", function (BotMan $bot, $nama, $npm) {
//         $bot->reply("Halo! $nama, $npm");
//     });

//     $bot->hears("/help", function (BotMan $bot) {
//         $bot->reply("bot ini mencatat frekuensi chat setiap user" . PHP_EOL . "/start - untuk mendapat sapaan");
//     });
// });

$botman->hears("/start", function (BotMan $bot) {
    $user = $bot->getUser();
    $firstname = $user->getFirstName();
    $id_user = $user->getId();
    $bot->reply("Willkommen $firstname ($id_user) 😊");
});

$botman->hears("/kenal {nama}, {npm}", function (BotMan $bot, $nama, $npm) {
    $bot->reply("Halo! $nama, $npm");
});

$botman->hears("{chat}", function (BotMan $bot, $chat){
    // $bot->typesAndWaits(4);
    include "functions/request.php"; 
    $message = "IDmu: " . $dataUser->id_user . PHP_EOL;
    $message .= "Usernamemu: " . $dataUser->username . PHP_EOL;
    $message .= "Namamu: " . $dataUser->name . PHP_EOL;
    $message .= "Frekuensimu: " . $dataUser->frequency . PHP_EOL;
    $bot->reply($message);
});

$botman->listen();