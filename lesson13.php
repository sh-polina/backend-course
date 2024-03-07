<?php
?>

<form action="server13.php" method="post">
    <fieldset>
        <legend>Калькулятор</legend>
        <input type="text" name="first-number" placeholder="Первое число">
        <input type="text" name="sign" placeholder="+ - / *">
        <input type="text" name="second-number" placeholder="Второе число">
    </fieldset>

    <fieldset>
        <legend>Авторизация</legend>
        <input type="text" name="login" placeholder="Логин">
        <input type="password" name="password" placeholder="Пароль">
        <input type="text" name="name" pattern="^[a-zA-Zа-яА-Я\s-]+$" placeholder="Имя">
    </fieldset>

    <button type="submit">Отправить</button>
</form>