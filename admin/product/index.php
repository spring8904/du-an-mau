<?php
$limit = 8;
$category_id = isset($_GET['category_id'])
  ? $_GET['category_id']
  : '';

$products = get_products(
  $category_id,
  $search,
  $limit,
  ($page - 1) * $limit
);

if ($category_id != '') {
  $all_products = get_products($category_id);
} else {
  $all_products = get_products();
}

$total_products = count($all_products);
$total_pages = ceil($total_products / $limit);

$prev_page = $page <= 1 ? 1 : $page - 1;
$next_page = $page >= $total_pages ? $total_pages : $page + 1;
?>

<main class="container">
  <h1 class="text-center alert alert-danger">List Product</h1>

  <form class="d-flex gap-2" method="get">
    <input type="hidden" name="controller" value="product">
    <input class="form-control" type="search" placeholder="Product name" name="search" value="<?= $search ?>">
    <select class="form-select" id="category-id" name="category_id">
      <?php if (isset($_GET['category_id']) && $_GET['category_id'] != '') { ?>
        <option value="<?= $_GET['category_id'] ?>" hidden selected>
          <?= get_category_by_id($_GET['category_id'])['category_name'] ?>
        </option>
      <?php } ?>
      <option value="">All Products</option>
      <?php
      foreach ($all_categories as $category) {
      ?>
        <option value="<?= $category['category_id'] ?>"><?= $category['category_name'] ?></option>
      <?php
      }
      ?>
    </select>
    <button class="btn btn-outline-success" type="submit">Search</button>
  </form>

  <?php include '../components/group-btn.php' ?>

  <table class="mt-3 table table-striped table-hover table-bordered">
    <thead>
      <tr>
        <th scope="col" class="text-center">
          <input class="form-check-input mt-0" type="checkbox" name="select-all">
        </th>
        <th scope="col">ID</th>
        <th scope="col">Image</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">Sale(%)</th>
        <th scope="col">Category</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($products as $product) {
      ?>
        <tr>
          <td class="text-center">
            <input class="form-check-input mt-0" type="checkbox" value="<?= $product['product_id'] ?>">
          </td>
          <td><?= $product['product_id'] ?></td>
          <td><img width="100px" height="100px" src="../uploads/<?= $product['product_image'] ?>" alt="<?= $product['product_name'] ?>"></td>
          <td><?= $product['product_name'] ?></td>
          <td><?= $product['product_price'] ?></td>
          <td><?= $product['product_sale'] ?></td>
          <td><?= $product['category_name'] ?></td>
          <td>
            <a href="./?controller=product&action=edit&product_id=<?= $product['product_id'] ?>" class="btn btn-warning">
              <i class="fa-solid fa-pen-to-square"></i>
              Edit
            </a>
            <a href="./?controller=product&action=delete&product_id=<?= $product['product_id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete product <?= $product['product_name'] ?>')">
              <i class="fa-solid fa-trash"></i>
              Delete
            </a>
          </td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>

  <?php include '../components/group-btn.php' ?>

  <?php include '../components/pagination.php' ?>
</main>