<?php
require_once "../config.php";

try {
    $sql = "SELECT p.id as id, p.name as name_product, p.description as description_product, u.username as company, c.name as category, p.price as price, p.link as link FROM product p
                LEFT JOIN category c on p.category_id = c.id
                LEFT JOIN user u on p.company_id = u.id";

    $stmt = $db->prepare($sql);

    $stmt->execute();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
}


?>

<?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
    <div class="item">
        <div class="item-container-image">
            <?php if (file_exists("../src/product/$row[id].jpg")) : ?>
                <img class="item-image" src="../src/product/<?= $row['id'] ?>.jpg">
            <?php else : ?>
                <img class="item-image default" src="../src/product/default.png">
            <?php endif; ?>
        </div>

        <div class="item-container-information">
            <label class="item-element">id: <?= $row['id'] ?></label>
            <label class="item-element name"><?= $row['name_product'] ?></label>
            <label class="item-element">by <?= $row['company'] ?></label>
            <div class="item-container">
                <a class="item-button company modify" onclick="admin_modify_product(<?= $row['id'] ?>)">Modify</a>
                <a class="item-button company delete" onclick="delete_element(<?= $row['id'] ?>)">Remove</a>
            </div>
        </div>
    </div>
<?php endwhile ?>