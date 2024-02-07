<?php
$search = isset($_GET['search']) ? $_GET['search'] : '';
$limit = 12;

if ($category_id == '') {
  if ($search != '') {
    $all_products = get_products('', $search);
    $products = get_products('', $search, $limit, ($page - 1) * $limit);
    $title = 'Search: ' . $search;
  } else {
    $all_products = get_products();
    $products = get_products('', '', $limit, ($page - 1) * $limit);
    $title =  'All Products';
  }
} else {
  $all_products = get_products($category_id);
  $products = get_products($category_id, '', $limit, ($page - 1) * $limit);
  $title = $category_name;
}


$total_products = count($all_products);
$total_pages = ceil($total_products / $limit);

$prev_page = $page <= 1 ? 1 : $page - 1;
$next_page = $page >= $total_pages ? $total_pages : $page + 1;
?>

<div class="container">
  <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href=".">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
    </ol>
  </nav>

  <div class="row">
    <main class="col col-lg-9 col-12">
      <?php
      include 'components/list-product.php';
      include 'components/pagination.php';
      ?>
    </main>

    <?php include 'components/sidebar.php'; ?>
  </div>
</div>