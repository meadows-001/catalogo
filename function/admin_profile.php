<?php
require_once "../config.php";

try {
    $sql = "SELECT * FROM user";

    $stmt = $db->prepare($sql);

    $stmt->execute();

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
}

?>
<link href="../style/item.css" rel="stylesheet">
<?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
    <div class="item">
<div class="item-container-image">
        <?php if (file_exists("../../src/profile/$row[id].jpg")): ?>
            <img class="item-image" src="../src/profile/<?= $row['id'] ?>.jpg">
        <?php else: ?>
            <img class="item-image default" src="../../src/profile/default.png" style="opacity: 50%">
        <?php endif; ?>
</div>

        <div class="item-container-information">
            <label class="item-element username">username: <?= $row['username'] ?></label>
            <label class="item-element role">role: <?= $row['role'] ?></label>
                <a class="item-button delete" onclick="delete_profile(<?= $row['id'] ?>)">delete</a>
        </div>
    </div>
<?php endwhile ?>