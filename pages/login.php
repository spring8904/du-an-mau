<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $remember_me = isset($_POST['remember_me']) ? 1 : 0;

  $customer = get_customer_by_username($username);
  if ($customer && password_verify($password, $customer['customer_password'])) {
    $_SESSION['customer_id'] = $customer['customer_id'];
    if ($remember_me) {
      setcookie('customer_id', $customer['customer_id'], time() + 3600 * 24 * 30);
    }

    if ($customer['customer_role'] == 1)
      header('location: ./admin');
    else
      header('location: ./');
  } else {
    echo "<script>alert('Login failed!');</script>";
  }
}
?>

<main class="container">
  <h1 class="alert alert-danger text-center">LOGIN</h1>

  <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href=".">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Login</li>
    </ol>
  </nav>

  <div class="card mx-auto" style="max-width: 360px;">
    <form method="post" class="p-3">
      <div class="mb-3">
        <label for="username" class="form-label">Username:</label>
        <input type="text" class="form-control" id="username" name="username" required autofocus>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="1" name="remember_me" id="remember-me">
        <label class="form-check-label" for="remember-me">
          Remember me
        </label>
      </div>
      <button class="mt-2 btn btn-outline-primary w-100" type="submit">Login</button>
      <ul class="mt-2">
        <li>
          <a href="?controller=register">Register</a>
        </li>
        <li>
          <a href="#">Forgot Password</a>
        </li>
      </ul>
    </form>
  </div>
</main>