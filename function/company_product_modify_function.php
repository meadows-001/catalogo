<?php

require "../config.php";

#echo '<pre>';  var_export($_POST); var_export($_FILES); die;

$name = $_POST['name'] ?? '';
$company = $_POST['company_id'] ?? null;
$category = $_POST['category_id'] ?? null;
$description = $_POST['description'] ?? '';
$price = $_POST['price'] ?? null;
$link = $_POST['link'] ?? '';
$id = $_POST['id'] ?? 0;


//var_dump($year);

if ($name == '' || $company == null || $category == null) {
    $_SESSION['add_data'] =  [
        'msg' => 'Some required data is missing',
        'id' => $id,
        'name' => $name ,
        'company' => $company,
        'category' => $category,
        'description' => $description ,
        'price' => $price,
        'link' => $link
    ];
    header('location: /function/company_product_modify.php?id=' . $id);
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

    if (isset($_FILES['image']) and $_FILES['image']['error'] == 0) {
        move_uploaded_file($_FILES['image']['tmp_name'], "../../source/product/$id.jpg");
    }


}catch (PDOException $e) {
    echo "Errore: " . $e->getMessage();
    die();
}

header('location: /index.php');


?>



