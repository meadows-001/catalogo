<?php

require "../config.php";

#echo '<pre>';  var_export($_POST); var_export($_FILES); die;

$name = $_POST['name'] ?? '';
$company = $_POST['company_id'] ?? '';
$category = $_POST['category_id'] ?? '';
$description = $_POST['description'] ?? '';
$price = $_POST['price'] ?? null;
$link = $_POST['link'] ?? '';
$id = $_POST['id'] ?? 0;

if ($price == '') $price = null;
if ($id == '') $id = 0;
//var_dump($year);

if ($name == '') {
    $_SESSION['add_data'] =  [
        'msg' => 'Some required data is missing',
        'id' => $id,
        'name' => $name ,
        'company' => $company,
        'description' => $description ,
        'price' => $price,
        'link' => $link
    ];
    header('location: /function/common/product_modify.php?id=' . $id);
    die;
}
try {

    $stmt = $db-> prepare("
       UPDATE product SET
        name = :name,
        company_id = :company,
        category_id = :category,
        description = :description,
        price = :price,
        link = :link
       
        where id = :id
    ");

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':company', $company);
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':link', $link);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    # SAVE THE PICTURE TOO

    if (isset($_FILES['input-image']) and $_FILES['image']['error'] == 0) {
        move_uploaded_file($_FILES['input-image']['tmp_name'], "../src/product/$id.jpg");
    }


}catch (PDOException $e) {
    echo "Errore: " . $e->getMessage();
    die();
}

header('location: /index.php');


?>



