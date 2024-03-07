<?php
$newString = preg_replace('/\s/', '', 'Я люблю PHP');
echo $newString;
echo "<br/>";

$newString = preg_replace('/PHP/', 'JS', 'Я люблю PHP');
echo $newString;
echo "<br/>";

echo preg_match("/PHP/", $newString);
echo "<br/>";

$newString = preg_replace('/([А-я]+) ([А-я]+) ([A-z]+)/u', '$1 $3', 'Я люблю PHP');
echo $newString;
echo "<br/>";

$newString =preg_match("/[+375]-[0-9]{2}-[0-9]{3}-[0-9]{2}-[0-9]{2}/", "+375-29-511-11-33");
echo $newString;
echo "<br/>";

$newString =preg_match("/^\/catalog\/([0-9]+)\/item-([0-9]+)\/[a-z0-9-_№]+/", "/catalog/125/item-12/tovar-name");
echo $newString;
echo "<br/>";
