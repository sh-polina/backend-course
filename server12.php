<?php
// задание 1
$dataFile = fopen("user-data.txt", "a+");

fwrite($dataFile, implode(" ", $_POST) . "\r\n");

// задание 2

echo sameNumberCount($_POST["number"]);

function sameNumberCount($number): int
{
    $sameNumberCount = 0;
    $offset = 0;

    $content = file_get_contents("random-numbers.txt");


    do {
        $offset = strpos($content, $number, $offset);

        if ($offset !== false) {
            ++$sameNumberCount;
            ++$offset;
        }
    }
    while($offset !== false);

    return $sameNumberCount;
}

// задание 3

$dir = scandir("../backend-course/");
$dirCount = 0;

foreach ($dir as $item) {
    if (is_dir($item)){
        ++$dirCount;
    }
}

$folderCount = count($dir) - $dirCount;

echo "<pre>";
print_r($dir);
echo "<br>";
echo "Кол-во директорий: " . $dirCount . " Кол-во файлов: " . $folderCount;
echo "<br>";

// задание 4
function translit(string $string): string
{
    $translitAlphabet = [
        'а' => 'a', 'б' => 'b', 'в' => 'v',
        'г' => 'g', 'д' => 'd', 'е' => 'e',
        'ё' => 'e', 'ж' => 'zh', 'з' => 'z',
        'и' => 'i', 'й' => 'y', 'к' => 'k',
        'л' => 'l', 'м' => 'm', 'н' => 'n',
        'о' => 'o', 'п' => 'p', 'р' => 'r',
        'с' => 's', 'т' => 't', 'у' => 'u',
        'ф' => 'f', 'х' => 'h', 'ц' => 'c',
        'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch',
        'ь' => '\'', 'ы' => 'y', 'ъ' => '\'',
        'э' => 'e', 'ю' => 'yu', 'я' => 'ya',

        'А' => 'A', 'Б' => 'B', 'В' => 'V',
        'Г' => 'G', 'Д' => 'D', 'Е' => 'E',
        'Ё' => 'E', 'Ж' => 'Zh', 'З' => 'Z',
        'И' => 'I', 'Й' => 'Y', 'К' => 'K',
        'Л' => 'L', 'М' => 'M', 'Н' => 'N',
        'О' => 'O', 'П' => 'P', 'Р' => 'R',
        'С' => 'S', 'Т' => 'T', 'У' => 'U',
        'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
        'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sch',
        'Ь' => '\'', 'Ы' => 'Y', 'Ъ' => '\'',
        'Э' => 'E', 'Ю' => 'Yu', 'Я' => 'Ya',
    ];

    return strtr($string, $translitAlphabet);
}

echo translit($_POST["translit"]);

// задание 5

$login = $_POST["login"];
$password = $_POST["password"];
$name = $_POST["name"];

$user = ["login" => $login, "password" => $password, "name" => $name];

$users = file_get_contents("data.json");

if (empty($users)) {
    $users[] = $user;
} else {
    $users = json_decode($users, true);
    $isMatch = false;

    foreach ($users as $item) {
        if ($user["login"] === $item["login"] && $user["password"] === $item["password"]) {
            $isMatch = true;
            break;
        }
    }

    if ($isMatch) {
        session_start();
        $_SESSION["login"] = $login;
        $_SESSION["password"] = $password;
        $_SESSION["name"] = $name;
        echo "<br>";
        echo "Привет, " . $name;
    } else {
        $users[] = $user;
    }
}

file_put_contents('data.json', json_encode($users));

// задание 6

$image = $_FILES["file"];

if (!str_contains($image["type"], "image")) {
    echo "<br>";
    echo "Загрузите изображение";
    die;
}

var_dump($image);








