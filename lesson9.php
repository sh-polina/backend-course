<?php

$arr = [1, 22, 333, 4444, 22, 5555, 1];

function deleteMoreThanThree($array): array
{
    foreach ($array as $key => $value) {
        if (strlen($value) > 3) {
            unset($array[$key]);
        }
    }

    return $array;
}

echo "Массив после удаления подстрок с количеством символов больше 3:";
echo "<pre>";
print_r(deleteMoreThanThree($arr));

$date = '2025-12-31';

function dateArrayExplode($date): array
{
    $dateExplode = explode('-', $date);
    $newDateKeys = ["year", "month", "day"];

    return array_combine($newDateKeys, $dateExplode);
}

;
echo "<br/>";
echo "Дата, преобразованная в массив";
echo "<br/>";
print_r(dateArrayExplode($date));

$originalText = "В лесу родилась елочка и там росла";

function textSortedByAlphabet(string $text): string
{
    $originalTextArray = explode(" ", $text);
    sort($originalTextArray, SORT_STRING);

    return implode(" ", $originalTextArray);
}

echo "<br/>";
echo "Оригинальный текст: " . $originalText;
echo "<br/>";
echo "Отсортированнай в алфавитном порядке: " . textSortedByAlphabet($originalText);
echo "<br/>";

$array = [1, 2, 3, 4, 5];

function nextItem($array, int $number)
{
    if (!in_array($number, $array)) {
        return "Введите число из массива";
    }

    if (end($array) == $number) {
        return $array[0];
    }

    foreach ($array as $key => $value) {
        if ($value == $number) {
            break;
        }
    }

    return $array[++$key];
}

echo "<br/>";
echo "Следующее число после 3 = " . nextItem($array, 3);