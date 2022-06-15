<?php

require "../config.php";

#echo '<pre>';  var_export($_POST); var_export($_FILES); die;

$name = $_POST['name'] ?? '';
$company = $_POST['company_id'] ?? null;
$category = $_POST['category_id'] ?? null;
$description = $_POST['description'] ?? '';
$price = $_POST['price'] ?? null;
$link = $_POST['link'] ?? '';

if ($price == '') $price = null;
//var_dump($year);

echo 'name: ', $name, ' company: ', $company, ' category: ', $category, ' description: ', $description, ' price: ', $price, ' link: ', $link;

if ($name == '' || $company == '' || $category == '' || $price == '' || $description == '') {
    $_SESSION['add_data'] =  [
        'msg' => 'Some required data is missing',
        'name' => $name,
        'company' => $company,
        'category' => $category,
        'description' => $description,
        'price' => $price,
        'link' => $link
    ];
    header('location: company_product_add.php');
    die;
}
try {

    $stmt = $db->prepare("
       insert into product 
           (name, company_id, category_id, description, price, link) VALUES 
           (:name, :company, :category, :description, :price, :link);
       ");

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':company', $company);
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':link', $link);
    $stmt->execute();


    $find_id = $db->prepare("SELECT id FROM product ORDER BY id desc LIMIT 1");
    $find_id->execute();
    $id = $find_id->fetch(PDO::FETCH_ASSOC);

    //$id = $db->lastInsertId();

    # SAVE THE PICTURE TOO

    if (isset($_FILES['input-image']) and $_FILES['input-image']['error'] == 0) {
        move_uploaded_file($_FILES['input-image']['tmp_name'], "../src/product/$id[id].jpg");
    }
} catch (PDOException $e) {
    echo "Errore: " . $e->getMessage();
    header('location: company_product_add.php');
    die();
}

header('location: ../index.php');
