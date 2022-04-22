<?php

$id = $_GET['id'] ?? 0;

echo 'id uguale a: ',  $id;

require "../../config.php";


try {
    $stmt_book = $db->prepare("DELETE FROM user WHERE id = ?");
    $stmt_book->bindParam(1, $id);
    $stmt_book->execute();

    if (file_exists("../../source/product/$id.jpg")) {
        unlink("../../source/product/$id.jpg");
    }

} catch (PDOException $e) {
    echo "Errore: " , $e->getMessage();
    die();

}

header('location: /index.php');
