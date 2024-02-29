<?php
require_once('helpers.php');
require_once('functions.php');
require_once('init.php');
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=`device-width`, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Test</title>
</head>

<body>
    <main>
        <table>
            <thead>
                <tr>
                    <td class="th">ФИО</td>
                    <td class="th">Телефон</td>
                    <td class="th">Кем приходится</td>
                    <td class="th">Кнопки действий</td>
                </tr>
            </thead>
            <tbody>
                <?php $values = get_values($con); ?>
                <?php if (!empty($values)): ?>
                    <?php foreach ($values as $value): ?>
                        <tr>
                            <td>
                                <?= $value['Name'] ?>
                            </td>
                            <td>
                                <?= $value['PhoneNumber'] ?>
                            </td>
                            <td>
                                <?= $value['Description'] ?>
                            </td>
                            <td class="actions">
                                <button class="delete-button">Удалить</button>
                                <button class="edit-button">Редактировать</button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php else: ?>
                    <tr>
                        <td>Пока что пусто</td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
        <button class="add-button">Добавить</button>
    </main>
    <div class="modal-background">

    </div>
    <div class="modal">
        <div class="content-center">
            <div class="login-form">
                <form action="form.php" method="post">
                    <label for="name">ФИО:</label>
                    <input type="name" id="name" name="name" placeholder="Введите ФИО">
                    <label for="number">Телефон:</label>
                    <input type="number" id="number" name="number" placeholder="+7(9XX) XXX XX-XX">
                    <label for="description">Кем приходится:</label>
                    <input type="description" id="description" name="description" placeholder="Кем приходится">
                    <button class="submite-button">Записать</button>
                </form>
            </div>
        </div>

    </div>
    <script src="js/jquery-3.6.3.js"></script>
    <script src="ajax/ajax.js"></script>
</body>

</html>