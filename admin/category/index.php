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

  <form class="d-flex" method="post">
    <input class="form-control me-2" type="search" placeholder="Category name" name="search" value="<?php if (isset($_POST['search'])) echo $_POST['search'] ?>">
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
            <a href="./?controller=category&action=edit&id=<?= $category['category_id'] ?>" class="btn btn-warning">
              <i class="fa-solid fa-pen-to-square"></i>
              Edit
            </a>
            <?php if ($quantity == 0) { ?>
              <a href="./?controller=category&action=delete&id=<?= $category['category_id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete category <?= $category['category_name'] ?>')">
                <i class="fa-solid fa-trash"></i>
                Delete
              </a>
            <?php } else { ?>
              <button class="btn btn-danger" disabled>
                <i class="fa-solid fa-trash"></i>
                Delete
              </button>
            <?php } ?>
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