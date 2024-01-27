<?php
$controller = isset($_GET['controller']) ? $_GET['controller'] : '';

switch ($controller) {
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
