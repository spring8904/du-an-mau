<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];
  $full_name = $_POST['full_name'];
  $email = $_POST['email'];
  $valid = true;

  if (empty($username) || empty($password) || empty($confirm_password)) {
    echo "<script>alert('Username, password and confirm password are required')</script>";
    $valid = false;
  }

  if (strlen($password) < 8) {
    echo "<script>alert('Username must be at least 8 characters')</script>";
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
    $password = password_hash($password, PASSWORD_DEFAULT);
    insert_customer($username, $password, $full_name, $email);
    header('location: ./?controller=login');
  }
}
?>

<main class="container">
  <h1 class="alert alert-danger text-center">REGISTER</h1>

  <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href=".">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Register</li>
    </ol>
  </nav>

  <div class="card mx-auto" style="max-width: 360px;">
    <form method="post" class="p-3">
      <div class="mb-3">
        <label for="username" class="form-label">Username:<span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="username" name="username" required autofocus>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password:<span class="text-danger">*</span></label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <div class="mb-3">
        <label for="confirm-password" class="form-label">Confirm Password:<span class="text-danger">*</span></label>
        <input type="password" class="form-control" id="confirm-password" name="confirm_password" required>
      </div>
      <div class="mb-3">
        <label for="full-name" class="form-label">Full Name:</label>
        <input type="text" class="form-control" id="full-name" name="full_name">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" id="email" name="email">
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" name="agree" id="agree">
        <label class="form-check-label" for="agree">
          Agree to our <a href="#">Terms & Privacy</a>.
        </label>
      </div>
      <button class="mt-2 btn btn-outline-primary w-100" type="submit">Register</button>
      <ul class="mt-2">
        <li>
          <a href="?controller=login">Login</a>
        </li>
        <li>
          <a href="#">Forgot Password</a>
        </li>
      </ul>
    </form>
  </div>
</main>