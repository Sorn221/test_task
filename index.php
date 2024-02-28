<?php
require_once('helpers.php');
require_once('functions.php');
require_once('init.php');

$values = get_values($con);
$content = include_template('main.php', ['values' => $values]);
print $content;