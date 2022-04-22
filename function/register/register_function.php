<?php

require "../../config.php";

var_export($_POST); #die;

$username = $_POST['username'] ?? '';
$role = $_POST['role'] ?? '';
$password = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm-password'] ?? '';


if ($username === '' || $role === '' || ($role != 'client' && $role != 'company') || $password != $confirm_password) {
    $_SESSION['add_data'] = [
        'msg' => 'some require data is missing or wrong',
        'username' => $username
    ];
    header('location: ../../page/register.php');
    die();
}


try {
    $stmt = $db->prepare("
        INSERT INTO user SET 
            username = :username,
            role = :role,
            password = MD5(CONCAT(:password, :salt))
    ");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':role', $role);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':salt', $security_salt);
    $stmt->execute();



} catch (PDOException $e) {
    echo "Errore: " , $e->getMessage();
    die();

}


header('location: /index.php');

