<?php
require_once('functions.php');
require_once('init.php');


// Получение данных из formData
$name = $_POST['name'];
$phoneNumber = $_POST['phoneNumber'];
$description = $_POST['description'];
$id = $_POST['id'];

// Обновление строки в таблице Directory
$sql = "UPDATE Directory SET Name='$name', PhoneNumber='$phoneNumber', Description='$description' WHERE id='$id'";

$con->query($sql);

