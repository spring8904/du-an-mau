<?php
if (isset($_GET['id'])) {
  $product = get_product_by_id($_GET['id']);
} else {
  header('location: ./?controller=product');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  update_product(
    $product['product_id'],
    $_POST['product_name'],
    $_POST['product_price'],
    $_POST['product_sale'],
    $_POST['product_description'],
    $_FILES['product_image'],
    $_POST['category_id']
  );
  header('location: ./?controller=product');
}
?>

<main class="container">
  <h1 class="alert alert-danger text-center">Edit Product</h1>

  <form method="post" enctype="multipart/form-data">
    <div class="d-flex row">
      <div class="col-md">
        <div class="mb-3">
          <label for="id" class="form-label fs-4">Product id:</label>
          <input type="text" class="form-control" disabled value="<?= $product['product_id'] ?>">
        </div>

        <div class="mb-3">
          <label for="name" class="form-label fs-4">Product name:<span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="name" name="product_name" value="<?= $product['product_name'] ?>" required>
        </div>

        <div class="mb-3">
          <label for="price" class="form-label fs-4">Product price:<span class="text-danger">*</span></label>
          <input type="number" class="form-control" id="price" name="product_price" value="<?= $product['product_price'] ?>" required>
        </div>

        <div class="mb-3">
          <label for="sale" class="form-label fs-4">Product sale:</label>
          <input type="number" class="form-control" id="sale" name="product_sale" value="<?= $product['product_sale'] ?>">
        </div>

        <div class="my-3">
          <label class="form-label fs-4" for="category-id">Category:<span class="text-danger">*</span></label>
          <select class="form-select" id="category-id" name="category_id" required>
            <option value="<?= $product['category_id'] ?>" hidden><?= $product['category_name'] ?></option>
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
          <textarea type="text" class="form-control" id="description" name="product_description" value="<?= $product['product_description'] ?>" rows="2"></textarea>
        </div>

        <label for="price" class="form-label fs-4">Product image:</label>
        <div class="mb-3 input-group">
          <input type="file" class="form-control" id="image" accept="image/*" onchange="loadFile(event)" name="product_image">
          <label class="input-group-text" for="image">Upload</label>
        </div>

        <div class="text-center"><img src="../uploads/<?= $product['product_image'] ?>" id="output" width="200px" height="200px" /></div>
      </div>
    </div>

    <div class="d-flex justify-content-between mt-3">
      <div>
        <button type="submit" class="btn btn-warning">Save</button>
      </div>
      <a href="./?controller=product" class="btn btn-secondary">Go back</a>
    </div>
  </form>
</main>