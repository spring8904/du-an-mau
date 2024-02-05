<section class="mb-3">
  <h2 class="alert alert-success text-center"><?= $title ?></h2>

  <div class="container">
    <div class="row">
      <?php foreach ($products as $product) { ?>
        <div class="col col-lg-3 col-md-4 col-sm-6 mb-3">
          <div class="card">
            <div class="ratio ratio-1x1">
              <a href="?controller=product_detail&product_id=<?= $product['product_id'] ?>">
                <img src="uploads/<?= $product['product_image'] ?>" class="card-img-top" alt="<?= $product['product_image'] ?>">
              </a>
            </div>

            <div class="card-body">
              <h5 class="card-title fs-6" style="min-height: 41px;">
                <a href="?controller=product_detail&product_id=<?= $product['product_id'] ?>" class="text-decoration-none">
                  <?= $product['product_name'] ?>
                </a>
                <span class="badge bg-danger">-<?= $product['product_sale'] ?>%</span>
              </h5>

              <div class="d-flex align-items-center gap-3 mb-2">
                <p class="card-text fw-bold text-danger m-0"><?= $product['product_price'] - ($product['product_price'] * $product['product_sale']) / 100 ?>$</p>
                <p class="card-text text-decoration-line-through text-body-secondary"><?= $product['product_price'] ?>$</p>
              </div>

              <div class="d-grid">
                <button class="btn btn-outline-danger">
                  Add To Cart
                  <i class="fa-light fa-cart-shopping"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>

  <?php if ($controller != 'product') { ?>
    <div class="text-center">
      <a href="?controller=product<?= $_category_id ? '&category_id=' . $_category_id : '' ?>" class="btn btn-outline-primary text-center mt-2">
        See All >
      </a>
    </div>
  <?php } ?>
</section>