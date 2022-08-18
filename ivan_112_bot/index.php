<?php

//t.me/ivan_112_bot
//https://ivan123.ru/ivan_112_bot/
//https://api.telegram.org/bot5502629988:AAHn8izSl3nxUi9WpIhbbJpifjM5WTAAqH4/setWebhook?url=https://ivan123.ru/ivan_112_bot/index.php

#Constants
define('TOKEN', '5502629988:AAHn8izSl3nxUi9WpIhbbJpifjM5WTAAqH4');


#Take the request
$data = json_decode(file_get_contents('php://input'), TRUE); //input from user
file_put_contents('file.txt', '$data: '.print_r($data, 1)."\n", FILE_APPEND); //put $data to file.txt for testing purpose



#this line cuts parent-level array ('message' or 'callbac_query') so the input array with date would always have the same structure. 'message' is texting, 'callback_query' is clicking button
$data = $data['callback_query'] ? $data['callback_query'] : $data['message'];
file_put_contents('file1.txt', '$data: '.print_r($data, 1)."\n", FILE_APPEND);


#Store user's message in lower case
$message = mb_strtolower(($data['text'] ? $data['text'] : $data['data']),'utf-8');// what means $data['data']? There is no 'data' element in $data array...
file_put_contents('file2.txt', '$message: '.print_r($message, 1)."\n", FILE_APPEND);


#Handle user's message
switch ($message)
{
    case 'текст':
        $method = 'sendMessage';
        $send_data = [
            'text' => 'Here is my answer'
        ];
        break;
    
    case 'кнопки':
        $method = 'sendMessage';

                include_once "suraNames.php";
                $chooseSura = [];
                $subArray = [];
                $suraNamesIndex = 0;

                for ($i = 1; $i <= 57; $i++) {

                    for ($j = 1; $j <= 2; $j++) {
                        $suraNamesIndex += 1;
                        $subArray[$j] = ['text' => $suraNames[$suraNamesIndex]];
                    }
                    array_push($chooseSura, $subArray);
                }

        $send_data = [
            'text' => 'Here are my buttons',
            'reply_markup' => [
                'resize_keyboard' => true,
                'keyboard' => $chooseSura
            ]
        ];
        break;

    default:
        $send_data = [
            'method' => 'sendMessage',
            'text' => 'Possible commands:'."\n".'текст'."\n".'кнопки'
        ];
}


#Add user's data
$send_data['chat_id'] = $data['chat']['id'];

$res = sendTelegram($method, $send_data);

function sendTelegram($method, $data, $headers = [])
{
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_POST => 1,
        CURLOPT_HEADER => 0,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'https://api.telegram.org/bot' . TOKEN . '/' . $method,
        CURLOPT_POSTFIELDS => json_encode($data),
        CURLOPT_HTTPHEADER => array_merge(array("Content-Type: application/json"), $headers)
    ]);

    $result = curl_exec($curl);
    curl_close($curl);
    return (json_decode($result, 1) ? json_decode($result, 1) : $result);
}