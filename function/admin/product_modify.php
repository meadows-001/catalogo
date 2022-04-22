<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>add book</title>

    <link href="../../style/main.css" rel="stylesheet">
    <link href="../../style/features/navbar.css" rel="stylesheet">
    <link href="../../style/page/admin.css" rel="stylesheet">
    <link href="../../style/features/product.css" rel="stylesheet">

    <script src="../main.js" rel="script"></script>

</head>
<body>

<?php require "../../config.php"; ?>

<nav class="navbar" id="navbar">
    <div class="nav_box" id="left">
        <img id="nav_img" src="../../source/sprite/admin.png"
             onclick="window.location.href='../../index.php'">
    </div>
    <div class="filler"></div>
    <div class="nav_box" id="right">
        <a class="nav_button" href="../login/logout_function.php">logout</a>
        <a class="nav_button" onclick="history.back()" >cancel</a>
    </div>
    <a class="responsive_button" onclick="navbar()">
        <img src="../../source/sprite/menu.png">
    </a>
</nav>


<?php

$id = intval($_GET['id']) ?? 0;

try {

$stmt_product = $db->prepare("SELECT * FROM product WHERE id = :id");
$stmt_product->bindParam(":id", $id);
$stmt_product->execute();
$product = $stmt_product->fetch(PDO::FETCH_ASSOC);

$stmt_company = $db->prepare("SELECT * FROM user WHERE type = 'company'");
$stmt_company->execute();

}catch (PDOException $e) {
echo "Errore: " . $e->getMessage();
die();
}

if (isset($_SESSION['add_data'])) {
    $msg = $_SESSION['add_data']['msg'];
    $name = $_SESSION['add_data']['name'];
    $company= $_SESSION['add_data']['company'];
    $description = $_SESSION['add_data']['description'];
    $price = $_SESSION['add_data']['price'];
    $link = $_SESSION['add_data']['link'];
    unset($_SESSION['add_data']);
} else {
    $msg = '';
    $name = $product['name'];
    $company = $product['company'];
    $description =  $product['description'];
    $price = $product['price'];
    $link = $product['link'];
}

?>
<br>

<form method="post" action="product_modify_function.php" enctype="multipart/form-data">

    <div style="padding: 10px">


        <input id="image" name="image" type='file' onchange="select_image(this);"/>
        <?php if (file_exists("../../source/product/$product[id].jpg")): ?>
            <div class="img-box"><img id="pim" class="image" src="../../source/product/<?= $product['id'] ?>.jpg"></div>
        <?php else: ?>
            <div class="img-box"><img id="pim" class="image" src="../../source/product/default.png" style="opacity: 50%"></div>
        <?php endif; ?>

        <label for="name">name</label>
        <input id="name" type="text" name="name" size="60" maxlength="255" value="<?= $name ?>">
        <br><br>


        <label for="company_id">company</label>
        <select name="company_id" id="company_id">
            <option>-- select a company --</option>
            <?php while($row = $stmt_company->fetch(PDO::FETCH_ASSOC)): ?>
                <?php $selected = ($row['username'] == $company) ? 'selected' : '' ?>
                <option value="<?= $row['username'] ?>" <?= $selected ?> ><?= $row['username'] ?></option>
            <?php endwhile ?>
        </select>
        <br><br>

        <label for="description">description</label>
        <input id="description" type="text" name="description" value="<?= $description ?>">
        <br><br>

        <label for="price">Price</label>
        <input id="price" type="number" name="price" value="<?= $price ?>">
        <br><br>

        <label for="link">Link</label>
        <input id="link" type="text" name="link"value="<?= $link ?>">
        <br><br>

        <input id="id" name="id" type="number" value="<?= $id ?>">
    </div>

    <div style="display: flex;
    justify-content: center;
    align-items: center;">
        <input class="form-button" type="reset">
        <input class="form-button" type="submit" value="save">
    </div>
</form>

</body>
</html>