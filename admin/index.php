<?php
require_once '../dao/pdo.php';

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
        $sql = "DELETE FROM categories WHERE id = $id";
        pdo_execute($sql);
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
  default:
    $title = 'Admin';
    include 'components/header.php';
    include 'home.php';
    break;
}

include '../components/footer.php';
