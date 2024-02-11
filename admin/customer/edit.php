<?php
if (isset($_GET['customer_id'])) {
  $customer = get_customer_by_id($_GET['customer_id']);
} else {
  header('location: ./?controller=customer');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $password = $_POST['customer_password'];
  $full_name = $_POST['customer_full_name'];
  $email = $_POST['customer_email'];
  $valid = true;

  if (strlen($password) < 8 && !empty($password)) {
    echo "<script>alert('Password must be at least 8 characters')</script>";
    $valid = false;
  }

  if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($email)) {
    echo "<script>alert('Email is not valid')</script>";
    $valid = false;
  }

  if ($password != $confirm_password) {
    echo "<script>alert('Password and confirm password do not match')</script>";
    $valid = false;
  }

  if ($valid) {
    if (!empty($password)) {
      $password = password_hash($password, PASSWORD_DEFAULT);
    } else {
      $password = $customer['customer_password'];
    }
    update_customer(
      $customer['customer_id'],
      $customer['customer_username'],
      $password,
      $full_name,
      $_FILES['customer_avatar'],
      $email,
      $_POST['customer_role']
    );
    header('location: ./?controller=customer');
  }
}
?>

<main class="container">
  <h1 class="alert alert-danger text-center">Edit Customer</h1>

  <form method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col">
        <div class="mb-3">
          <label for="username" class="form-label">Username:<span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="username" name="customer_username" required value="<?= $customer['customer_username'] ?>" disabled>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password:<span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="password" name="customer_password" required">
        </div>
        <div class="mb-3">
          <label for="full-name" class="form-label">Full Name:</label>
          <input type="text" class="form-control" id="full-name" name="customer_full_name" value="<?= $customer['customer_full_name'] ?>">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email:</label>
          <input type="email" class="form-control" id="email" name="customer_email" value="<?= $customer['customer_email'] ?>">
        </div>
      </div>
      <div class="col">
        <div>
          <label for="role" class="form-label">Role:</label>
          <div class="form-check form-check-inline ms-3">
            <input class="form-check-input" type="radio" id="customer" value="0" <?php if ($customer['customer_role'] == 0) echo 'checked' ?> name="customer_role">
            <label class="form-check-label" for="customer">customer</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="admin" value="1" name="customer_role" <?php if ($customer['customer_role'] == 1) echo 'checked' ?>>
            <label class="form-check-label" for="admin">admin</label>
          </div>
        </div>
        <label for="price" class="form-label">Avatar:</label>
        <div class="mb-3 input-group">
          <input type="file" class="form-control" id="image" accept="image/*" onchange="loadFile(event)" name="customer_avatar">
          <label class="input-group-text" for="image">Upload</label>
        </div>
        <div class="text-center">
          <img src="../uploads/<?= $customer['customer_avatar'] ?>" id="output" width="200px" height="200px" />
        </div>
      </div>
      <div class="d-flex justify-content-between mt-3">
        <a href="./?controller=customer" class="btn btn-secondary">Go back</a>
        <button type="submit" class="btn btn-warning">Save</button>
      </div>
    </div>
  </form>
</main>