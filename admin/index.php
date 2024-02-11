<?php
ob_start();
require '../models/pdo.php';
require '../models/category.php';
require '../models/product.php';
require '../models/customer.php';
require '../models/comment.php';

session_start();
if (isset($_COOKIE['customer_id'])) {
  $_SESSION['customer'] = get_customer_by_id($_COOKIE['customer_id']);
}

if (!isset($_SESSION['customer']) || $_SESSION['customer']['customer_role'] == 0) {
  header('location: ../');
}

$controller = isset($_GET['controller']) ? $_GET['controller'] : '';
$action = isset($_GET['action']) ? $_GET['action'] : '';
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$search = isset($_GET['search']) ? $_GET['search'] : '';
$all_categories = get_categories();
$category_id = isset($_GET['category_id']) ? $_GET['category_id'] : '';
$product_id = isset($_GET['product_id']) ? $_GET['product_id'] : '';
$customer_id = isset($_GET['customer_id']) ? $_GET['customer_id'] : '';
$comment_id = isset($_GET['comment_id']) ? $_GET['comment_id'] : '';

switch ($controller) {
  case 'category':
    switch ($action) {
      case 'add':
        $title_web = 'Add Category';
        include 'components/header.php';
        include 'category/add.php';
        break;
      case 'edit':
        $title_web = 'Edit Category';
        include 'components/header.php';
        include 'category/edit.php';
        break;
      case 'delete':
        delete_category($category_id);
      default:
        $title_web = 'Category';
        include 'components/header.php';
        include 'category/index.php';
        break;
    }
    break;

  case 'product':
    switch ($action) {
      case 'add':
        $title_web = 'Add Product';
        include 'components/header.php';
        include 'product/add.php';
        break;
      case 'edit':
        $title_web = 'Edit Product';
        include 'components/header.php';
        include 'product/edit.php';
        break;
      case 'delete':
        delete_product($product_id);
      default:
        $title_web = 'Product';
        include 'components/header.php';
        include 'product/index.php';
        break;
    }
    break;

  case 'customer':
    switch ($action) {
      case 'add':
        $title_web = 'Add Customer';
        include 'components/header.php';
        include 'customer/add.php';
        break;
      case 'edit':
        $title_web = 'Edit Customer';
        include 'components/header.php';
        include 'customer/edit.php';
        break;
      case 'delete':
        delete_customer($customer_id);
      default:
        $title_web = 'Customer';
        include 'components/header.php';
        include 'customer/index.php';
        break;
    }
    break;

  case 'comment':
    $title_web = 'Comment';
    include 'components/header.php';
    include 'comment/index.php';
    break;

  case 'comment_detail':
    switch ($action) {
      case 'edit':
        $title_web = 'Edit Comment';
        include 'components/header.php';
        include 'comment/edit.php';
        break;
      case 'delete':
        delete_comment($comment_id);
      default:
        $title_web = 'Comment';
        include 'components/header.php';
        include 'comment/detail.php';
        break;
    }
    break;

  default:
    $title_web = 'Admin';
    include 'components/header.php';
    include 'home.php';
    break;
}

include 'components/footer.php';

ob_end_flush();
