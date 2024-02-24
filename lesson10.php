<?php

?>

<form action="server13.php" method="post">
    <fieldset>
        <legend>Номер</legend>
        <input type="tel" name="tel" pattern="+375-[0-9]{2}-[0-9]{3}-[0-9]{2}-[0-9]{2}" placeholder="+375-..-...-..-.." required>
    </fieldset>

    <fieldset>
        <legend>Адрес</legend>
        <input type="text" name="country" pattern="^[a-zA-Zа-яА-Я\s-]+$" placeholder="Страна" required>
        <input type="text" name="city" pattern="^[a-zA-Zа-яА-Я\s-]+$" placeholder="Город" required>
        <input type="text" name="street" pattern="^[a-zA-Zа-яА-Я\s-]+$" placeholder="Улица" required>
    </fieldset>

    <fieldset>
        <legend>Дата рождения</legend>
        <input type="date" name="births-date" required>
    </fieldset>

    <fieldset>
        <legend>E-mail</legend>
        <input type="email" name="email" required>
    </fieldset>

    <fieldset>
        <legend>Пол</legend>
        <div>
    <input type="radio" name="gender" id="female" value="female" checked/>
    <label for="female">Женский</label>

    <input type="radio" name="gender" id="male" value="male"/>
    <label for="male">Мужской</label>
        </div>
    </fieldset>

    <button type="submit">Отправить</button>
</form>
