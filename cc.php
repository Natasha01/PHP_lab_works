<?php

echo "Данные командной строки: {$_SERVER['QUERY_STRING']}";
$num1 = $_SERVER['QUERY_STRING'];

//представление десятичного числа в сс от 2-чной до 16-тиричной
echo "<br>";
for ($tobase = 2; $tobase <= 16; $tobase++){
    echo $tobase . ") " . base_convert($num1, 10, $tobase) . " " . "<br>";
}

?>