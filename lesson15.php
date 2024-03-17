<form action="server15.php" method="post">
<fieldset>
    <legend>Авторизация</legend>
    <input type="text" name="login" placeholder="Логин">
    <input type="password" name="password" placeholder="Пароль">
    <input type="text" name="name" pattern="^[a-zA-Zа-яА-Я\s-]+$" placeholder="Имя">
</fieldset>
    <button type="submit">Отправить</button>
</form>