<?php
require_once('functions.php');
require_once('init.php');

if ($_POST['add']) {
    add_directory($_POST['name'], $_POST['number'], $_POST['description'], $con);
}
if ($_POST['delete']) {
    delete_row($_POST['ID'], $con);
}
if ($_POST['edit']) {
    update_directory($id, $_POST['name'], $_POST['number'], $_POST['description'], $con);
}
