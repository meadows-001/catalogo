<?php
require_once '../config.php';

if (!isset($_SESSION['backto'])) {
    $_SESSION['backto'] = $_SERVER['HTTP_REFERER'] ?? '/index.php';
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>login</title>
    <link href="../style/main.css" rel="stylesheet">
    <link href="../style/login.css" rel="stylesheet">
    <link href="../style/navbar.css" rel="stylesheet">

    <link href="../source/img/favicon/login.png" rel="icon">

    <script src="../function/main.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</head>

<body>
    <nav class="navbar">
        <div class="navbar-side-left">
            <ion-icon class="navbar-logo" name="log-in-outline"></ion-icon>
        </div>
        <div class="navbar-side-center"></div>
        <div class="navbar-side-right">
            <a class="navbar-button" onclick="history.back()">
                <label class="navbar-text">cancel</label>
                <ion-icon class="navbar-icon" name="close-outline"></ion-icon>
            </a>
        </div>
    </nav>
    <div class="container">
        <form method="post" action="../function/login/login_function.php">

            <label class="form-title">Log in</label>

            <?php if ($_SESSION['log'] == 'error_log') : ?>
                <label class="form-message"><?= $_SESSION['msg'] ?></label>
                <style type="text/css">
                    .status {
                        background: rgb(200, 0, 0, 0.8);
                    }
                </style>
                <?php unset($_SESSION['msg']); ?>
                <?php $_SESSION['log'] = ''; ?>
            <?php endif; ?>

            <div class="form-container">
                <input class="form-input username" name="username" size="30" placeholder="username" value="<?= $_SESSION['add_data']['username'] ?? '' ?>">
                <canvas class="form-input status"></canvas>
            </div>

            <div class="form-container">
                <input class="form-input password" name="password" type="password" size="30" placeholder="password">
                <canvas class="form-input status"></canvas>
            </div>

            <div class="form-container">
                <input class="form-input submit" type="submit" value="login">
                <label class="form-text">you don't have an account? <a class="form-link" href="register.php">register</a></label>
            </div>
        </form>
    </div>

    <?php unset($_SESSION['add_data']); ?>
</body>

</html>