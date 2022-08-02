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


//Logic:

//$data = json_decode(file_get_contents('php://input'));
echo $data = file_get_contents('https://cdn.jsdelivr.net/gh/fawazahmed0/quran-api@1/editions/rus-vporokhova.json');
