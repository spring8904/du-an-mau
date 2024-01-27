<nav>
  <ul class="pagination">
    <li class="page-item <?php echo $prev_page == $page ? 'disabled' : '' ?>">
      <a class="page-link" href="?controller=<?php echo $controller ?>&page=<?php echo $prev_page ?>">Previous</a>
    </li>
    <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
      <li class="page-item <?php if ($page == $i) echo 'active' ?>">
        <a class="page-link" href="?controller=<?php echo $controller ?>&page=<?php echo $i ?>"><?php echo $i ?></a>
      </li>
    <?php } ?>
    <li class="page-item <?php echo $next_page == $page ? 'disabled' : '' ?>">
      <a class="page-link" href="?controller=<?php echo $controller ?>&page=<?php echo $next_page ?>">Next</a>
    </li>
  </ul>
</nav>