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
//print_arr($decodedFbiData['items']) . "<br>";



/*
$decodedFbiData['items'];
$decodedFbiData['items'][i]['reward_text'];
$decodedFbiData['items'][i]['aliases'][j];
$decodedFbiData['items'][i]['publication'];
$decodedFbiData['items'][i]['warning_message'];
$decodedFbiData['items'][i]['age_max'];
$decodedFbiData['items'][i]['age_min'];
$decodedFbiData['items'][i]['additional_information'];
$decodedFbiData['items'][i]['height_min'];
$decodedFbiData['items'][i]['height_max'];
$decodedFbiData['items'][i]['field_offices'][j];
$decodedFbiData['items'][i]['occupations'][j];
$decodedFbiData['items'][i]['details'];
$decodedFbiData['items'][i]['sex'];
$decodedFbiData['items'][i]['scars_and_marks'];
$decodedFbiData['items'][i]['build'];
$decodedFbiData['items'][i]['nationality'];
$decodedFbiData['items'][i]['caution'];
$decodedFbiData['items'][i]['race_raw'];
$decodedFbiData['items'][i]['hair'];
$decodedFbiData['items'][i]['weight'];
$decodedFbiData['items'][i]['place_of_birth'];
$decodedFbiData['items'][i]['description'];
$decodedFbiData['items'][i]['title'];
$decodedFbiData['items'][i]['eyes'];
$decodedFbiData['items'][i]['status'];
$decodedFbiData['items'][i]['remarks'];
$decodedFbiData['items'][i]['possible_states'];
$decodedFbiData['items'][i]['subjects'];
$decodedFbiData['items'][i]['languages'][j];
$decodedFbiData['items'][i]['possible_countries'];
$decodedFbiData['items'][i]['dates_of_birth_used'][j];

*/




//Functions:
function print_arr($arr) {
    echo '<pre> ' . print_r($arr, true) . ' </pre>';
}