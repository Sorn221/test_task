<?php
require_once('functions.php');
require_once('init.php');
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=`device-width`, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                                <button class="delete-button" data-id=<?= $value['ID'] ?>>Удалить</button>
                                <button class="edit-button" data-id=<?= $value['ID'] ?>>Редактировать</button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php else: ?>
                    <tr>
                        Пока что пусто
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
        <button class="add-button">Добавить</button>
    </main>
    <div class="modal">
        <div class="content-center">
            <div class="login-form">
                <form class="edit-form">
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
</body>
<script>
    //удаление записи
    $('.delete-button').on('click', function () {

        var id = $(this).data('id');

        $.ajax({

            url: 'delete.php',
            type: 'POST',
            data: { id: id },
            success: function () {
                alert('Запись успешно удалена');
                $(this).closest('tr').remove();
            }
        });
    });
    // редактирование записи 
    $(document).ready(function () {
        $(".edit-button").click(function () {

            document.querySelector('.modal').style.display = "block";

            var id = $(this).data('id');
        });
        $(".submite-button").click(function () {
            var formData = $('.edit-form').serialize();
            formData += '&id=' + id;

            $.ajax({
                type: "POST",
                url: "edit.php",
                data: formData,
                success: function (response) {
                    alert("Данные успешно сохранены!");
                }
            });

            document.querySelector('.modal').style.display = "none"
        });

        // добавление новой записи
        $(".add-button").click(function () {
            document.querySelector('.modal').style.display = "block";
        });
        $(".submite-button").click(function () {
            var data = $(".edit-form").serialize();

            $.ajax({
                type: "POST",
                url: "add.php",
                data: data,
                success: function (response) {
                    alert("Данные успешно сохранены!");
                }
            });

            document.querySelector('.modal').style.display = "none"
        });

    });
</script>

</html>