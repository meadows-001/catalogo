<?php
require_once "../config.php";

try {
    $sql = "SELECT * FROM category";

    $stmt = $db->prepare($sql);

    $stmt->execute();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
}

?>
<link href="../style/item.css" rel="stylesheet">
<h1 class="item-element">Catgory:</h1>
<?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
    <div class="item-linear">
        <label class="item-element username"><?= $row['name'] ?></label>
        <a class="item-button delete linear" onclick="delete_category(<?= $row['id'] ?>)">
            <ion-icon class="icon" name="close-outline"></ion-icon>
        </a>
    </div>
<?php endwhile ?>
<form class="new-catogery" method="post" action="../function/admin_category_add_function.php" enctype="multipart/form-data">

    <?php if ($_SESSION['error'] == 'error' && $_SESSION['msg']) : ?>
        <label><?= $_SESSION['msg'] ?></label>
        <?php
        $_SESSION['error'] = '';
        unset($_SESSION['msg']);
        ?>
    <?php endif ?>

    <input class="new-catogery-input" name="name" type="text" placeholder="new catgory">
    <button class="new-catogery-submit" type="submit">
        <ion-icon class="icon-submit" name="add-outline"></ion-icon>
    </button>

</form>