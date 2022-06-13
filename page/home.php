<?php require_once '../config.php'; ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Home</title>

    <link href="../style/main.css" rel="stylesheet">
    <link href="../style/home.css" rel="stylesheet">
    <link href="../style/navbar.css" rel="stylesheet">

    <script src="../function/main.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body>
    <nav class="navbar">
        <div class="navbar-side-left">
            <ion-icon class="navbar-logo" name="storefront-outline"></ion-icon>
        </div>
        <div class="navbar-side-center"></div>
        <div class="navbar-side-right">
            <a class="navbar-button g" href="login.php">
                <label class="navbar-text">login</label>
                <ion-icon class="navbar-icon" name="log-in-outline"></ion-icon>
            </a>
        </div>
    </nav>

    <div class="container">
        <div class="main" id="items"></div>
    </div>


    <script>
        window.onload = function() {
            ajax_load('home_client_product.php', (text) => {
                document.getElementById('items').innerHTML = text
            })

        }
    </script>

</body>

</html>