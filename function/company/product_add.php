<?php require "../../config.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>new product</title>

    <link href="../../style/main.css" rel="stylesheet">
    <link href="../../style/page/modify-add.css" rel="stylesheet">
    <link href="../../style/features/navbar.css" rel="stylesheet">

    <script src="../main.js" rel="script"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>
<body>

<div class="grid-page">
    <div class="navbar">
        <nav class="navbar" id="navbar">
            <div class="left">
                <ion-icon class="header-icon" name="bag-add-outline"></ion-icon>
            </div>
            <div class="center"></div>
            <div class="right">
                <a class="navbar-button" onclick="history.back()">
                    <label class="header-menu-text">cancel</label>
                    <ion-icon class="header-menu-icon" name="close-outline"></ion-icon>
                </a>
            </div>
            <div class="menu">
                <a class="navbar-menu-button" onclick="navbar()">
                    <ion-icon class="header-icon" name="menu-outline"></ion-icon>
                </a>
            </div>
        </nav>
    </div>

    <div class="grid-container">
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
                $stmt_company->bindParam(":username", $_SESSION['username']);
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
            <form method="post" action="../common/product_add_function.php" enctype="multipart/form-data">

                <input id="image" name="image" type='file' onchange="select_image(this);"/>
                <div id="button-img">
                    browse
                    <ion-icon class="icon" name="image-outline"></ion-icon>
                </div>
                <div class="form-container">
                    <div id="box-img">
                        <div id="box-img"><img id="pim" class="image" src="../../source/product/alert-outline.png"></img></div>
                    </div>

                </div>

                <div class="form-container">
                    <div class="box">
                        <label class="label name" for="name">name</label>
                        <input class="form-textarea" type="text" name="name" value="<?= $name ?>">
                        <div class="form-textarea-status"></div>
                    </div>

                    <div class="box">
                        <label class="label company" for="company">company</label>
                        <label class="form-textarea" name="company">
                            <?= $company ?>
                            <input hidden value="<?= $id_company ?>" name="company_id" >
                        </label>
                        <div class="form-textarea-status"></div>
                    </div>

                    <div class="box">
                        <label class="label category" for="category">category</label>
                        <select class="form-textarea" name="category_id">
                            <option>select a category</option>
                            <?php while($row = $stmt_category->fetch(PDO::FETCH_ASSOC)): ?>
                                <?php $selected = ($row['id'] == $product['category_id']) ? 'selected' : '' ?>
                                <option value="<?= $row['id'] ?>" <?= $selected ?> ><?= $row['name']?></option>
                            <?php endwhile ?>
                        </select>
                        <div class="form-textarea-status"></div>
                    </div>

                    <div class="box">
                        <label class="label description" for="description">description</label>
                        <input class="form-textarea" type="text" name="description" value="<?= $description ?>">
                        <div class="form-textarea-status"></div>
                    </div>

                    <div class="box">
                        <label class="label price" for="price">Price</label>
                        <input class="form-textarea" type="number" name="price" value="<?= $price ?>">
                        <div class="form-textarea-status"></div>
                    </div>

                    <div class="box">
                        <label class="label link" for="link">Link</label>
                        <input class="form-textarea" type="url" name="link"value="<?= $link ?>">
                        <div class="form-textarea-status"></div>
                    </div>

                    <input hidden id="id" name="id" type="number" value="<?= $id ?>">
                </div>

                <div class="form-container">
                    <input class="form-button reset" type="reset">
                    <input class="form-button" type="submit" value="save">
                </div>
            </form>
        </div>
    </div>
</div>
<canvas id="background"></canvas>

</body>
</html>