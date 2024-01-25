<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Navia Shop</title>
  <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <?php
  require_once '../dao/pdo.php';
  include 'components/header.php';

  $page = isset($_GET['page']) ? $_GET['page'] : '';
  $action = isset($_GET['action']) ? $_GET['action'] : '';

  switch ($page) {
    case 'category':
      switch ($action) {
        case 'add':
          include 'category/add.php';
          break;
        case 'edit':
          include 'category/edit.php';
          break;
        case 'delete':
          include 'category/delete.php';
          break;
        default:
          include 'category/index.php';
          break;
      }
      break;
    default:
      include 'home.php';
      break;
  }

  include '../components/footer.php' ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>