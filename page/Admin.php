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
    <link href="../style/features/navbar.css" rel="stylesheet">

    <link href="../style/features/profile.css" rel="stylesheet">
    <link href="../style/features/product.css" rel="stylesheet">
    <link href="../style/page/admin.css" rel="stylesheet">

    <script src="../function/main.js" rel="script"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>
<body>

<div class="grid-page">
    <div class="navbar">
        <nav class="navbar" id="navbar">
            <div class="left">
                <ion-icon class="header-icon" name="extension-puzzle-outline"></ion-icon>
            </div>
            <div class="center"></div>
            <div class="right">
                <a class="navbar-button" href="setting.php">
                    <label class="header-menu-text">setting</label>
                    <ion-icon class="header-menu-icon" name="cog-outline"></ion-icon>
                </a>
                <a class="navbar-button" href="../function/login/logout_function.php">
                    <label class="header-menu-text">logout</label>
                    <ion-icon class="header-menu-icon" name="log-out-outline"></ion-icon>
                </a>
                <a class="navbar-button show-profile" id="show" onclick="show_div()">
                    <label class="header-menu-text text-profile">profile</label>
                    <ion-icon class="header-menu-icon icon-profile" name="person-outline"></ion-icon>

                    <label class="header-menu-text text-product">product</label>
                    <ion-icon class="header-menu-icon icon-product" name="pricetag-outline"></ion-icon>
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
        <div class="menu"></div>
        <div class="main" id="profiles"></div>
        <div class="main" id="products"></div>
        <div class="right"></div>
        <div class="footer"></div>
    </div>
</div>
</div>
<canvas id="background"></canvas>
<script>
    window.onload = function () {
        admin_load('profile.php', (text) => {
            document.getElementById('profiles').innerHTML = text
        })

        admin_load('product.php', (text) => {
            document.getElementById('products').innerHTML = text
        })
    }
</script>

</body>
