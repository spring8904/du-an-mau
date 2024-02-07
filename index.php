<?php
ob_start();
require 'models/pdo.php';
require 'models/category.php';
require 'models/product.php';
require 'models/customer.php';
require 'models/comment.php';

session_start();
if (isset($_COOKIE['customer_id'])) {
  $_SESSION['customer'] = get_customer_by_id($_COOKIE['customer_id']);
}

$controller = isset($_GET['controller']) ? $_GET['controller'] : '';
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$product_id = isset($_GET['product_id']) ? $_GET['product_id'] : '';

switch ($controller) {
  case 'product':
    $category_id = isset($_GET['category_id']) ? $_GET['category_id'] : '';

    if ($category_id == '') {
      $title_web = 'Product';
    } else {
      $category_name = get_category_by_id($category_id)['category_name'];
      $title_web = $category_name;
    }

    include 'components/header.php';
    include 'pages/product.php';
    break;

  case 'product_detail':
    $product_id = isset($_GET['product_id']) ? $_GET['product_id'] : '';
    $product = get_product_by_id($product_id);
    $title_web = $product['product_name'];

    include 'components/header.php';
    include 'pages/product-detail.php';
    break;

  case 'contact':
    $title_web = 'Contact';
    include 'components/header.php';
    include 'pages/contact.php';
    break;

  case 'login':
    $title_web = 'Login';
    include 'components/header.php';
    include 'pages/login.php';
    break;

  case 'logout':
    session_destroy();
    setcookie('customer_id', '', time() - 3600);
    header('location: .');
    break;

  case 'register':
    $title_web = 'Register';
    include 'components/header.php';
    include 'pages/register.php';
    break;

  default:
    $title_web = 'Home';
    include 'components/header.php';
    include 'pages/home.php';
    break;
}

include 'components/footer.php';
ob_end_flush();
