<?php
    require_once '../config.php';
    require_once '../authorized.php';
    verify('client');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Home ~ <?= $_SESSION['user']['username'] ?></title>
    <link href="../source/favicon/shop.png" rel="icon">

    <link href="../style/main.css" rel="stylesheet">
    <link href="../style/home.css" rel="stylesheet">
    <link href="../style/navbar.css" rel="stylesheet">
    <link href="../style/item.css" rel="stylesheet">

    <script src="../function/main.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body>

            <nav class="navbar" id="navbar">
                <div class="navbar-side-left">
                    <ion-icon class="navbar-logo" name="bag-handle-outline"></ion-icon>
                </div>
                <div class="navbar-side-center">
                </div>
                <div class="navbar-side-right">
                <a class="navbar-button" href="setting.php">
                    <label class="navbar-text">setting</label>
                    <ion-icon class="navbar-icon" name="cog-outline"></ion-icon>
                </a>
                    <a class="navbar-button" href="../function/logout_function.php">
                        <label class="navbar-text">logout</label>
                        <ion-icon class="navbar-icon" name="log-out-outline"></ion-icon>
                    </a>
                </div>
            </nav>

        <div class="container">
            <div class="main" id="products"></div>
        </div>
    <script>
        window.onload = function() {
            ajax_load('home_client_product.php', (text) => {
                document.getElementById('products').innerHTML = text
            })

        }
    </script>

</body>

</html>