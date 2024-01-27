<main class="container">
  <div class="alert alert-danger" role="alert">
    <h1 class="text-center">Edit Category</h1>
  </div>

  <form style="margin: auto; max-width: 500px;" method="post">
    <div class="mb-3">
      <label for="id" class="form-label fs-3">Category id:</label>
      <input type="text" class="form-control" disabled value="<?php echo $category_id; ?>">
    </div>
    <div class="mb-3">
      <label for="name" class="form-label fs-3">Category name:</label>
      <input type="text" class="form-control" id="name" name="category_name" value="<?php echo $category_name; ?>">
    </div>
    <div class="d-flex justify-content-between">
      <button type="submit" class="btn btn-primary">Save</button>
      <a href="./?controller=category" class="btn btn-secondary">Go back</a>
    </div>
  </form>
</main>