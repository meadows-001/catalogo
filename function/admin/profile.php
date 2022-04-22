<?php
require_once "../../config.php";

try {
    $sql = "SELECT * FROM user";

    $stmt = $db->prepare($sql);

    $stmt->execute();

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
}

?>

<?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
    <div class="profile">

        <?php if (file_exists("../../source/profile/$row[id].jpg")): ?>
            <div class="img-box"><img class="image" src="../source/profile/<?= $row['id'] ?>.jpg"></div>
        <?php else: ?>
            <div class="img-box"><img class="image" src="../../source/profile/default.png" style="opacity: 50%"></div>
        <?php endif; ?>

        <div class="information">
            <label class="username">username: <?= $row['username'] ?></label>
            <label class="role">role: <?= $row['role'] ?></label>
            <div class="div-form form-profile">
                <a class="form-button-company delete" onclick="delete_profile(<?= $row['id'] ?>)">delete</a>
            </div>
        </div>
    </div>
<?php endwhile ?>