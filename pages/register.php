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
        <label for="username" class="form-label">User name:</label>
        <input type="text" class="form-control" id="username" name="username" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <div class="mb-3">
        <label for="confirm-password" class="form-label">Confirm Password:</label>
        <input type="password" class="form-control" id="confirm-password" name="confirm_password" required>
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