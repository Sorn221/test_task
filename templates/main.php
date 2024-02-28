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
        <div class="container text-container">
            <div class="row row-cols-1">
                <div class="col">
                    <table>
                        <tr class="table-head">
                            <td>ФИО</td>
                            <td>Телефон</td>
                            <td>Кем приходится</td>
                            <td>Кнопки действий</td>
                        </tr>
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
                                    <td class="buttons">
                                        <button>Удалить</button>
                                        <button>Редактировать</button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php else: ?>
                            <tr>
                                <td>Пока что пусто</td>
                            </tr>
                        <?php endif ?>
                    </table>
                </div>

                <div class="col">

                    <button class="add-button">Добавить</button>

                </div>
            </div>

        </div>
    </main>
    <div class="modal-background">

    </div>
    <div class="modal">
        <form action="">

        </form>
    </div>
    <script src="js/main.js"></script>
</body>

</html>