<main class="container">
  <?php include 'components/banner.php'; ?>

  <?php
  $title = 'LATEST';
  $limit = 4;
  $products = get_products('', '', $limit);
  include 'components/list-product.php';
  ?>

  <?php
  $title = 'iPhone';
  $limit = 4;
  $products = get_products(16, '', $limit);
  include 'components/list-product.php';
  ?>

  <?php
  $title = 'iPad';
  $limit = 4;
  $products = get_products(17, '', $limit);
  include 'components/list-product.php';
  ?>

  <?php
  $title = 'Mac';
  $limit = 4;
  $products = get_products(18, '', $limit);
  include 'components/list-product.php';
  ?>
</main>