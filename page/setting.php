<?php
require_once '../config.php';
if (!$_SESSION['user']) {
    header('location: ../index.php');
}

$id = $_SESSION['user']['id'];
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
            <a class="navbar-button r" href="../index.php">
                <label class="navbar-text">Home</label>
                <ion-icon class="navbar-icon" name="home-outline"></ion-icon>
            </a>
        </div>
    </nav>
    <div class="container">
        <form method="post" action="../function/user_modify.php" enctype="multipart/form-data">
            <div class="profile-container">
                <div class="profile-container-image">
                <input id="input-image" name="input-image" type='file' onchange="select_image(this);" />
                <div class="form-button-image">
                    browse
                    <ion-icon class="icon" name="image-outline"></ion-icon>
                </div>

                    <?php if (file_exists("../src/profile/$id.jpg")) : ?>
                        <img id="item-image" src="../src/profile/<?= $id ?>.jpg">
                    <?php else : ?>
                        <img id="item-image">
                        <ion-icon class="default" name="person-sharp"></ion-icon>
                    <?php endif; ?>

                </div>
                <label class="profile-label role" type="text" name="role"><?= $_SESSION['user']['role']; ?></label>

            </div>

            <div class="profile-container" style="flex-grow: 1;">
                <div class="profile-container-information">
                    <div class="profile-container">
                        <label class="profile-label"> username:</label>
                        <input class="profile-input" type="text" name="username" value="<?= $_SESSION['user']['username']; ?>">
                    </div>
                    <div class="profile-container">
                        <label class="profile-label"> last password:</label>
                        <input class="profile-input" type="password" name="last_password">
                    </div>
                    <div class="profile-container">
                        <label class="profile-label"> new password:</label>
                        <input class="profile-input" type="password" name="new_password">
                    </div>
                </div>

                <div class="profile-container buttons">
                <input class="form-button reset" type="button" value="remove account" onclick="delete_profile(<?= $_SESSION['user']['id'] ?>);">
                <input class="form-button reset" type="reset" value="reset">
                <input class="form-button" type="submit" value="save">
                </div>
            </div>

        </form>
    </div>
    </div>
</body>

</html>