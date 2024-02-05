<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  insert_product(
    $_POST['product_name'],
    $_POST['product_price'],
    $_POST['product_sale'],
    $_POST['product_description'],
    $_FILES['product_image'],
    $_POST['category_id']
  );
}
?>

<main class="container">
  <h1 class="alert alert-danger text-center">Add New Product</h1>

  <form method="post" enctype="multipart/form-data">
    <div class="d-flex row">
      <div class="col-md">
        <div class="mb-3">
          <label for="id" class="form-label fs-4">Product id:</label>
          <input type="text" class="form-control" disabled>
        </div>

        <div class="mb-3">
          <label for="name" class="form-label fs-4">Product name:<span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="name" name="product_name" required autofocus>
        </div>

        <div class="mb-3">
          <label for="price" class="form-label fs-4">Product price:<span class="text-danger">*</span></label>
          <input type="number" class="form-control" id="price" name="product_price" placeholder="0" required>
        </div>

        <div class="mb-3">
          <label for="sale" class="form-label fs-4">Product sale(%):</label>
          <input type="number" max="100" class="form-control" id="sale" name="product_sale" placeholder="0">
        </div>

        <div class="my-3">
          <label class="label-form fs-4" for="category-id">Category:<span class="text-danger">*</span></label>
          <select class="form-select" id="category-id" name="category_id" required>
            <option selected hidden value="">Choose...</option>
            <?php
            foreach ($all_categories as $category) {
            ?>
              <option value="<?= $category['category_id'] ?>"><?= $category['category_name'] ?></option>
            <?php
            }
            ?>
          </select>
        </div>
      </div>

      <div class="col-md">
        <div class="mb-3">
          <label for="description" class="form-label fs-4">Product description:</label>
          <textarea type="text" class="form-control" id="description" name="product_description" rows="2"></textarea>
        </div>

        <label for="price" class="form-label fs-4">Product image:<span class="text-danger">*</span></label>
        <div class="mb-3 input-group">
          <input type="file" class="form-control" id="image" accept="image/*" onchange="loadFile(event)" name="product_image" required>
          <label class="input-group-text" for="image">Upload</label>
        </div>

        <div class="text-center"><img id="output" width="200px" height="200px" /></div>
      </div>
    </div>

    <div class="d-flex justify-content-between mt-3">
      <div>
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="reset" class="btn btn-danger">Reset</button>
      </div>
      <a href="./?controller=product" class="btn btn-secondary">Go back</a>
    </div>
  </form>
</main>