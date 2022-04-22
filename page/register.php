<?php
require_once '../config.php';

if (isset($_SESSION['add_data'])) {
    $msg = $_SESSION['add_data']['msg'];
    $username = $_SESSION['add_data']['username'];
    unset($_SESSION['add_data']);
} else {
    $msg = '';
    $username = '';
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>register</title>
    <link href="../style/main.css" rel="stylesheet">
    <link href="../style/page/login.css" rel="stylesheet">
    <link href="../style/features/navbar.css" rel="stylesheet">

    <link href="../source/img/favicon/login.png" rel="icon">

    <script src="../function/main.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</head>
<body>

<div class="grid-page">
    <div class="navbar">
        <nav class="navbar" id="navbar">
            <div class="left">
                <ion-icon class="header-icon" name="log-in-outline"></ion-icon>
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
            <form method="post" action="../function/register/register_function.php" id="form">

                <label class="form-title">Register</label>

                <div>
                    <div class="form-container">
                        <input class="form-textarea" name="username" size="30" placeholder="username"
                               value="<?= $username ?>">
                        <canvas class="form-textarea-status"></canvas>
                    </div>

                    <div class="form-container">
                        <select class="form-textarea" name="role">
                            <option value="" hidden>role</option>
                            <option value="client">client</option>
                            <option value="company">company</option>
                        </select>
                        <canvas class="form-textarea-status"></canvas>
                    </div>

                    <div class="form-container">
                        <input class="form-textarea" name="password" type="password" size="30" placeholder="password">
                        <canvas class="form-textarea-status"></canvas>
                    </div>

                    <div class="form-container">
                        <input class="form-textarea" name="confirm-password" type="password" size="30"
                               placeholder="confirm password">
                        <canvas class="form-textarea-status"></canvas>
                    </div>
                </div>

                <div class="form-container">
                    <input id="submit" type="submit" value="register">
                </div>
            </form>
        </div>
    </div>
</div>
<canvas id="background"></canvas>
</body>