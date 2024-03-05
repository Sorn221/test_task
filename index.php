<?php
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
        <div id="tbl-container">
            <table id="tbl">
                <thead>
                    <tr>
                        <td class="th">ФИО</td>
                        <td class="th">Телефон</td>
                        <td class="th">Кем приходится</td>
                        <td class="th">Кнопки действий</td>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $sql = "SELECT * FROM Directory";
                    $values = $con->query($sql);

                    if (!empty($values)): ?>

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
                                    <button class="delete-button" type="button" data-id=<?= $value['ID'] ?>>Удалить</button>
                                    <button class="edit-button" type="button" data-id=<?= $value['ID'] ?>>Редактировать</button>
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
        </div>
        <button class="add-button">Добавить</button>
    </main>
    <div class="modal">
        <div class="content-center">
            <div class="login-form">
                <form class="edit-form" id="edit-form" autocomplete="off">
                    <input type="hidden" id="type" value="" name="type" class="form-type hidden">
                    <input type="hidden" id="form-id" value="" name="id" class="form-id hidden">
                    <label for="name">ФИО:</label>
                    <input type="name" id="name" name="name" placeholder="Введите ФИО">
                    <label for="number">Телефон:</label>
                    <input type="number" id="number" name="number" placeholder="+7(9XX) XXX XX-XX">
                    <label for="description">Кем приходится:</label>
                    <input type="description" id="description" name="description" placeholder="Кем приходится">
                    <button class="submite-button" type="button">Записать</button>
                    <span class="form-error">Не правильно заполнена форма!</span>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    //удаление записи
    document.querySelector('#tbl-container').addEventListener('click', function (event) {

        if (event.target.classList.contains('delete-button')) {

            var id = $(event.target).data('id');
            $.ajax({

                url: 'delete.php',
                type: 'POST',
                data: { id: id },
                success: function (response) {
                    $('#tbl').html(response);
                }
            });
        }

        // редактирование записи 

        if (event.target.classList.contains('edit-button')) {

            document.querySelector('.modal').style.display = "block";
            $(".form-type").val("edit");
            $(".form-id").val($(event.target).data('id'));

        };
    });

    //Добавление записи
    $(".add-button").on("click", function () {

        document.querySelector('.modal').style.display = "block";
        $(".form-type").val("add");

    });

    $(".submite-button").on("click", function () {

        var name = $('#name').val();
        var number = $('#number').val();
        var description = $('#description').val();
        var id = $('#form-id').val();
        var type = $('#type').val();

        if (name == '' || number == '' || description == '') {

            document.querySelector('.form-error').style.display = "block"

        } else {
            if (type == 'edit') {
                $.ajax({
                    type: "POST",
                    url: "edit.php",
                    data: { 'name': name, 'number': number, 'description': description, 'id': id },
                    success: function (response) {
                        $('#tbl').html(response);
                        document.getElementById("edit-form").reset();
                    }
                });
            } else {
                $.ajax({
                    type: "POST",
                    url: "add.php",
                    data: { 'name': name, 'number': number, 'description': description },
                    success: function (response) {
                        $('#tbl').html(response)
                        document.getElementById("edit-form").reset();
                    }
                });
            }
            document.querySelector('.modal').style.display = "none"
        }
    });


</script>

</html>