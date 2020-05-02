<?php
error_reporting('E_All');
ini_set('display_errors', 1);

require_once ("Controller/Application.php");

session_start();

$app = new Application;
$app->do();

?>