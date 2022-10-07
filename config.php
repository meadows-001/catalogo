<?php

session_start();

$db_host = "meadows-site.ddns.net";
$db_user = "prati";
$db_pass = "504260";
$dbname = "catalogo";
$security_salt = "cb1ab205ff611369638de5e2876969e2";

try {
    $db = new PDO ("mysql:host=$db_host;dbname=$dbname", $db_user, $db_pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
}
