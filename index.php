<?php
$page = isset($_GET['page']) ? $_GET['page'] : '';

switch ($page) {
  case 'product':
    $title = 'Product';
    include 'components/header.php';
    include 'pages/product.php';
    break;
  default:
    $title = 'Home';
    include 'components/header.php';
    include 'pages/home.php';
    break;
}

include 'components/footer.php';
