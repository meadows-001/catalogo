<?php

require "../config.php";

var_export($_POST); #die;

$username = $_POST['username'] ?? '';
$role = $_POST['role'] ?? '';
$password = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm-password'] ?? '';


if ($username == '' || $role == '' || ($role != 'client' && $role != 'company') || $password != $confirm_password) {
    $_SESSION['log'] = 'error_log';
    $_SESSION['msg'] = 'some data are missing or wrong';
    $_SESSION['add_data'] = ['username' => $username];
    header('location: ../page/register.php');
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

    $find_id = $db->prepare("SELECT id FROM user ORDER BY id desc LIMIT 1");
    $find_id->execute();
    $id = $find_id->fetch(PDO::FETCH_ASSOC);

    if (isset($_FILES['input-image']) and $_FILES['input-image']['error'] == 0) {
        move_uploaded_file($_FILES['input-image']['tmp_name'], "../src/profile/$id[id].jpg");
    }

} catch (PDOException $e) {
    echo "Errore: " , $e->getMessage();
    $_SESSION['log'] = 'error_log';
    $_SESSION['msg'] = 'username already used';
    header('location: ../page/register.php');
    die();
}


header('location: ../index.php');

