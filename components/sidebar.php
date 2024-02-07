<aside class="col col-lg-3 mt-lg-0 mt-3">
  <div class="card w-100">
    <div class="card-header">
      Login
    </div>

    <form method="post" class="p-3">
      <div class="mb-3">
        <label for="username" class="form-label">User name:</label>
        <input type="text" class="form-control" id="username" name="username" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" name="remember_me" id="remember-me">
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

  <div class="card w-100 mt-3">
    <div class="card-header">
      Categories
    </div>
    <ul class="list-group list-group-flush">
      <?php
      foreach (get_categories() as $category) {
      ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <a href="?controller=product&category_id=<?= $category['category_id'] ?>">
            <?= $category['category_name'] ?>
          </a>
          <span class="badge bg-primary rounded-pill"><?= count(get_products($category['category_id'])); ?></span>
        </li>
      <?php } ?>
    </ul>
  </div>

  <div class="card w-100 mt-3">
    <div class="card-header">
      Top 10 Latest Products
    </div>
    <ul class="list-group list-group-flush">
      <?php
      foreach (get_products('', '', 10) as $product) {
      ?>
        <li class="list-group-item d-flex align-items-center gap-3">
          <img src="uploads/<?= $product['product_image'] ?>" alt="<?= $product['product_name'] ?>" style="width: 64px; height: 64px;">
          <a href="?controller=product_detail&product_id=<?= $product['product_id'] ?>">
            <?= $product['product_name'] ?>
          </a>
        </li>
      <?php } ?>
    </ul>
  </div>
</aside>