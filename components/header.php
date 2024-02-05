<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php if (isset($title_web)) echo "$title_web | " ?>Navia Shop</title>
  <link rel="shortcut icon" href="assets/logo/logo-pink.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fontawesome-6-pro@6.4.0/css/all.min.css" integrity="sha256-R6pa/zpbhz9IjJIAXKP/0Kk53cRwfsjdik4Ojf9lOrQ=" crossorigin="anonymous">
</head>

<body class="bg-light">
  <header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary container">
      <div class="container-fluid">
        <a class="navbar-brand" href=".">
          <img src="assets/logo/logo-pink.png" alt="Logo" width="30" class="d-inline-block align-text-top">
          Navia Shop
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href=".">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?controller=product">Product</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Category
              </a>
              <ul class="dropdown-menu">
                <?php
                foreach (get_categories() as $key => $category) {
                  if ($key != 0) {
                ?>
                    <li>
                      <hr class="dropdown-divider">
                    </li>
                  <?php
                  }
                  ?>
                  <li>
                    <a class="dropdown-item" href="?controller=product&category_id=<?= $category['category_id'] ?>">
                      <?= $category['category_name'] ?>
                    </a>
                  </li>
                <?php } ?>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?controller=about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?controller=contact">Contact</a>
            </li>
          </ul>
          <div class="d-flex align-items-center justify-content-between">
            <form class="d-flex" method="get" role="search">
              <input type="hidden" name="controller" value="product">
              <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">
                <i class="fa-regular fa-magnifying-glass"></i>
              </button>
            </form>
            <a class="ms-2 btn btn-success" href="?controller=login">Login</a>
          </div>
        </div>
      </div>
    </nav>
  </header>