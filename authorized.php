<?php
require_once 'config.php';

function verify($type_user)
{
    if (($_SESSION['user']['role'] ?? '') != $type_user) {

        header('location: ../page/login.php');
        $_SESSION['backto'] = $_SERVER['REQUEST_URI'];
        die;
    }
}