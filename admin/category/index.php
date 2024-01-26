<?php
$sql = "SELECT * FROM categories ORDER BY id DESC";
$categories = pdo_query($sql);
?>

<main class="container">
  <h1 class="text-center alert alert-danger">List Category</h1>
  <table class=" table table-striped table-hover table-bordered">
    <thead>
      <tr>
        <th scope="col" class="text-center">
          <input class="form-check-input mt-0" type="checkbox" value="" name="select-all">
        </th>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col" colspan="">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($categories as $category) {
        extract($category)
      ?>
        <tr>
          <td class="text-center">
            <input class="form-check-input mt-0" type="checkbox" value="<?php echo $id ?>">
          </td>
          <td><?php echo $id ?></td>
          <td><?php echo $name ?></td>
          <td>
            <a href="./?page=category&action=edit&id=<?php echo $id ?>" class="btn btn-warning">Edit</a>
            <a href="./?page=category&action=delete&id=<?php echo $id ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete category <?php echo $name ?>')">Delete</a>
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
    <a href="#" class="btn btn-danger">Delete Selected Items</a>
    <a href="./?page=category&action=add" class="btn btn-success">Add New Category</a>
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