<?php
require '../models/pdo.php';
require '../models/category.php';
require '../models/product.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] : '';
$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$search = isset($_POST['search']) ? $_POST['search'] : '';
$all_categories = get_categories();

switch ($controller) {
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

include 'components/footer.php';
