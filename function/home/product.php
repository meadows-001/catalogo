<?php
require_once "../../config.php";

try {
    $sql = "SELECT p.id, p.name as name_product, p.description as description_product, u.username as company, c.name as category, p.price as price, p.link as link FROM product p
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
    <div class="product" onclick="home_load('product-show.php?id='+<?= $row['id'] ?>, (text) =>
            { document.getElementById('product-show-div').innerHTML = text})">

        <?php if (file_exists("../../source/product/$row[id].jpg")): ?>
            <div class="img-box"><img class="image" src="../source/product/<?= $row['id'] ?>.jpg"></div>
        <?php else: ?>
            <div class="img-box"><ion-icon class="image default" name="alert-outline"></ion-icon></div>
        <?php endif; ?>

        <div class="information">
            <label class="name"><?= $row['name_product'] ?></label>
            <label class="company">company: <?= $row['company'] ?></label>
            <label class="description"><?= $row['description_product'] ?></label>
            <div class="bought-div">
                <label class="price" ><?= $row['price'] ?>$</label>
                <a class="form-button" href="<?= $row['link'] ?>">buy</a>
            </div>
        </div>
    </div>
<?php endwhile ?>