<?php
require "../config.php";
require_once '../authorized.php';
verify('company');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>new product</title>

    <link href="../style/main.css" rel="stylesheet">
    <link href="../style/modify-add.css" rel="stylesheet">
    <link href="../style/navbar.css" rel="stylesheet">

    <script src="main.js" rel="script"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body>
    <nav class="navbar" id="navbar">
        <div class="navbar-side-left">
            <ion-icon class="navbar-logo" name="bag-add-outline"></ion-icon>
        </div>
        <div class="navbar-side-center"></div>
        <div class="navbar-side-right">
            <a class="navbar-button r" onclick="history.back()">
                <label class="navbar-text">cancel</label>
                <ion-icon class="navbar-icon" name="close-outline"></ion-icon>
            </a>
        </div>
    </nav>
    <div class="container">
        <?php

        try {

            $stmt_product = $db->prepare("SELECT * FROM product WHERE id = :id");
            $stmt_product->bindParam(":id", $id);
            $stmt_product->execute();
            $product = $stmt_product->fetch(PDO::FETCH_ASSOC);

            $stmt_category = $db->prepare("SELECT * FROM category");
            $stmt_category->execute();

            $stmt_company = $db->prepare("SELECT id FROM user WHERE username = :username");
            $stmt_company->bindParam(":username", $_SESSION['user']['username']);
            $stmt_company->execute();

            $id_company = $stmt_company->fetch(PDO::FETCH_ASSOC);
            $id_company = $id_company['id'];
        } catch (PDOException $e) {
            echo "Errore: " . $e->getMessage();
            die();
        }

        $company = $_SESSION['user']['username'];

        if (isset($_SESSION['add_data'])) {
            $msg = $_SESSION['add_data']['msg'];
            $name = $_SESSION['add_data']['name'];
            $category = $_SESSION['add_data']['category'];
            $description = $_SESSION['add_data']['description'];
            $price = $_SESSION['add_data']['price'];
            $link = $_SESSION['add_data']['link'];
            unset($_SESSION['add_data']);
        } else {
            $msg = '';
            $name = '';
            //$company = '';
            $category = '';
            $description = '';
            $price = '';
            $link = '';
        }

        ?>
        <form method="post" action="company_product_add_function.php" enctype="multipart/form-data">

            <label class="form-title">Add Product</label>

            <div class="form-container-image">
                <input id="input-image" name="input-image" type='file' onchange="select_image(this);">
                <div class="form-button-image">
                    browse
                    <ion-icon class="icon" name="image-outline"></ion-icon>
                </div>

                <ion-icon class="default" name="alert-outline"></ion-icon>
                <img id="item-image" class="image">

            </div>


            <div class="form-container">
                <div class="form-container-input">
                    <label class="form-label name" for="name">name</label>
                    <input class="form-input" type="text" name="name" value="<?= $name ?>">
                </div>

                <div class="form-container-input">
                    <label class="form-label company" for="company">company</label>
                    <label class="form-input" name="company">
                        <?= $company ?>
                        <input hidden value="<?= $id_company ?>" name="company_id">
                    </label>
                </div>

                <div class="form-container-input">
                    <label class="form-label category" for="category">category</label>
                    <select class="form-input" name="category_id">
                        <option hidden>category</option>
                        <?php while ($row = $stmt_category->fetch(PDO::FETCH_ASSOC)) : ?>
                            <?php $selected = ($row['id'] == $product['category_id']) ? 'selected' : '' ?>
                            <option value="<?= $row['id'] ?>" <?= $selected ?>><?= $row['name'] ?></option>
                        <?php endwhile ?>
                    </select>
                </div>

                <div class="form-container-input">
                    <label class="form-label description" for="description">description</label>
                    <input class="form-input" type="text" name="description" value="<?= $description ?>">
                </div>

                <div class="form-container-input">
                    <label class="form-label price" for="price">Price</label>
                    <input class="form-input" type="number" name="price" value="<?= $price ?>">
                </div>

                <div class="form-container-input">
                    <label class="form-label link" for="link">Link</label>
                    <input class="form-input" type="url" name="link" value="<?= $link ?>">
                </div>

                <input hidden id="id" name="id" type="number" value="<?= $id ?>">
            </div>

            <div class="form-container buttons">
                <input class="form-button reset" type="reset" value="reset">
                <input class="form-button" type="submit" value="save">
            </div>
        </form>
    </div>
    </div>
    </div>
    <canvas id="background"></canvas>

</body>

</html>