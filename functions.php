<?php
function get_values($con): array
{

    $sql = "SELECT * FROM Directory";

    return mysqli_fetch_all(mysqli_query($con, $sql), MYSQLI_ASSOC);
}

function delete_row($id, $con)
{
    $sql = "DELETE FROM Directory WHERE ID = $id";
    if ($con->query($sql) === TRUE) {
        echo "Запись успешно удалена";
    } else {
        echo "Ошибка при удалении записи: " . $con->error;
    }
}

function get_directory_by_id(mysqli $con, int $id)
{
    $sql = 'SELECT * FROM `Directory`
             WHERE `ID` = ?';
    $prepare_values = mysqli_prepare($con, $sql);

    mysqli_stmt_bind_param($prepare_values, 'i', $id);
    mysqli_stmt_execute($prepare_values);

    return mysqli_fetch_assoc(mysqli_stmt_get_result($prepare_values)) ?? [];
}

/**
 * Изменяет запись в бд
 * 
 * @param mysqli $con подключение к базе
 * @param int $id имя
 * @param string $name имя
 * @param string $number номер телефона
 * @param string $description кем приходится
 *
 * @return int id добавленной записи
 */
function update_directory(string $name, string $number, string $description, int $id, mysqli $con): int
{
    $sql = "UPDATE Directory
            SET Name='?', PhoneNumber ='?', Description = '?'
            WHERE ID = ?;";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param(
        $stmt,
        'sssi',
        $name,
        $number,
        $description,
        $id
    );
    mysqli_stmt_execute($stmt);
    return $con->insert_id;
}