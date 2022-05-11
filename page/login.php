<?php
require_once '../config.php';

if (!isset($_SESSION['backto'])) {
    $backto = $_SERVER['HTTP_REFERER'] ?? '/index.php';
    if ($backto == '') { $backto = '/index.php'; }
    $_SESSION['backto'] = $backto;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>login</title>
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
                <a class="navbar-button" onclick="history.back()" >
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
            <form method="post" action="../function/login/login_function.php" id="form">

                <label class="form-title">Log in</label>

                <?php if (!empty($_SESSION['msg'])): ?>
                    <label class="message"><?= $_SESSION['msg'] ?></label>
                    <?php unset($_SESSION['msg']) ?>
                    <style type="text/css">
                        .form-textarea-status {
                            background: #cd000a;
                        }
                    </style>
                <?php endif; ?>

                <div class="form-container">
                    <input class="form-textarea" name="username" size="30" placeholder="username" value="<?= $_SESSION['add_data']['username'] ?? '' ?>">
                    <canvas class="form-textarea-status"></canvas>
                </div>

                <div class="form-container">
                    <input class="form-textarea" name="password" type="password" size="30" placeholder="password">
                    <canvas class="form-textarea-status"></canvas>
                </div>

                <div class="form-container">
                    <input id="submit" type="submit" value="login">
                    <label class="text">you don't have an account? <a class="link" href="register.php" >register</a></label>
                </div>
                 </form>
        </div>
    </div>
</div>
<canvas id="background"></canvas>
</body>
</html>