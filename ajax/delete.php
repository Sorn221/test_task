<?php
require_once('functions.php');
require_once('init.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    delete_row($id, $con);
}
