<?php
if (isset($_GET['category_id'])) {
  $category = get_category_by_id($_GET['category_id']);
} else {
  header('location: ./?controller=category');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  update_category($category['category_id'], $_POST['category_name']);
  header('location: ./?controller=category');
}
?>

<main class="container">
  <h1 class="alert alert-danger text-center">Edit Category</h1>

  <form style="margin: auto; max-width: 500px;" method="post">
    <div class="mb-3">
      <label for="id" class="form-label fs-3">Category id:</label>
      <input type="text" class="form-control" disabled value="<?= $category['category_id']; ?>">
    </div>
    <div class="mb-3">
      <label for="name" class="form-label fs-3">Category name:<span class="text-danger">*</span></label>
      <input type="text" class="form-control" id="name" name="category_name" value="<?= $category['category_name']; ?>" required>
    </div>
    <div class="d-flex justify-content-between">
      <a href="./?controller=category" class="btn btn-secondary">Go back</a>
      <button type="submit" class="btn btn-warning">Save</button>
    </div>
  </form>
</main>