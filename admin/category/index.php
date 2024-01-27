<main class="container">
  <h1 class="text-center alert alert-danger">List Category</h1>

  <form class="d-flex" method="post">
    <input class="form-control me-2" type="search" placeholder="Search" name="search">
    <button class="btn btn-outline-success" type="submit">Search</button>
  </form>

  <table class=" table table-striped table-hover table-bordered mt-3">
    <thead>
      <tr>
        <th scope="col" class="text-center">
          <input class="form-check-input mt-0" type="checkbox" name="select-all">
        </th>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($categories as $category) {
        extract($category)
      ?>
        <tr>
          <td class="text-center">
            <input class="form-check-input mt-0" type="checkbox" value="<?php echo $category_id ?>">
          </td>
          <td><?php echo $category_id ?></td>
          <td><?php echo $category_name ?></td>
          <td>
            <a href="./?controller=category&action=edit&id=<?php echo $category_id ?>" class="btn btn-warning">Edit</a>
            <a href="./?controller=category&action=delete&id=<?php echo $category_id ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete category <?php echo $category_name ?>')">Delete</a>
          </td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>

  <div class="d-flex justify-content-center">
    <?php include '../components/pagination.php' ?>
  </div>

  <div class="d-flex gap-2">
    <button class="btn btn-primary" onclick="selectAll()">Select All</button>
    <button class="btn btn-secondary" onclick="deselectAll()">Deselect All</button>
    <a href="#" class="btn btn-danger">Delete Selected</a>
    <a href="./?controller=category&action=add" class="btn btn-success">Add Category</a>
  </div>
</main>

<script src="../js/select.js"></script>