<?php
$limit = 20;
$categories = get_categories($search, $limit, ($page - 1) * $limit);
$total_categories = count($all_categories);
$total_pages = ceil($total_categories / $limit);
$prev_page = $page <= 1 ? 1 : $page - 1;
$next_page = $page >= $total_pages ? $total_pages : $page + 1;
?>

<main class="container">
  <h1 class="text-center alert alert-danger">List Category</h1>

  <form class="d-flex" method="get">
    <input type="hidden" name="controller" value="category">
    <input class="form-control me-2" type="search" placeholder="Category name" name="search" value="<?= $search ?>">
    <button class="btn btn-outline-success" type="submit">Search</button>
  </form>

  <?php include '../components/group-btn.php' ?>

  <table class=" table table-striped table-hover table-bordered mt-3">
    <thead>
      <tr>
        <th scope="col" class="text-center">
          <input class="form-check-input mt-0" type="checkbox" name="select-all">
        </th>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Quantity</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($categories as $category) {
        $quantity =  count(get_products($category['category_id'])); ?>
        <tr>
          <td class="text-center">
            <input class="form-check-input mt-0" type="checkbox" value="<?= $category['category_id'] ?>">
          </td>
          <td><?= $category['category_id'] ?></td>
          <td><?= $category['category_name'] ?></td>
          <td><?= $quantity ?></td>
          <td>
            <a href="./?controller=category&action=edit&category_id=<?= $category['category_id'] ?>" class="btn btn-warning mb-2">
              <i class="fa-solid fa-pen-to-square"></i>
              Edit
            </a>
            <a href="./?controller=category&action=delete&category_id=<?= $category['category_id'] ?>" class="btn btn-danger mb-2 <?= $quantity != 0 ? 'disabled' : '' ?>" onclick="return confirm('Are you sure you want to delete category <?= $category['category_name'] ?>')">
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