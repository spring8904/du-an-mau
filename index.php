<?php
require 'models/pdo.php';
require 'models/category.php';
require 'models/product.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';
$page = isset($_GET['page']) ? $_GET['page'] : 1;

switch ($controller) {
  case 'product':
    $product_id = isset($_GET['product_id']) ? $_GET['product_id'] : '';

    if ($product_id != '') {
      $product = get_product_by_id($product_id);
      extract($product);
      $title = $product_name;
      include 'components/header.php';
      include 'pages/product-detail.php';
      break;
    }

    $category_id = isset($_GET['category_id']) ? $_GET['category_id'] : '';

    if ($category_id == '') {
      $all_products = get_products();
    } else {
      $all_products = get_products($category_id);
      $category_name = get_category_by_id($category_id)['category_name'];
    }

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
