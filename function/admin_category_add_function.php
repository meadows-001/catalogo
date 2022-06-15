<?php

require_once '../config.php';

$name = $_POST['name'];

try {

    if ($name == '') {
        $_SESSION['error'] = 'error';
        $_SESSION['msg'] = "field incomplete";
        header('location: ../page/admin.php');
        die();
    }

    $stmt = $db->prepare("INSERT INTO category SET name = :name");
    $stmt->bindParam(':name', $name);
    $stmt->execute();
} catch (PDOException $e) {
    echo "Error", $e->getMessage();
    $_SESSION['error'] = 'error';
    $_SESSION['msg'] = "catgory already exist";
    header('location: ../page/admin.php');
    die();
}

header('location: ../page/admin.php');
