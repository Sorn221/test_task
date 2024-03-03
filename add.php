<?php
require_once('functions.php');
require_once('init.php');

$name = $_POST['name'];
$number = $_POST['number'];
$description = $_POST['description'];

$sql = "INSERT INTO Directory (Name, PhoneNumber, Description) VALUES ('$name', '$number','$description')";

$con->query($sql);
