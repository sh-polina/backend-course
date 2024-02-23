<?php

?>

<form action="server12.php" enctype="multipart/form-data" method="post">
    <fieldset>
        <legend>Пользователь</legend>
        <input type="text" name="name" pattern="^[a-zA-Zа-яА-Я\s-]+$" placeholder="Имя">
        <input type="text" name="last-name" pattern="^[a-zA-Zа-яА-Я\s-]+$" placeholder="Фамилия">
        <input type="text" name="age" pattern="^[a-zA-Zа-яА-Я\s-]+$" placeholder="Возраст">
    </fieldset>
    <fieldset>
        <legend>Авторизация</legend>
        <input type="text" name="login" placeholder="Логин">
        <input type="password" name="password" placeholder="Пароль">
    </fieldset>
    <input type="text" name="number" placeholder="Число от 0 до 10"> <br>
    <input type="text" name="translit" placeholder="Строка для транслитерации"> <br>

    <input type="file" name="file">

    <button type="submit">Отправить</button>
</form>