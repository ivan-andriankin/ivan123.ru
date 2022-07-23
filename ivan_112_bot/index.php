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

        break;
    
    case 'кнопки':
        
        break;

    case 'видео':

        break;
}