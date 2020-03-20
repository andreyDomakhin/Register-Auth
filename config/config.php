<?php

$db_host = 'localhost';
$db_name = 'proj_reg';
$db_charset = 'utf8';
$db_user = 'root';
$db_pass = '';
$opt = [
    PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES      => false,
];

define('DSN', 'mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=' . $db_charset);
define('DB_USER', $db_user);
define('DB_PASS', $db_pass);
define('DB_OPT', $opt);