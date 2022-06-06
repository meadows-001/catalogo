<?php
require_once "../config.php";

try {
    $sql = "SELECT p.id, p.name as name_product, p.description as description_product, u.username as company, c.name as category, p.price as price, p.link as link FROM product p
                LEFT JOIN category c on p.category_id = c.id
                LEFT JOIN user u on p.company_id = u.id";

    $stmt = $db->prepare($sql);

    $stmt->execute();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
}

?>

<link href="../style/item.css" rel="stylesheet">

<?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
    <div class="item">
        <div class="item-container-image">
            <?php if (file_exists("../src/product/$row[id].jpg")) : ?>
                <img class="item-image" src="../src/product/<?= $row['id'] ?>.jpg">
            <?php else : ?>
                <img class="item-image" src="../src/product/default.png">
            <?php endif; ?>
        </div>
        <div class="item-container-information">
            <label class="item-element name"><?= $row['name_product'] ?></label>
            <label class="item-element description"><?= $row['description_product'] ?></label>
            <label class="item-element price"><?= $row['price'] ?>$</label>
        </div>
    </div>
<?php endwhile ?>