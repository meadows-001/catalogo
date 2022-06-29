<?php

$id = $_GET['id'] ?? 0;

echo 'id uguale a: ',  $id;

require "../config.php";

if ($id == 1) {
    header('location: ../index.php');
    die();
}
try {
    $stmt = $db->prepare("DELETE FROM user WHERE id = :id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    if (file_exists("../src/profile/$id.jpg")) {
        unlink("../src/profile/$id.jpg");
    }

    if($id == $_SESSION['user']['id']) {
        unset($_SESSION['user']);
    }

} catch (PDOException $e) {
    echo "Errore: " , $e->getMessage();
    die();

}

header('location: ../index.php');
