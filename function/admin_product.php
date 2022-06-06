<?php
require_once "../../config.php";

try {
    $sql = "SELECT p.id as id, p.name as name_product, p.description as description_product, u.username as company, c.name as category, p.price as price, p.link as link FROM product p
                LEFT JOIN category c on p.category_id = c.id
                LEFT JOIN user u on p.company_id = u.id";

    $stmt = $db->prepare($sql);

    $stmt->execute();

}catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
}


?>

<?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
    <div class="product">

        <?php if (file_exists("../../source/product/$row[id].jpg")): ?>
            <div class="img-box"><img class="image" src="../source/product/<?= $row['id'] ?>.jpg"></div>
        <?php else: ?>
            <div class="img-box"><ion-icon class="image default" name="alert-outline"></ion-icon></div>
        <?php endif; ?>

        <div class="information">
            <div class="div-form" style="margin: 2px">
                <label class="name"><?= $row['name_product'] ?></label>
                <div class="filler"></div>
                <label class="id"><?= $row['id'] ?></label>
            </div>
            <label class="description"><?= $row['description_product'] ?></label>
            <label class="company">company: <?= $row['company'] ?></label>
            <label class="category">category: <?= $row['category'] ?></label>
            <label class="price">price: <?= $row['price'] ?>$</label>
            <div class="div-form">
                <a class="form-button-company" onclick="admin_modify_product(<?= $row['id'] ?>)">modify</a>
                <div class="div-margin"></div>
                <a class="form-button-company delete" onclick="delete_element(<?= $row['id'] ?>)">delete</a>
            </div>
        </div>
    </div>
<?php endwhile ?>