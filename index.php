<?php

function square($longSide, $shortSide): int {
    $square = $longSide * $shortSide;
    return $square;
}

echo "Площадь прямоугольника равна = " . square(2,4);
echo "<br/>";

echo "Количество дней в феврале 2025 года: " . date("t", mktime(0,0,0, 2, 1, 2025));
echo "<br/>";

function anonSquare($longSide){
    return function($shortSide) use ($longSide){
        return $longSide * $shortSide;
    };
}

$anonSquare = anonSquare(2);
$result = $anonSquare(4);
echo "Площадь прямоугольника при использовании анонимной функции равна = " . $result;
echo "<br/>";

echo "Дней до нового года: " . date_diff(date_create(), date_create("2025-01-01"))->days;
echo "<br/>";

echo "Разница между 28 февраля и 1 марта этого года: " . date_diff(date_create("2024-02-28"), date_create("2024-03-01"))->days . " дня";
echo "<br/>";
