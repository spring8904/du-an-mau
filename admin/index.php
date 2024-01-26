<?php
require '../models/pdo.php';
require '../models/category.php';
require '../models/product.php';

$page = isset($_GET['page']) ? $_GET['page'] : '';
$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';

switch ($page) {
  case 'category':
    switch ($action) {
      case 'add':
        $title = 'Add Category';
        include 'components/header.php';
        include 'category/add.php';
        break;
      case 'edit':
        $title = 'Edit Category';
        include 'components/header.php';
        include 'category/edit.php';
        break;
      case 'delete':
        delete_category($id);
        $title = 'Category';
        include 'components/header.php';
        include 'category/index.php';
        break;
      default:
        $title = 'Category';
        include 'components/header.php';
        include 'category/index.php';
        break;
    }
    break;

  case 'product':
    switch ($action) {
      case 'add':
        $title = 'Add Product';
        include 'components/header.php';
        include 'product/add.php';
        break;
      case 'edit':
        $title = 'Edit Product';
        include 'components/header.php';
        include 'product/edit.php';
        break;
      case 'delete':
        delete_product($id);
        $title = 'Product';
        include 'components/header.php';
        include 'product/index.php';
        break;
      default:
        $title = 'Product';
        include 'components/header.php';
        include 'product/index.php';
        break;
    }
    break;

  default:
    $title = 'Admin';
    include 'components/header.php';
    include 'home.php';
    break;
}

include '../components/footer.php';
