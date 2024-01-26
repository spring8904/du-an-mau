<main class="container">
  <h1 class="text-center alert alert-danger">List Product</h1>
  <table class=" table table-striped table-hover table-bordered">
    <thead>
      <tr>
        <th scope="col" class="text-center">
          <input class="form-check-input mt-0" type="checkbox" name="select-all">
        </th>
        <th scope="col">ID</th>
        <th scope="col">Image</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">Category</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach (get_all_products() as $product) {
        extract($product);
      ?>
        <tr>
          <td class="text-center">
            <input class="form-check-input mt-0" type="checkbox" value="<?php echo $product_id ?>">
          </td>
          <td><?php echo $product_id ?></td>
          <td><img width="100px" height="100px" src="../uploads/<?php echo $product_image ?>" alt="<?php echo $product_name ?>"></td>
          <td><?php echo $product_name ?></td>
          <td><?php echo $product_price ?></td>
          <td><?php echo $category_name ?></td>
          <td>
            <a href="./?page=product&action=edit&id=<?php echo $product_id ?>" class="btn btn-warning">Edit</a>
            <a href="./?page=product&action=delete&id=<?php echo $product_id ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete product <?php echo $product_name ?>')">Delete</a>
          </td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>

  <div class="d-flex gap-2">
    <button class="btn btn-primary" onclick="selectAll()">Select All</button>
    <button class="btn btn-secondary" onclick="deselectAll()">Deselect All</button>
    <a href="#" class="btn btn-danger">Delete Selected</a>
    <a href="./?page=product&action=add" class="btn btn-success">Add Product</a>
  </div>
</main>

<script>
  const checkboxes = document.querySelectorAll('input[type="checkbox"]:not([name="select-all"])');
  const inputSelectAll = document.querySelector('input[name="select-all"]');

  const selectAll = () => {
    inputSelectAll.checked = true;
    checkboxes.forEach(checkbox => {
      checkbox.checked = true;
    })
  }

  const deselectAll = () => {
    inputSelectAll.checked = false;
    checkboxes.forEach(checkbox => {
      checkbox.checked = false;
    })
  }

  inputSelectAll.onchange = () => {
    checkboxes.forEach(checkbox => {
      checkbox.checked = inputSelectAll.checked;
    })
  }

  checkboxes.forEach(checkbox => {
    checkbox.onchange = () => {
      inputSelectAll.checked = [...checkboxes].every(checkbox => checkbox.checked);
    }
  })
</script>