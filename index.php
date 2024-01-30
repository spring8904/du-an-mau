<?php
require 'models/pdo.php';
require 'models/product.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';
$page = isset($_GET['page']) ? $_GET['page'] : 1;

switch ($controller) {
  case 'product':
    $title = 'Product';
    include 'components/header.php';
    include 'pages/product.php';
    break;

  case 'about':
    $title = 'About';
    include 'components/header.php';
    include 'pages/about.php';
    break;

  case 'contact':
    $title = 'Contact';
    include 'components/header.php';
    include 'pages/contact.php';
    break;

  case 'login':
    $title = 'Login';
    include 'components/header.php';
    include 'pages/login.php';
    break;

  default:
    $title = 'Home';
    include 'components/header.php';
    include 'pages/home.php';
    break;
}

include 'components/footer.php';
