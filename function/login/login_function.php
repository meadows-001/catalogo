<?php

require_once "../../config.php";

#var_export($_POST);

$user = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

echo $user, $password;

if ($user == '' ||  $password == '') {
    $_SESSION['add_data'] = [
        'msg' => 'complete field',
        'username' => $user
    ];
    header('location: ../../page/login.php');
    die();
}

unset($_SESSION['user']);

try {
    $stmt = $db-> prepare(" 
        SELECT id, username, role FROM user WHERE 
                    username=:username  AND `password` = MD5(CONCAT(:password, :salt))
    ");
    $stmt->bindParam(':username', $user);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':salt', $security_salt);
    $stmt->execute();
    if ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $_SESSION['user'] = $user;
        $_SESSION['username'] = $_POST['username'] ?? '';
        $_SESSION['msg'] = 'ok';
    } else {
        $_SESSION['msg'] = 'username or password wrong';
    }
}catch (PDOException $e) {
    echo "Errore: " . $e->getMessage();
    die();
}

echo $_SESSION['msg'];

#var_export($_SESSION['user']);

$backto = $_SESSION['backto'] ?? '/index.php';
unset($_SESSION['backto']);

if ($_SESSION['msg'] == 'ok') header("location: /index");
else header("location: /index.php");



