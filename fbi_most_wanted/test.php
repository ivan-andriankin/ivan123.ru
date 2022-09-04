<?php


//Constants:
define('ABSOLUTE_URL_PART', 'https://cdn.jsdelivr.net/gh/fawazahmed0/quran-api@1/editions/rus-vporokhova');
define('WHOLE_QURAN_URL', 'https://cdn.jsdelivr.net/gh/fawazahmed0/quran-api@1/editions/rus-vporokhova.json');
define('CHAPTER_5_VERSE_3', 'https://cdn.jsdelivr.net/gh/fawazahmed0/quran-api@1/editions/rus-vporokhova/5/3.json');

define('FBI_MW', 'https://api.fbi.gov/wanted/v1/list');



//Variables:
$data = file_get_contents(CHAPTER_5_VERSE_3);
$decodedData = json_decode($data, true);

$fbiData = file_get_contents(FBI_MW);
$decodedFbiData = json_decode($fbiData, true);



//Test:
//echo count($decodedFbiData['items']) . "<br>";
//print_arr($decodedFbiData['items'][0]) . "<br>";



//Functions:
function print_arr($arr) {
    echo '<pre> ' . print_r($arr, true) . ' </pre>';
}