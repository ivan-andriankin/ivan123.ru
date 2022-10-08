<?php

require 'test.php';



$usedKeys = [
    'reward_text' => 'Reward',
    'aliases' => 'Aliases',
    'publication' => 'Publication',
    'warning_message' => 'Warning message',
    'age_max' => 'Age max',
    'age_min' => 'Age min',
    'additional_information' => 'Additional information',
    'height_min' => 'Height min (inch)',
    'height_max' => 'Height max (inch)',
    'field_offices' => 'Field offices',
    'occupations' => 'Occupation',
    'details' => 'Details',
    'sex' => 'Sex',
    'scars_and_marks' => 'Scars and marks',
    'build' => 'Build',
    'nationality' => 'Nationality',
    'caution' => 'Caution',
    'race_raw' => 'Race',
    'hair' => 'Hair',
    'weight' => 'Weight',
    'place_of_birth' => 'Place of birth',
    'description' => 'Description',
    'title' => 'Title',
    'eyes' => 'Eyes',
    'status' => 'Status',
    'remarks' => 'Remarks',
    'possible_states' => 'Possible states',
    'subjects' => 'Subjects',
    'languages' => 'Languages',
    'possible_countries' => 'Possible countries',
    'dates_of_birth_used' => 'Dates of birth used'
];


for ($i=0; $i < count($decodedFbiData['items']); $i++) {

    echo '<table border=1 width="100%">';
    foreach ($usedKeys as $key => $value) {
        if (array_key_exists($key, $decodedFbiData['items'][$i])) {
            echo "<tr>";
            echo "<td width=200>" . $usedKeys[$key] . "</td>";
            echo "<td>"; print_r($decodedFbiData['items'][$i][$key]); echo "</td>";
            echo "</tr>";
        }
    }
    echo '</table>';
    echo '<br>';
}