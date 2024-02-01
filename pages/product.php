<div class="container">
  <div class="row">
    <main class="col col-lg-9 col-12">
      <?php
      $title = isset($_GET['category_id']) ? $category_name : 'All Products';
      $limit = 20;
      $total_products = count($products);
      $total_pages = ceil($total_products / $limit);

      $prev_page = $page <= 1 ? 1 : $page - 1;
      $next_page = $page >= $total_pages ? $total_pages : $page + 1;

      include 'components/list-product.php';
      include 'components/pagination.php';
      ?>
    </main>

    <?php include 'components/sidebar.php'; ?>
  </div>
</div>