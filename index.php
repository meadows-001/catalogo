<?php
require_once 'config.php';

if ($_SESSION['msg'] == 'logout' || $_SESSION['msg'] == '') {
    header('location: page/home.php');
    $_SESSION['msg'] = '';
}

else if ($_SESSION['msg'] == 'username or password wrong') {
    header('location: page/login.php');
    $_SESSION['msg'] = 'username or password wrong';
}

else if ($_SESSION['user']['role'] ?? '') {
    if ($_SESSION['user']['role'] == 'company') header('location: page/Company.php');
    else if ($_SESSION['user']['role'] == 'admin') header('location: page/Admin.php');
    else if ($_SESSION['user']['role'] == 'client') header('location: page/Client.php');
}



?>

<html>
<head>
    <title> Error </title>
</head>
<body>
<h1>redirect</h1>
</body>
</html>
