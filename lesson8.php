<?php
$arr = [3, 5, 8, 2, 6, 78];

function addition($arr): int
{
    $sum = 0;
    foreach ($arr as $value) {
        $sum += $value;
    }

    return $sum;
}
echo "Исходный массив: ";
echo "<br/>";
echo "<pre>";
var_dump($arr);
echo "<br/>";
echo "Сумма элементов массива = " . addition($arr);
echo "<br/>";

function isNumberInArray(array $arr, string $number): bool
{
    foreach ($arr as $value)
    {
        if ($value == $number)
        {
            return true;
        }
    }

    return false;
}

echo "Содержит ли массив число 2: " . isNumberInArray($arr, "2");
echo "<br/>";

function arraySort($arr): array
{
    $sortedArray = [];

    while (count($arr) !== 0)
    {
        $minValueKey = key($arr);
        $minValue = $arr[$minValueKey];
        foreach ($arr as $key => $value)
        {
            if ($minValue > $value)
            {
                $minValue = $value;
                $minValueKey = $key;
            }
        }
        $sortedArray[] = $minValue;
        unset($arr[$minValueKey]);
    }

    return $sortedArray;
}
echo "Массив отсортированный по возрастанию: ";
echo "<br/>";
echo "<pre>";
var_dump(arraySort($arr));