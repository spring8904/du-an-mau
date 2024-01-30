<?php
$limit = 12;
$categories_id = isset($_POST['category_id'])
  ? $_POST['category_id']
  : 'all';
$products = get_products(
  $categories_id,
  $search,
  $limit,
  ($page - 1) * $limit
);
$total_products = count($products);
$total_pages = ceil($total_products / $limit);
$prev_page = $page <= 1 ? 1 : $page - 1;
$next_page = $page >= $total_pages ? $total_pages : $page + 1;
?>

<main class="container">
  <h1 class="text-center alert alert-danger">List Product</h1>

  <form class="d-flex gap-2" method="post">
    <input class="form-control" type="search" placeholder="Search" name="search" value="<?php if (isset($_POST['search'])) echo $_POST['search'] ?>">
    <select class="form-select" id="category-id" name="category_id">
      <?php if (isset($_POST['category_id']) && $_POST['category_id'] != 'all') { ?>
        <option value="<?= $_POST['category_id'] ?>" hidden selected>
          <?= get_category_by_id($_POST['category_id'])['category_name'] ?>
        </option>
      <?php } ?>
      <option value="all">All Products</option>
      <?php
      foreach ($all_categories as $category) {
        extract($category)
      ?>
        <option value="<?= $category_id ?>"><?= $category_name ?></option>
      <?php
      }
      ?>
    </select>
    <button class="btn btn-outline-success" type="submit">Search</button>
  </form>

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
        extract($product);
      ?>
        <tr>
          <td class="text-center">
            <input class="form-check-input mt-0" type="checkbox" value="<?= $product_id ?>">
          </td>
          <td><?= $product_id ?></td>
          <td><img width="100px" height="100px" src="../uploads/<?= $product_image ?>" alt="<?= $product_name ?>"></td>
          <td><?= $product_name ?></td>
          <td><?= $product_price ?></td>
          <td><?= $product_sale ?></td>
          <td><?= $category_name ?></td>
          <td>
            <a href="./?controller=product&action=edit&id=<?= $product_id ?>" class="btn btn-warning">Edit</a>
            <a href="./?controller=product&action=delete&id=<?= $product_id ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete product <?= $product_name ?>')">Delete</a>
          </td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>

  <div class="d-flex justify-content-center">
    <?php include '../components/pagination.php' ?>
  </div>

  <div class="d-flex gap-2">
    <button class="btn btn-primary" onclick="selectAll()">Select All</button>
    <button class="btn btn-secondary" onclick="deselectAll()">Deselect All</button>
    <a href="#" class="btn btn-danger">Delete Selected</a>
    <a href="./?controller=product&action=add" class="btn btn-success">Add Product</a>
  </div>
</main>

<script src="../js/select.js"></script>