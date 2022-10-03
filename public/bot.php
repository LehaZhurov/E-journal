<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Bot\TelegramBot;

$telegramKey = env('TELEGRAM_KEY', '5797931175:AAFrfz7_Tcy7dFa39a3Iqcjh-tDniobQVpI');
$tgbot = TelegramBot::new($telegramKey);
$tgbot->getWebhookUpdates();
$text = $tgbot->data['message']['text'];
$messageId = $tgbot->data['message']['message_id'];
$chatId = $tgbot->data['message']['chat']['id'];

if($text == '/start'){
    $message = 'Привет!Отправь мне командку /code и введи это код в личном кабинет';
    $tgbot->sendMessage($chatId,$message);
    return;
}
if($text == '/code'){
    $message = 'Ваш код: '.$chatId;
    $tgbot->sendMessage($chatId,$message);
    return;
}
$message = 'Небалуй';
$tgbot->sendMessage($chatId,$message);