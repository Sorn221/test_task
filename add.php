<?php
require_once('init.php');

$name = $_POST['name'];
$number = $_POST['number'];
$description = $_POST['description'];

$sql = "INSERT INTO Directory (Name, PhoneNumber, Description) VALUES ('$name', '$number','$description')";

$con->query($sql);

//обновление таблицы html
$sql = "SELECT * FROM Directory";
$values = $con->query($sql);

$html = '<table id="tbl">';
$html .= '<tr>
<td class="th">ФИО</td>
<td class="th">Телефон</td>
<td class="th">Кем приходится</td>
<td class="th">Кнопки действий</td>
</tr>';

foreach ($values as $value) {
    $html .= '<tr>';
    $html .= '<td>' . $value['Name'] . '</td>';
    $html .= '<td>' . $value['PhoneNumber'] . '</td>';
    $html .= '<td>' . $value['Description'] . '</td>';
    $html .= '<td class="actions">
            <button class="delete-button" type="button" data-id=' . $value["ID"] . '>Удалить</button>
            <button class="edit-button" type="button" data-id=' . $value["ID"] . '>Редактировать</button>
            </td>';
    $html .= '</tr>';
}

$html .= '</table>';

// Возвращаем HTML-код в ответе
echo $html;