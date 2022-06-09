<?php
require_once '../config.php';
require_once '../authorized.php';
verify('admin');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>admin ~ <?= $_SESSION['user']['username'] ?></title>
    <link href="../source/favicon/admin.png" rel="icon">

    <link href="../style/main.css" rel="stylesheet">
    <link href="../style/admin.css" rel="stylesheet">
    <link href="../style/navbar.css" rel="stylesheet">

    <script src="../function/main.js" rel="script"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>
<body>

        <nav class="navbar">
            <div class="navbar-side-left">
                <ion-icon class="navbar-logo" name="extension-puzzle-outline"></ion-icon>
            </div>
            <div class="navbar-side-center"></div>
            <div class="navbar-side-right">
                <a class="navbar-button show-profile g" id="show" onclick="show_div()">
                    <label class="navbar-text text-profile">profile</label>
                    <ion-icon class="navbar-icon icon-profile" name="person-outline"></ion-icon>

                    <label class="navbar-text text-product">product</label>
                    <ion-icon class="navbar-icon icon-product" name="pricetag-outline"></ion-icon>
                </a>
                <a class="navbar-button g" href="setting.php">
                    <label class="navbar-text">setting</label>
                    <ion-icon class="navbar-icon" name="cog-outline"></ion-icon>
                </a>
                <a class="navbar-button r" href="../function/login/logout_function.php">
                    <label class="navbar-text">logout</label>
                    <ion-icon class="navbar-icon" name="log-out-outline"></ion-icon>
                </a>
            </div>
        </nav>


    <div class="container">
        <div class="main" id="profiles"></div>
        <div class="main" id="products"></div>
    </div>
<script>
    window.onload = function () {
        ajax_load('admin_profile.php', (text) => {
            document.getElementById('profiles').innerHTML = text
        })

        ajax_load('admin_product.php', (text) => {
            document.getElementById('products').innerHTML = text
        })
    }
</script>

</body>
