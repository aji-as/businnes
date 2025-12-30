<?php


$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'home':
        include 'home.php';
        break;
    case 'about':
        include 'about.php';
        break;
    case 'product':
        include 'product.php';
        break;
    case 'contact':
        include 'contact.php';
        break;
    default:
        include 'home.php';
        break;
}
