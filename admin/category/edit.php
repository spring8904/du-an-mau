<?php
if (isset($_GET['id'])) {
  $category = get_category_by_id($_GET['id']);
  extract($category);
} else {
  header('location: ./?controller=category');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  update_category($id, $_POST['category_name']);
  header('location: ./?controller=category');
}
?>

<main class="container">
  <div class="alert alert-danger" role="alert">
    <h1 class="text-center">Edit Category</h1>
  </div>

  <form style="margin: auto; max-width: 500px;" method="post">
    <div class="mb-3">
      <label for="id" class="form-label fs-3">Category id:</label>
      <input type="text" class="form-control" disabled value="<?= $category_id; ?>">
    </div>
    <div class="mb-3">
      <label for="name" class="form-label fs-3">Category name:<span class="text-danger">*</span></label>
      <input type="text" class="form-control" id="name" name="category_name" value="<?= $category_name; ?>" required>
    </div>
    <div class="d-flex justify-content-between">
      <button type="submit" class="btn btn-waring">Save</button>
      <a href="./?controller=category" class="btn btn-secondary">Go back</a>
    </div>
  </form>
</main>