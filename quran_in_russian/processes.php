<?php

/*

https://cdn.jsdelivr.net/gh/fawazahmed0/quran-api@1/{endpoint}

Porokhova edition:
https://cdn.jsdelivr.net/gh/fawazahmed0/quran-api@1/editions/rus-vporokhova.json

Get the whole chapter 5:
https://cdn.jsdelivr.net/gh/fawazahmed0/quran-api@1/editions/rus-vporokhova/5.json

Get Chapter 5 verse 10:
https://cdn.jsdelivr.net/gh/fawazahmed0/quran-api@1/editions/rus-vporokhova/5/10.json

Get juz 3:
https://cdn.jsdelivr.net/gh/fawazahmed0/quran-api@1/editions/rus-vporokhova/juzs/3.json

Similarly:

Руку: https://cdn.jsdelivr.net/gh/fawazahmed0/quran-api@1/editions/rus-vporokhova/rukus/1

Манзиль: https://cdn.jsdelivr.net/gh/fawazahmed0/quran-api@1/editions/rus-vporokhova/manzils/1

*/


//Constants:
define('ABSOLUTE_URL_PART', 'https://cdn.jsdelivr.net/gh/fawazahmed0/quran-api@1/editions/rus-vporokhova');
define('WHOLE_QURAN_URL', 'https://cdn.jsdelivr.net/gh/fawazahmed0/quran-api@1/editions/rus-vporokhova.json');
define('CHAPTER_5_VERSE_3', 'https://cdn.jsdelivr.net/gh/fawazahmed0/quran-api@1/editions/rus-vporokhova/5/3.json');

//Variables:
$data = file_get_contents(CHAPTER_5_VERSE_3);
$decodedData = json_decode($data, true);

//Functions:
function print_arr($arr) {
    echo '<pre> ' . print_r($arr, true) . ' </pre>';
}





//Logic:
print_arr($decodedData);
echo "Сура номер " . $decodedData['verse'];
echo "<br>";
include "suraNames.php";
echo $suraNames[$decodedData['verse']];



//getSura form:
$inputSuraNum = $_POST['suraNum'];
echo "<br>";
echo $inputSuraNum;



include "suraNames.php";
$printSuras = [];
$subArray = [];
$suraNamesIndex = 0;

for ($i = 1; $i <= 57; $i++) {

    for ($j = 1; $j <= 2; $j++) {
        $suraNamesIndex += 1;
        $subArray[$j] = ['text' => $suraNames[$suraNamesIndex]];
    }
    array_push($printSuras, $subArray);
}


$send_data = [
            'text' => 'Here are my buttons',
            'reply_markup' => [
                'resize_keyboard' => true,
                'keyboard' => $printSuras /*[
                    [
                        ['text' => '1) Aль-Фaтиxa / Oтĸpывaющaя'],
                        ['text' => '2) Aль-Бaĸapa / Kopoвa']
                    ],
                    [
                        ['text' => '3) Aль-Имpaн / Ceмeйcтвo Имpaнa'],
                        ['text' => '4) Aн-Hиca / Жeнщины']
                    ]
                ]*/
            ]
];
print_arr($send_data);


//Print array of suras from another file

$printSuras = [];
$subArray = [];
$suraNamesIndex = 0;

for ($i = 1; $i <= 57; $i++) {

    for ($j = 1; $j <= 2; $j++) {
        $suraNamesIndex += 1;
        $subArray[$j] = ['text' => $suraNames[$suraNamesIndex]];
    }
    array_push($printSuras, $subArray);
}
//print_arr($printSuras);
