<?php
$files = scandir('assets/banner');

$imageFiles = array_filter($files, function ($file) {
  $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
  return in_array($extension, ['jpg', 'jpeg', 'png', 'webp']);
});

$imageFiles = array_values($imageFiles);
?>

<section id="banner" class="carousel slide rounded-1 overflow-hidden" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <?php foreach ($imageFiles as $index => $image) { ?>
      <button type="button" data-bs-target="#banner" data-bs-slide-to="<?= $index ?>" <?= $index == 0 ? 'class="active" aria-current="true"' : '' ?>></button>
    <?php } ?>
  </div>
  <div class="carousel-inner">
    <?php foreach ($imageFiles as $index => $image) { ?>
      <div class="carousel-item <?= $index == 0 ? 'active' : '' ?>">
        <img src="assets/banner/<?= $image ?>" class="d-block w-100" alt="<?= $image ?>">
      </div>
    <?php } ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#banner" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#banner" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</section>