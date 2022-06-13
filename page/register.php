<?php
require_once '../config.php';

if (isset($_SESSION['add_data'])) {
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
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>register</title>
    <link href="../style/main.css" rel="stylesheet">
    <link href="../style/register.css" rel="stylesheet">
    <link href="../style/navbar.css" rel="stylesheet">

    <link href="../source/img/favicon/login.png" rel="icon">

    <script src="../function/main.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</head>

<body>
    <nav class="navbar" id="navbar">
        <div class="navbar-side-left">
            <ion-icon class="navbar-logo" name="log-in-outline"></ion-icon>
        </div>
        <div class="navbar-side-center"></div>
        <div class="navbar-side-right">
            <a class="navbar-button r" onclick="history.back()">
                <label class="navbar-text">cancel</label>
                <ion-icon class="navbar-icon" name="close-outline"></ion-icon>
            </a>
        </div>
    </nav>
    </div>
    <div class="container">
        <form method="post" action="../function/register/register_function.php" enctype="multipart/form-data">

            <label class="form-title">Register</label>

            <div class="form-container-image">
                <input id="input-image" name="input-image" type='file' onchange="select_image(this);" />
                <div class="form-button-image">
                    browse
                    <ion-icon class="icon" name="image-outline"></ion-icon>
                </div>

                <ion-icon class="default" name="alert-outline"></ion-icon>
                <img id="item-image" class="image">
            </div>

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

            <div class="form-container field">
                    <input class="form-input" name="username" size="30" placeholder="username" value="<?= $username ?>">

                    <select class="form-input" name="role">
                        <option value="" hidden>role</option>
                        <option value="client">client</option>
                        <option value="company">company</option>
                    </select>

                    <input class="form-input" name="password" type="password" size="30" placeholder="password">
         
                    <input class="form-input" name="confirm-password" type="password" size="30" placeholder="confirm password">

            </div>

            <div class="form-container">
                <input class="form-input submit" type="submit" value="register">
            </div>
        </form>
    </div>
</body>