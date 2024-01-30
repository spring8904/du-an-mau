<main class="container">
  <h1 class="alert alert-danger text-center">Edit Product</h1>

  <form method="post" enctype="multipart/form-data">
    <div class="d-flex row">
      <div class="col-md">
        <div class="mb-3">
          <label for="id" class="form-label fs-4">Product id:</label>
          <input type="text" class="form-control" disabled value="<?= $product_id ?>">
        </div>

        <div class="mb-3">
          <label for="name" class="form-label fs-4">Product name:</label>
          <input type="text" class="form-control" id="name" name="product_name" value="<?= $product_name ?>">
        </div>

        <div class="mb-3">
          <label for="price" class="form-label fs-4">Product price:</label>
          <input type="text" class="form-control" id="price" name="product_price" value="<?= $product_price ?>">
        </div>

        <div class="my-3">
          <label class="form-label fs-4" for="category-id">Category:</label>
          <select class="form-select" id="category-id" name="category_id">
            <option value="<?= $category_id ?>" hidden><?= $category_name ?></option>
            <?php
            foreach ($all_categories as $category) {
              extract($category)
            ?>
              <option value="<?= $category_id ?>"><?= $category_name ?></option>
            <?php
            }
            ?>
          </select>
        </div>
      </div>

      <div class="col-md">
        <div class="mb-3">
          <label for="description" class="form-label fs-4">Product description:</label>
          <textarea type="text" class="form-control" id="description" name="product_description" value="<?= $product_description ?>" rows="2"></textarea>
        </div>

        <label for="price" class="form-label fs-4">Product image:</label>
        <div class="mb-3 input-group">
          <input type="file" class="form-control" id="image" accept="image/*" onchange="loadFile(event)" name="product_image">
          <label class="input-group-text" for="image">Upload</label>
        </div>

        <div class="text-center"><img src="../uploads/<?= $product_image ?>" id="output" width="200px" height="200px" /></div>
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

<script src="../js/previewImage.js"></script>