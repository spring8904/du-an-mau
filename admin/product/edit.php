<?php
if (isset($_GET['id'])) {
  $product = get_product_by_id($_GET['id']);
  extract($product);
} else {
  header('location: ./?page=product');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  update_product($product_id, $_POST['product_name'], $_POST['product_price'], $_POST['product_description'], $_FILES['product_image'], $_POST['category_id']);
  header('location: ./?page=product');
}
?>

<main class="container">
  <h1 class="alert alert-danger text-center">Edit Product</h1>

  <form style="margin: auto; max-width: 500px;" method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="id" class="form-label fs-4">Product id:</label>
      <input type="text" class="form-control" disabled value="<?php echo $product_id ?>">
    </div>

    <div class="mb-3">
      <label for="name" class="form-label fs-4">Product name:</label>
      <input type="text" class="form-control" id="name" name="product_name" value="<?php echo $product_name ?>">
    </div>

    <div class="mb-3">
      <label for="price" class="form-label fs-4">Product price:</label>
      <input type="text" class="form-control" id="price" name="product_price" value="<?php echo $product_price ?>">
    </div>

    <div class="mb-3">
      <label for="description" class="form-label fs-4">Product description:</label>
      <textarea type="text" class="form-control" id="description" name="product_description" value="<?php echo $product_description ?>" rows="3"></textarea>
    </div>

    <label for="price" class="form-label fs-4">Product image:</label>
    <div class="mb-3 input-group">
      <input type="file" class="form-control" id="image" accept="image/*" onchange="loadFile(event)" name="product_image">
      <label class="input-group-text" for="image">Upload</label>
    </div>

    <div class="text-center"><img src="../uploads/<?php echo $product_image ?>" id="output" width="200px" height="200px" /></div>

    <div class="input-group my-3">
      <label class="input-group-text fs-4" for="category-id">Category:</label>
      <select class="form-select" id="category-id" name="category_id">
        <option value="<?php echo $category_id ?>" hidden><?php echo $category_name ?></option>
        <?php
        foreach (get_all_categories() as $category) {
          extract($category)
        ?>
          <option value="<?php echo $category_id ?>"><?php echo $category_name ?></option>
        <?php
        }
        ?>
      </select>
    </div>
    <div class="d-flex justify-content-between mt-3">
      <div>
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="reset" class="btn btn-danger">Reset</button>
      </div>
      <a href="./?page=category" class="btn btn-secondary">Go back</a>
    </div>
  </form>
</main>

<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src)
    }
  };
</script>