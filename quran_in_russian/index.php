<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h4>Коран на русском в переводе Пороховой</h4>
    Введите номер суры

    <form name="getSura" method="POST" action="processes.php">
        <input type="text" name="suraNum"><br>
        <input type="submit" value="получить текст">
    </form>

<?php
    include "processes.php";
?>

</body>
</html>