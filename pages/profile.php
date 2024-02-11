<?php
$customer = get_customer_by_id($_SESSION['customer_id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $full_name = $_POST['customer_full_name'];
  $email = $_POST['customer_email'];
  $valid = true;

  if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($email)) {
    echo "<script>alert('Email is not valid')</script>";
    $valid = false;
  }

  if ($valid) {
    update_customer(
      $customer['customer_id'],
      $customer['customer_username'],
      $customer['customer_password'],
      $full_name,
      $_FILES['customer_avatar'],
      $email,
      $customer['customer_role'],
      "uploads/"
    );
    header('location: ./?controller=profile');
  }
}
?>

<main class="container">
  <h1 class="alert alert-danger text-center">Profile</h1>

  <form method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col">
        <div class="mb-3">
          <label for="username" class="form-label">Username:<span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="username" name="customer_username" required value="<?= $customer['customer_username'] ?>" disabled>
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
        <label for="price" class="form-label">Avatar:</label>
        <div class="mb-3 input-group">
          <input type="file" class="form-control" id="image" accept="image/*" onchange="loadFile(event)" name="customer_avatar">
          <label class="input-group-text" for="image">Upload</label>
        </div>
        <div class="text-center">
          <img src="uploads/<?= $customer['customer_avatar'] ?>" id="output" width="200px" height="200px" />
        </div>
      </div>
      <div class="d-flex justify-content-between mt-3">
        <div>
          <a href="." class="btn btn-secondary">Go back</a>
          <a href="./?controller=change_password" class="btn btn-danger ms-2">Change password</a>
        </div>
        <button type="submit" class="btn btn-warning">Save</button>
      </div>
    </div>
  </form>
</main>