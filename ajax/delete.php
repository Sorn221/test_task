<?php
require_once('functions.php');
require_once('init.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM Directory WHERE ID = $id";
    $con->query($sql);
}
