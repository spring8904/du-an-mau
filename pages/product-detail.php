<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  insert_comment($_POST['comment_content'], $_GET['product_id'], $_SESSION['customer_id']);
}
?>

<div class="container">
  <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href=".">Home</a></li>
      <li class="breadcrumb-item">
        <a href="?controller=product<?= $product['category_id'] ? '&category_id=' . $product['category_id'] : '' ?>"><?= $product['category_name']  ?></a>
      </li>
      <li class="breadcrumb-item active" aria-current="page"><?= $product['product_name'] ?></li>
    </ol>
  </nav>

  <div class="row">
    <main class="col col-lg-9 col-12">
      <h1 class="alert alert-danger"><?= $product['product_name'] ?></h1>

      <div class="card">
        <div class="ratio ratio-1x1 mx-auto" style="max-width: 240px;">
          <img src="uploads/<?= $product['product_image'] ?>" class="d-block w-100" alt="<?= $product['product_name'] ?>">
        </div>
      </div>

      <div class="card mt-2">
        <div class="d-flex align-items-center gap-3 py-2 px-3">
          <div class="card-text fw-bold text-danger fs-4"><?= $product['product_price'] - ($product['product_price'] * $product['product_sale']) / 100 ?>$</div>
          <div class="card-text text-decoration-line-through text-body-secondary fs-5"><?= $product['product_price'] ?>$</div>
          <div class="badge bg-danger fs-5">-<?= $product['product_sale'] ?>%</div>
        </div>
      </div>

      <div class="d-grid mt-2">
        <button class="btn btn-danger">
          Add To Cart
          <i class="fa-solid fa-cart-shopping"></i>
        </button>
      </div>

      <div class="card mt-3">
        <div class="card-header fs-4">
          Product description
        </div>
        <ul class="pe-3">
          <li>Name: <?= $product['product_name'] ?></li>

          <li>
            Category:
            <a href="?controller=product<?= $product['category_id'] ? '&category_id=' . $product['category_id'] : '' ?>"><?= $product['category_name']  ?></a>
          </li>

          <li>
            <p>
              Description:
              <?= $product['product_description'] ?>
            </p>
          </li>
        </ul>
      </div>

      <div class="card w-100 mt-3">
        <div class="card-header fs-4">
          Comments
        </div>

        <ul class="pe-3">
          <?php foreach (get_comments($product['product_id']) as $comment) { ?>
            <li>
              <div class="d-flex justify-content-between align-items-center">
                <span><?= $comment['comment_content'] ?></span>
                <span class="fst-italic mr-3"><?= $comment['customer_username'] ?> <?= $comment['comment_time'] ?></span>
              </div>
            </li>
          <?php } ?>
        </ul>
      </div>
      <form class="d-flex gap-2 mt-2" method="post">
        <input class="form-control" name="comment_content" type="text" placeholder="Your comment" required>
        <button class="btn btn-primary" type="submit">Send</button>
      </form>

      <div class="card w-100 mt-3">
        <div class="card-header fs-4">
          Products of the same category
        </div>

        <ul class="list-group list-group-flush">
          <?php
          foreach (get_products($product['category_id'], '', 5) as $product) {
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

    </main>
    <?php include 'components/sidebar.php'; ?>
  </div>
</div>