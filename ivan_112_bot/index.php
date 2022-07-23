<?php

//t.me/ivan_112_bot
//https://ivan123.ru/ivan_112_bot/
//https://api.telegram.org/bot5502629988:AAHn8izSl3nxUi9WpIhbbJpifjM5WTAAqH4/setWebhook?url=https://ivan123.ru/ivan_112_bot/index.php



#Take the request
$data = json_decode(file_get_contents('php://input'), TRUE);
file_put_contents('file.txt', '$data: '.print_r($data, 1)."\n", FILE_APPEND);



#Handle texting or clicking button
$data = $data['callback_query'] ? $data['callback_query'] : $data['message'];

#Constants
define('TOKEN', '5502629988:AAHn8izSl3nxUi9WpIhbbJpifjM5WTAAqH4');

#Store user's message in lower case
$message = mb_strtolower(($data['text'] ? $data['text'] : $data['data']),'utf-8');

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
        $send_data = [
            'text' => 'Here are my buttons',
            'reply_markup' => [
                'resize_keyboard' => true,
                'keyboard' => [
                    [
                        ['text' => 'Button 1'],
                        ['text' => 'Button 2'],
                    ],
                    [
                        ['text' => 'Button 3'],
                        ['text' => 'Button 4'],
                    ]
                ]
            ]
        ];
        break;

    case 'видео':
        $method = 'sendMessage';
        $send_data = [
            'text' => 'Here is my video'."\n".'https://www.youtube.com/watch?v=mwVVE1tVHls&list=PL7nS_iZvABcPpfnvDhFlMD0B5NNknyNE-&index=94&t=173s'
            
        ];
        break;

    default:
        $send_data = [
            'method' => 'sendMessage',
            'text' => 'Possible commands:'."\n".'текст'."\n".'кнопки'."\n".'видео'
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