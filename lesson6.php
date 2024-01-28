<?php

$defaultString = "я люблю обучаться PHP";
echo mb_strtoupper($defaultString);
echo "<br/>";

function stringSearch($defaultString, string $secondString)
{
    return str_replace("PHP", $secondString, $defaultString);
}

echo stringSearch($defaultString, "JS");
echo "<br/>";

$arrayExplode = explode(" ", $defaultString);
echo "Количество слов в исходной строке: " . count($arrayExplode);
echo "<br/>";

echo "Количество всех символов в исходной строке: " . strlen($defaultString);
echo "<br/>";

$array = [
    "name" => "Fred",
    "remove" => "True",
    "additional_params" => [
        "is_married" => false,
        "country" => "France",
        "born" => "10.09.1982"
    ]
];

unset($array["remove"]);
echo "<br/>";
echo "Удалили второй элемент";
echo "<br/>";
echo "<pre>";
var_dump($array);
echo "<br/>";
echo "Возраст пользователя: " . date_diff(date_create(), date_create($array["additional_params"]["born"]))->y;
echo "<br/>";

ksort($array);
echo "<br/>";
echo "Отсортированный массив";
echo "<br/>";
echo "<pre>";
var_dump($array);

$arrayCountry = [
    "name" => "France",
    "capital" => "Paris",
    "time" => "GMT+1"
];
echo "<br/>";
echo "Добавили новый массив в country";
echo "<br/>";
$array["additional_params"]["country"] = $arrayCountry;
echo "<pre>";
var_dump($array);

$newArray = array_merge($array, ["child" => null]);
echo "<br/>";
echo "Объединили два массива";
echo "<br/>";
echo "<pre>";
var_dump($newArray);

echo "<br/>";
echo "Разделили born на массив";
echo "<br/>";
$newArray["additional_params"]["born"] = explode(".", $newArray["additional_params"]["born"]);
echo "<pre>";
var_dump($newArray);

echo "<br/>";
echo "Максимальное число из даты рождения пользователя";
echo "<br/>";
echo max($newArray["additional_params"]["born"]);
echo "<br/>";
echo "Минимальное число из даты рождения пользователя";
echo "<br/>";
echo min($newArray["additional_params"]["born"]);

asort($newArray["additional_params"]["born"]);
echo "<br/>";
echo "Сортировка даты рождения пользователя по возрастанию";
echo "<br/>";
echo "<pre>";
var_dump($newArray["additional_params"]["born"]);
