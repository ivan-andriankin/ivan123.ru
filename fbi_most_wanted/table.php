<?php

require 'test.php';

$arr = [
    ['name' => 'user1', 'age' => 30, 'salary' => 500],
    ['name' => 'user2', 'age' => 31, 'salary' => 600],
    ['name' => 'user3', 'age' => 32, 'salary' => 700],
];


echo '<table border=1>';
	foreach ($arr as $user) {
		echo '<tr>';
		
		echo "<td>{$user['name']}</td>";
		echo "<td>{$user['age']}</td>";
		echo "<td>{$user['salary']}</td>";
		
		echo '</tr>';
	}
echo '</table>';



#####################################################
echo '<br>';


$supportiveArr = [
    'Reward',
    'Aliases',
    'Publication',
    'Warning message',
    'Age max',
    'Age min',
    'Additional information',
    'Height min',
    'Height max',
    'Field offices',
    'Occupation',
    'Details',
    'Sex',
    'Scars and marks',
    'Build',
    'Nationality',
    'Caution',
    'Race',
    'Hair',
    'Weight',
    'Place of birth',
    'Description',
    'Title',
    'Eyes',
    'Status',
    'Remarks',
    'Possible states',
    'Subjects',
    'Languages',
    'Possible countries',
    'Dates of birth used',
];

//print_arr(array_keys($decodedFbiData['items'][0]));



echo '<table border=1>';
    foreach ($supportiveArr as $key) {
        echo "<tr><td>$key</td></tr>";
    }
echo '</table>';

echo '<table border=1>';
    foreach ($decodedFbiData['items'][0] as $value) {
        echo "<tr><td>$value</td></tr>";
    }
echo '</table>';

/* 
echo '<table>';
foreach ($decodedFbiData['items'] as $row => ) {

}
echo '</table>';
 */