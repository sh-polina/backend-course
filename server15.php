<?php

class Authorisation
{
    const FILE_PATHS = "data.json";
    private array $user;

    public function __construct(string $login, string $password, string $name)
    {
        $this->user = ["login" => $login, "password" => $password, "name" => $name];
    }

    public function login()
    {
        Validation::loginValidation($this->user);
        Validation::passwordValidation($this->user);
        $users = file_get_contents(self::FILE_PATHS);

        if (empty($users)) {
            $this->addUserToFile();

            return;
        }

        $users = json_decode($users, true);

        $this->isUserExist($users) ? $this->writeUserSession() : $this->addUserToFile();
    }

    private function isUserExist(array $users): bool
    {
        foreach ($users as $item) {
            if ($this->user["login"] === $item["login"] && $this->user["password"] === $item["password"]) {
                return true;
            }
        }

        return false;
    }

    private function writeUserSession()
    {
        session_start();
        $_SESSION["login"] = $this->user["login"];
        $_SESSION["password"] = $this->user["password"];
        $_SESSION["name"] = $this->user["name"];
        echo "<br>";
        echo "Привет, " . $this->user["name"];
    }

    private function addUserToFile()
    {
        $users[] = $this->user;
        file_put_contents(self::FILE_PATHS, json_encode($users));
    }
}

class Validation
{
    public static array $errors = [
        "login" => "Введите верный логин",
        "password" => "Введите верный пароль"
    ];

    public static function loginValidation($user): ?string
    {
        if (!preg_match('^[a-z0-9]{3,}$', $user['login'])) {
            return self::$errors["login"];
        }

        return null;
    }

    public static function passwordValidation($user): ?string
    {
        if (!preg_match('^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9@#$%]).{8,}$', $user['password'])) {
            return self::$errors["password"];
        }

        return null;
    }
}

$authorisation = new Authorisation($_POST['login'], $_POST['password'], $_POST['name']);
$authorisation->login();