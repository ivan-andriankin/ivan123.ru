<?php

//Ivan'sHolidaysBot
//ivan_test_holiday_bot
//t.me/ivan_test_holiday_bot
//https://ivan123.ru/ivan_test_holiday_bot/
//https://api.telegram.org/bot5529563073:AAGXqt11LVW29e4QOAnXMrk31DnEzTE-FIo/setWebhook?url=https://ivan123.ru/ivan_test_holiday_bot/index.php


//важные константы:
const TOKEN = '5529563073:AAGXqt11LVW29e4QOAnXMrk31DnEzTE-FIo';
const BASE_URL = 'https://api.telegram.org/bot' . TOKEN . '/';
const HOLIDAY_API_KEY = 'de56ed0a-5d1e-4089-948a-7af674f08684';
const HOLIDAY_API_URL = 'https://holidayapi.com/v1/holidays?languae=ru&country=ru&key=' . HOLIDAY_API_KEY;

//Принятие запроса:
$update = json_decode(file_get_contents('php://input'));
//file_put_contents('file.txt', '$data: '.print_r($data, 1)."\n", FILE_APPEND);
//file_put_contents(__DIR__ . '/logs.txt', print_r($update, 1), FILE_APPEND);


$chat_id = $update->message->chat->id ?? '';
$text = $update->message->text ?? '';

if (preg_match("#^([0-9]{1,2})-([0-9]{1,2})-([0-9]{4})$#", $text, $matches)) {
    
    $holidays = json_decode(
        file_get_contents(
            HOLIDAY_API_URL . "&year={$matches[3]}&month={$matches[2]}&day={$matches[1]}",
            false,
            stream_context_create(['http' => ['ignore_errors' => true]])
        )
    );
    if (isset($holidays->error)) {
        $result = $holidays->error;
    } elseif (!empty($holidays->holidays)) {
        $result = '';
        foreach ($holidays->holidays as $holiday) {
            $result .= $holiday->name . PHP_EOL;
        }
    } else {
        $result = 'В этот день праздников нет';
    }
    
    $res = send_request('sendMessage', [
        'chat_id' => $chat_id,
        'text' => $result,
    ]);
} else {
    $res = send_request('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "Введи дату цифрами в формате день-месяц-год",
    ]);
}

//функция запросов в api.telegram
function send_request($method, $params = [])
{
    if (!empty($params)) {
        $url = BASE_URL . $method . '?' . http_build_query($params);
    } else {
        $url = BASE_URL . $method;
    }
    return json_decode(file_get_contents($url));
}