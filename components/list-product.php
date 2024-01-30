<section>
  <h2 class="alert alert-success mt-3 text-center"><?= $title ?></h2>
  <div class="container">
    <div class="row">
      <?php foreach ($products as $product) {
        extract($product) ?>
        <div class="col col-lg-3 col-md-4 col-sm-6 mb-3">
          <div class="card">
            <div class="ratio ratio-1x1">
              <img src="uploads/<?= $product_image ?>" class="card-img-top" alt="<?= $product_image ?>">
            </div>
            <div class="card-body">
              <h5 class="card-title fs-6" style="min-height: 41px;"><?= $product_name ?> <span class="badge bg-danger">-<?= $product_sale ?>%</span></h5>
              <div class="d-flex alight-items-center gap-3">
                <p class="card-text fw-bold text-danger"><?= $product_price - ($product_price * $product_sale) / 100 ?>$</p>
                <p class="card-text text-decoration-line-through text-body-secondary"><?= $product_price ?>$</p>
              </div>
              <div class="d-flex justify-content-between">
                <a href="#" class="btn btn-primary">Buy</a>
                <a href="?controller=product&product_id=<?= $product_id ?>" class="btn btn-warning">View</a>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
  <div class="text-center">
    <a href="?controller=product<?= $_category_id ? '&category_id=' . $_category_id : '' ?>" class="btn btn-outline-primary text-center mt-2">
      See All >
    </a>
  </div>
</section>