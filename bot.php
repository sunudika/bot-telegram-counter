<?php

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\Drivers\Telegram\TelegramDriver;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Attachments\Video;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;

require_once "vendor/autoload.php";
require_once "constants/coins.php";
require_once "constants/markets.php";
require_once "core/CoinIDR.php";
require_once "core/CoinBTC.php";
require_once "core/Markets.php";

$configs = [
    "telegram" => [
        "token" => file_get_contents("private/TOKEN.txt")
    ]
];

DriverManager::loadDriver(TelegramDriver::class);

$botman = BotManFactory::create($configs);

// Command
$botman->hears("/start", function (BotMan $bot) {
    $bot->reply("Willkommen 😊");
});

$botman->hears("/help", function (BotMan $bot) {
    $bot->reply("bot ini mencatat frekuensi chat setiap user" . PHP_EOL . "/start");
});

$botman->hears("{coin}", function (BotMan $bot, $coin){
    global $coin_idr_markets;
    global $coin_btc_markets;
    $many = strlen($coin);
    $temp = substr($coin, 1, $many);

    if(in_array($temp, $coin_idr_markets)) {
        $coinIDR = new CoinIDR($temp);
        $bot->reply($coinIDR->getResponses());
    } else if(in_array($temp, $coin_btc_markets)) {
        $coinBTC = new CoinBTC($temp);
        $bot->reply($coinBTC->getResponses());
    } else if ($coin === "/btc_markets"){

    } else if ($coin === "/idr_markets"){

    } else if ($coin === "/start"){

    } else {
        $bot->reply("Saya tidak kenal maksud anda");
    }
});;

$botman->listen();