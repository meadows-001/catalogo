<?php
    require_once '../config.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>setting ~ <?= $_SESSION['user']['username'] ?></title>
    <link href="../source/favicon/shop.png" rel="icon">

    <link href="../style/main.css" rel="stylesheet">
    <link href="../style/setting.css" rel="stylesheet">
    <link href="../style/navbar.css" rel="stylesheet">

    <script src="../function/main.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body>
    <nav class="navbar" id="navbar">
        <div class="navbar-side-left">
                    <ion-icon class="navbar-logo" name="cog-outline"></ion-icon>
                </div>
                <div class="navbar-side-center"></div>
                <div class="navbar-side-right">
                <a class="navbar-button r" onclick="history.back()">
                <label class="navbar-text">Home</label>
                <ion-icon class="navbar-icon" name="home-outline"></ion-icon>
            </a>
                </div>
            </nav>

        <div class="grid-container">
            <div class="container">
                <form>
                <div class="background-profile">
                    <div class="border-img">
                        <div class="image-profile"></div>
                    </div>
                </div>
                </form>
            </div>
        </div>
</body>

</html>