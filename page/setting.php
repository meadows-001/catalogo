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
    <link href="../style/page/setting.css" rel="stylesheet">
    <link href="../style/features/navbar.css" rel="stylesheet">

    <script src="../function/main.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body>
    <div class="grid-page">
        <div class="navbar-main">
            <nav class="navbar" id="navbar">
                <div class="left">
                    <ion-icon class="header-icon" name="cog-outline"></ion-icon>
                </div>
                <div class="center"></div>
                <div class="right">
                    <a class="navbar-button" href="../function/login/logout_function.php">
                        <label class="header-menu-text">logout</label>
                        <ion-icon class="header-menu-icon" name="log-out-outline"></ion-icon>
                    </a>
                    <a class="navbar-button" id="filter_button">
                        filter
                        <ion-icon class="header-menu-icon" name="funnel-outline"></ion-icon>
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
                <form>
                <div class="background-profile">
                    <div class="border-img">
                        <div class="image-profile"></div>
                    </div>
                </div>
                </form>
            </div>
        </div>


    </div>
    <canvas id="background"></canvas>
</body>

</html>