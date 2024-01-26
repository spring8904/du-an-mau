<main class="container">
  <h1 class="alert alert-danger text-center">Add New Category</h1>

  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    insert_category($_POST['category_name']);
    echo '<h3 class="alert alert-success text-center">Add Category Successfully</h3>';
  }
  ?>

  <form style="margin: auto; max-width: 500px;" method="post">
    <div class="mb-3">
      <label for="id" class="form-label fs-3">Category id:</label>
      <input type="text" class="form-control" disabled>
    </div>
    <div class="mb-3">
      <label for="name" class="form-label fs-3">Category name:</label>
      <input type="text" class="form-control" id="name" name="category_name">
    </div>
    <div class="d-flex justify-content-between">
      <div>
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="reset" class="btn btn-danger">Reset</button>
      </div>
      <a href="./?page=category" class="btn btn-secondary">Go back</a>
    </div>
  </form>
</main>