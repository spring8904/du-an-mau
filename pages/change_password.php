<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $customer = get_customer_by_id($_SESSION['customer_id']);
  $old_password = $_POST['customer_old_password'];
  $new_password = $_POST['customer_new_password'];
  $confirm_password = $_POST['customer_confirm_password'];
  $valid = true;

  if (!password_verify($old_password, $customer['customer_password'])) {
    echo "<script>alert('Old password is not correct')</script>";
    $valid = false;
  }

  if (strlen($new_password) < 8) {
    echo "<script>alert('Password must be at least 8 characters')</script>";
    $valid = false;
  }

  if ($new_password != $confirm_password) {
    echo "<script>alert('Confirm password is not correct')</script>";
    $valid = false;
  }


  if ($valid) {
    $new_password = password_hash($new_password, PASSWORD_DEFAULT);
    update_customer(
      $customer['customer_id'],
      $customer['customer_username'],
      $new_password,
      $customer['customer_full_name'],
      $_FILES['customer_avatar'],
      $customer['customer_email'],
      $customer['customer_role'],
      "uploads/"
    );
    header('location: ./?controller=profile');
  }
}
?>

<main class="container">
  <h1 class="alert alert-danger text-center">Change password</h1>

  <form method="post" enctype="multipart/form-data">
    <input type="file" name="customer_avatar" hidden>
    <div class="mb-3">
      <label for="username" class="form-label">Username:<span class="text-danger">*</span></label>
      <input type="text" class="form-control" id="username" name="customer_username" required value="<?= $customer['customer_username'] ?>" disabled>
    </div>
    <div class="mb-3">
      <label for="old-pass" class="form-label">Old password:<span class="text-danger">*</span></label>
      <input type="password" class="form-control" id="old-pass" name="customer_old_password" required>
    </div>
    <div class="mb-3">
      <label for="new-pass" class="form-label">New password<span class="text-danger">*</span></label>
      <input type="password" class="form-control" id="new-pass" name="customer_new_password" required>
    </div>
    <div class="mb-3">
      <label for="confirm-pass" class="form-label">Confirm password<span class="text-danger">*</span></label>
      <input type="password" class="form-control" id="confirm-pass" name="customer_confirm_password" required>
    </div>
    <a href="./?controller=profile" class="btn btn-secondary">Go back</a>
    <button type="submit" class="btn btn-warning">Save</button>
    </div>
  </form>
</main>