<div class="container">
  <div class="row">
    <main class="col col-lg-9 col-12">
      <?php include 'components/banner.php'; ?>

      <?php
      $title = 'LATEST';
      $limit = 12;
      $_category_id = '';
      $products = get_products($_category_id, '', $limit);
      include 'components/list-product.php';
      ?>

      <?php
      $title = 'iPhone';
      $limit = 4;
      $_category_id = 16;
      $products = get_products($_category_id, '', $limit);
      include 'components/list-product.php';
      ?>

      <?php
      $title = 'iPad';
      $limit = 4;
      $_category_id = 17;
      $products = get_products($_category_id, '', $limit);
      include 'components/list-product.php';
      ?>

      <?php
      $title = 'Mac';
      $limit = 4;
      $_category_id = 18;
      $products = get_products($_category_id, '', $limit);
      include 'components/list-product.php';
      ?>
    </main>
    <?php include 'components/sidebar.php'; ?>
  </div>
</div>