<?php

require_once "../../config.php";

unset($_SESSION['user']);
unset($_SESSION['username']);
$_SESSION['msg'] = 'logout';
echo $_SESSION['msg'];

$backto = $_SESSION['backto'] ?? '../../index.php';
unset($_SESSION['backto']);
echo $backto;
header("location: /index.php");



