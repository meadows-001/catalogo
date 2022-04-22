<?php
require_once "../../config.php";

if (empty($_GET)) {
    die();
}

$id = intval($_GET['id']) ?? 0;


try {
    $sql = "SELECT p.id, p.name as name_product, p.description as description_product, u.username as company, c.name as category, p.price as price, p.link as link FROM product p
                LEFT JOIN category c on p.category_id = c.id
                LEFT JOIN user u on p.company_id = u.id where p.id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    $name = $product['name_product'];

}catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
}

?>
<a id="product-selected" href="<?= $product['link'] ?>">
    <?php if (file_exists("../../source/product/$product[id].jpg")): ?>
        <div id="ps-img-box"><img id="ps-img" src="../source/product/<?= $product['id'] ?>.jpg"></div>
    <?php else: ?>
        <div id="ps-img-box"><img id="ps-img" src="../../source/product/default.png" style="opacity: 50%"></div>
    <?php endif; ?>

    <div id="ps-information">
        <div class="product-show-label-div">
            <label class="title-label" >name:</label>
            <label class="information-label" id="ps-name"><?= $name ?></label>
        </div>
        <div class="product-show-label-div">
            <label class="title-label" >description:</label>
            <label class="information-label" id="ps-description"><?= $product['description_product'] ?></label>
        </div>
        <div class="product-show-label-div">
            <label class="title-label" >company:</label>
            <label class="information-label" id="ps-company"><?= $product['company'] ?></label>
        </div>
        <div class="product-show-label-div">
            <label class="title-label" >category:</label>
            <label class="information-label" id="ps-category"><?= $product['category'] ?></label>
        </div>
        <div class="product-show-label-div">
            <label class="title-label" >price:</label>
            <label class="information-label" id="ps-price"><?= $product['price'] ?>$</label>
        </div>
        </div>
</a>