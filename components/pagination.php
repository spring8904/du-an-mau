<nav>
  <ul class="pagination">
    <li class="page-item <?= $prev_page == $page ? 'disabled' : '' ?>">
      <a class="page-link" href="?controller=<?= $controller ?>&page=<?= $prev_page ?>">Previous</a>
    </li>
    <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
      <li class="page-item <?php if ($page == $i) echo 'active' ?>">
        <a class="page-link" href="?controller=<?= $controller ?>&page=<?= $i ?>"><?= $i ?></a>
      </li>
    <?php } ?>
    <li class="page-item <?= $next_page == $page ? 'disabled' : '' ?>">
      <a class="page-link" href="?controller=<?= $controller ?>&page=<?= $next_page ?>">Next</a>
    </li>
  </ul>
</nav>