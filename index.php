<?php
require_once 'config.php';

if ($_SESSION['log'] == 'error_log') {
    header('location: page/login.php');
    $_SESSION['msg'] = 'username or password wrong';
}

else if ($_SESSION['user']['role'] && $_SESSION['log'] == 'logged') {
    if ($_SESSION['user']['role'] == 'company') header('location: page/company.php');
    else if ($_SESSION['user']['role'] == 'admin') header('location: page/admin.php');
    else if ($_SESSION['user']['role'] == 'client') header('location: page/client.php');
    else {
        $_SESSION['log'] = '';
        unset($_SESSION['user']);
        header('location: page/home.php');  
    }
}

else {
    
    $_SESSION['log'] = '';
    header('location: page/home.php');
    
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
