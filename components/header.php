<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php if (isset($title)) echo "$title | " ?>Navia Shop</title>
  <link rel="shortcut icon" href="assets/images/logo-pink.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary container">
      <div class="container-fluid">
        <a class="navbar-brand" href=".">
          <img src="assets/images/logo-pink.png" alt="Logo" width="30" class="d-inline-block align-text-top">
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
            <li class="nav-item">
              <a class="nav-link" href="?controller=product">Customer</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?controller=product">Comment</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?controller=product">Login</a>
            </li>
          </ul>
          <a class="ms-2 btn btn-success" href="./admin">Admin</a>
        </div>
      </div>
    </nav>
  </header>