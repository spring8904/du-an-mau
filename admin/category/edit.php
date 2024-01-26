<?php
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM categories WHERE id = $id";
  $category = pdo_query_one($sql);
} else {
  header('location: ./?page=category');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $categoryName = $_POST['categoryName'];
  $sql = "UPDATE categories SET name = '$categoryName' WHERE id = $id";
  pdo_execute($sql);
  header('location: ./?page=category');
}
?>

<div class="alert alert-danger" role="alert">
  <h1 class="text-center">Edit Category</h1>
</div>

<form action="" style="margin: auto; max-width: 500px;" method="post">
  <div class="mb-3">
    <label for="category-id" class="form-label fs-3">Category id:</label>
    <input type="text" class="form-control" disabled value="<?php echo $category['id']; ?>">
  </div>
  <div class="mb-3">
    <label for="category-name" class="form-label fs-3">Category name:</label>
    <input type="text" class="form-control" id="category-name" name="categoryName" value="<?php echo $category['name']; ?>">
  </div>
  <div class="d-flex justify-content-between">
    <div>
      <button type="submit" class="btn btn-primary">Save</button>
      <button type="reset" class="btn btn-danger">Reset</button>
    </div>
    <a href="./?page=category" class="btn btn-secondary">Go back</a>
  </div>
</form>