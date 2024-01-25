<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $categoryName = $_POST['categoryName'];
  $sql = "INSERT INTO categories (name) VALUES ('$categoryName')";
  pdo_execute($sql);
}
?>

<div class="alert alert-danger" role="alert">
  <h1 class="text-center">Add New Category</h1>
</div>

<form action="" style="margin: auto; max-width: 500px;" method="post">
  <div class="mb-3">
    <label for="category-id" class="form-label fs-3">Category id:</label>
    <input type="text" class="form-control" disabled>
  </div>
  <div class="mb-3">
    <label for="category-name" class="form-label fs-3">Category name:</label>
    <input type="text" class="form-control" id="category-name" name="categoryName">
  </div>
  <div class="d-flex justify-content-between">
    <div>
      <button type="submit" class="btn btn-primary">Save</button>
      <button type="reset" class="btn btn-danger">Reset</button>
    </div>
    <a href="category.php" class="btn btn-secondary">Go back</a>
  </div>
</form>