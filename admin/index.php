<?php
require '../models/pdo.php';
require '../models/category.php';
require '../models/product.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] : '';
$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$search = isset($_POST['search']) ? $_POST['search'] : '';


switch ($controller) {
  case 'category':
    switch ($action) {
      case 'add':
        $title = 'Add Category';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          insert_category($_POST['category_name']);
          echo '<script>alert("Add Category Successfully")</script>';
        }

        include 'components/header.php';
        include 'category/add.php';
        break;
      case 'edit':
        $title = 'Edit Category';

        if (isset($_GET['id'])) {
          $category = get_category_by_id($_GET['id']);
          extract($category);
        } else {
          header('location: ./?controller=category');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          update_category($id, $_POST['category_name']);
          header('location: ./?controller=category');
        }

        include 'components/header.php';
        include 'category/edit.php';
        break;
      case 'delete':
        delete_category($id);
      default:
        $title = 'Category';
        $limit = 20;
        $categories = get_categories($limit, ($page - 1) * $limit);
        $total_categories = count($categories);
        $total_pages = ceil($total_categories / $limit);
        $prev_page = $page <= 1 ? 1 : $page - 1;
        $next_page = $page >= $total_pages ? $total_pages : $page + 1;
        include 'components/header.php';
        include 'category/index.php';
        break;
    }
    break;

  case 'product':
    $all_categories = get_categories();
    switch ($action) {
      case 'add':
        $title = 'Add Product';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          insert_product($_POST['product_name'], $_POST['product_price'], $_POST['product_sale'], $_POST['product_description'], $_FILES['product_image'], $_POST['category_id']);
          echo '<script>alert("Add Product Successfully")</script>';
        }

        include 'components/header.php';
        include 'product/add.php';
        break;
      case 'edit':
        $title = 'Edit Product';

        if (isset($_GET['id'])) {
          $product = get_product_by_id($_GET['id']);
          extract($product);
        } else {
          header('location: ./?controller=product');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          update_product($product_id, $_POST['product_name'], $_POST['product_price'], $_POST['product_sale'], $_POST['product_description'], $_FILES['product_image'], $_POST['category_id']);
          header('location: ./?controller=product');
        }

        include 'components/header.php';
        include 'product/edit.php';
        break;
      case 'delete':
        delete_product($id);
      default:
        $title = 'Product';
        $limit = 12;
        $categories_id = isset($_POST['category_id']) ? $_POST['category_id'] : 'all';
        $products = get_products($categories_id, $search, $limit, ($page - 1) * $limit);
        $total_products = count($products);
        $total_pages = ceil($total_products / $limit);
        $prev_page = $page <= 1 ? 1 : $page - 1;
        $next_page = $page >= $total_pages ? $total_pages : $page + 1;

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
