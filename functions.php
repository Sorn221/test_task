<?php
/**
 * Возвращает список записанных значений
 * 
 * @param mysqli $con подключение к базе
 * 
 * @return array массив значений из бд
 */
function get_values($con): array
{

    $sql = "SELECT * FROM Directory";

    return mysqli_fetch_all(mysqli_query($con, $sql), MYSQLI_ASSOC);
}
/**
 * Добавляет запись в бд
 * 
 * @param mysqli $con подключение к базе
 * @param string $name имя
 * @param string $number номер телефона
 * @param string $description кем приходится
 *
 * @return int id добавленной записи
 */
function add_directory(string $name, string $number, string $description, mysqli $con): int
{
    $sql = "INSERT INTO Directory(`Name`, `PhoneNumber`, `Description`)
            VALUES(?,?,?);";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param(
        $stmt,
        'sss',
        $name,
        $number,
        $description,
    );
    mysqli_stmt_execute($stmt);
    return $con->insert_id;
}

/**
 * Выбирает запись из базы данных по ее id
 *
 * @param mysqli $con соединение с базой данных
 * @param string $id id записи
 *
 * @return array данные записи
 */
function get_directory_by_id(mysqli $con, int $id)
{
    $sql = 'SELECT * FROM `Directory`
             WHERE `ID` = ?';
    $prepare_values = mysqli_prepare($con, $sql);

    mysqli_stmt_bind_param($prepare_values, 'i', $id);
    mysqli_stmt_execute($prepare_values);

    return mysqli_fetch_assoc(mysqli_stmt_get_result($prepare_values)) ?? [];
}

function delete_row($id, $con)
{
    $sql = "DELETE FROM Directory 
            WHERE ID = ?";
    $prepare_values = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($prepare_values, 'i', $id);
    mysqli_stmt_execute($prepare_values);
    mysqli_query($con, $sql);
}

