<?php

require_once '../config.php';

$id = $_SESSION['user']['id'];
$username = $_POST['username'];
$last_password = $_POST['last_password'];
$new_password = $_POST['new_password'];

try {

    if ($last_password != '' && $new_password != '') {
        $verify_password = $db->prepare("SELECT `password` FROM user WHERE id = :id");
        $verify_password->bindParam(':id', $id);
        $verify_password->execute();
        $verify_password = $verify_password->fetch(PDO::FETCH_ASSOC);
        $verify_password = $verify_password['password'];

        $test_password = $db->prepare("SELECT  MD5(CONCAT(:last_password, :security_salt)) as last_password");
        $test_password->bindParam(':last_password', $last_password);
        $test_password->bindParam(':security_salt', $security_salt);
        $test_password->execute();
        $test_password = $test_password->fetch(PDO::FETCH_ASSOC);
        $test_password = $test_password['last_password'];

        if ($verify_password != $test_password) {
            if ($new_password == $last_password) {
                $_SESSION['error'] = 'error';
                $_SESSION['msg'] = "use a password that isn't already used";
                echo 'test 1';
                die();
                header('location: ../page/setting.php');
            } else {
                $_SESSION['error'] = 'error';
                $_SESSION['msg'] = "password inserted isn't correct";
                echo 'test 2';
                die();
                header('location: ../page/setting.php');
            }
        }

        $stmt = $db->prepare("
    UPDATE user SET
        username = :username,
        password = MD5(CONCAT(:password, :salt))
        where id = :id
    ");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $new_password);
        $stmt->bindParam(':salt', $security_salt);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    if (isset($_FILES['input-image']) and $_FILES['input-image']['error'] == 0) {
        move_uploaded_file($_FILES['input-image']['tmp_name'], "../src/profile/$id.jpg");
    }
} catch (PDOException $e) {
    echo "Error", $e->getMessage();
    die();
}

header('location: ../page/setting.php');
