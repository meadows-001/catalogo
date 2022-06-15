<?php

$id = $_GET['id'] ?? 0;

echo 'id uguale a: ',  $id;

require "../config.php";


try {
    $stmt = $db->prepare("DELETE FROM product WHERE id = ?");
    $stmt->bindParam(1, $id);
    $stmt->execute();

    if (file_exists("../src/product/$id.jpg")) {
        unlink("../src/product/$id.jpg");
    }

} catch (PDOException $e) {
    echo "Errore: " , $e->getMessage();
    die();

}

header('location: ../index.php');
