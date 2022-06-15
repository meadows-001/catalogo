<?php

require_once "../config.php";

$user = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if ($user == '' ||  $password == '') {
    $_SESSION['add_data'] = ['username' => $user];
    $_SESSION['msg'] = 'complete field';
    $_SESSION['log'] = 'error_log';
    header('location: ../page/login.php');
    die();
}

unset($_SESSION['user']);

try {
    $stmt = $db->prepare(" 
        SELECT id, username, role FROM user WHERE 
                    username=:username  AND `password` = MD5(CONCAT(:password, :salt))
    ");
    $stmt->bindParam(':username', $user);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':salt', $security_salt);
    $stmt->execute();
    if ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $_SESSION['user'] = $user;
        $_SESSION['log'] = 'logged';
    } else {
        $_SESSION['log'] = 'error_log';
        $_SESSION['msg'] = 'username or password wrong';
    }
} catch (PDOException $e) {
    echo "Errore: " . $e->getMessage();
    die();
}


$backto = $_SESSION['backto'] ?? '/index.php';
unset($_SESSION['backto']);
header("location: ../index.php");
