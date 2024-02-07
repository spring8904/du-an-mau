<footer class="mt-4 pt-5 pb-3 bg-secondary-subtle">
  <div class="container">
    <div class="row">
      <div class="col-6 mb-3">
        <h5>Category</h5>
        <ul class="nav flex-column">
          <?php foreach (get_categories() as $category) { ?>
            <li class="nav-item mb-2">
              <a href="?controller=product&category_id=<?= $category['category_id'] ?>" class="nav-link p-0 text-body-secondary">
                <?= $category['category_name'] ?>
              </a>
            </li>
          <?php } ?>
        </ul>
      </div>

      <div class="col-6 mb-3">
        <form>
          <h5>Subscribe to our newsletter</h5>
          <p>Monthly digest of what's new and exciting from us.</p>
          <div class="d-flex flex-column flex-sm-row w-100 gap-2">
            <label for="newsletter1" class="visually-hidden">Email address</label>
            <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
            <button class="btn btn-primary" type="button" disabled>Subscribe</button>
          </div>
        </form>
      </div>
    </div>

    <p class="border-top border-dark text-center p-3">Copyright &copy; 2024 <a href="." class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Navia Shop</a>. All rights reserved.</p>
  </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="js/previewImage.js"></script>
<script src="js/select.js"></script>
</body>

</html>