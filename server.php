<?php

$data = $_SERVER['REQUEST_METHOD'] === 'GET' ? $_GET : $_POST;

if (!isBirthDateValid($data['births-date'])) {
    echo "Введите настоящую дату рождения";

    return;
}

$data = array_map("cleanUp", $data);

echo "Массив данных пользователя: ";
echo '<pre>';var_dump($data);

echo "<br/>";
echo "Возраст пользователя: " . date_diff(date_create(), date_create($data['births-date']))->y;

echo "<br/>";
echo "Преобразованный массив с адресом: ";
echo '<pre>';var_dump(formAddressArray($data));

function isBirthDateValid(string $date): bool
{
    $birthsDate = date_create($date);

    $currentDate = date_create();
    $lastDate = date_create('- 150 years');

    return $birthsDate < $currentDate && $birthsDate > $lastDate;
}

function cleanUp(string $input): string
{
    return htmlspecialchars(trim($input));
}

function formAddressArray(array $array): array
{
    $addressArray = array_splice($array, 1, 3);

    return $array + ["address" => $addressArray];
}