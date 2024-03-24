<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
</head>
<body>
<form action="Authorisation.php" method="post">
    <fieldset>
        <legend>Авторизация</legend>
        <input type="text" name="login" placeholder="Логин">
        <input type="password" name="password" placeholder="Пароль">
    </fieldset>

    <button type="submit">Отправить</button>
</form>
</body>
</html>

<?php

require_once "User.php";

if (!empty($_POST)) {
    $user = new User();
    $myUser = $user->isUserExist($_POST["login"], $_POST["password"]);
    session_start();

    if (!empty($myUser)) {
        $_SESSION['login'] = $_POST["login"];
        $_SESSION['password'] = $_POST["password"];
        header("Location: http://backend-course/lesson21-22/index.php");
        exit;
    } else {
        echo "Неверный логин или пароль";
        $_SESSION['login'] = null;
    }
}



?>