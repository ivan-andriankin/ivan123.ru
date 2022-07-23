<?php
    $title = 'PHP to create file';
?>

<h3>PHP to create file</h3>

<?php

echo '<p>text.txt file to be created...</p><br>';

$filename = "text.txt";

$file = fopen($filename, "w");
fwrite($file, "Wu Tang Clan\nlit band");
fclose($file);


?>