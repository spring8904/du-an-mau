<?php
$limit = 20;
$comments = get_comments($product_id, '', $limit, ($page - 1) * $limit);
$total_comments = count(get_comments($product_id));
$total_pages = ceil($total_comments / $limit);
$prev_page = $page <= 1 ? 1 : $page - 1;
$next_page = $page >= $total_pages ? $total_pages : $page + 1;
?>

<main class="container">
  <h1 class="text-center alert alert-danger"><?= get_product_by_id($product_id)['product_name'] ?> Comments</h1>

  <table class=" table table-striped table-hover table-bordered mt-3">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Content</th>
        <th scope="col">Username</th>
        <th scope="col">Time</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($comments as $comment) {
      ?>
        <tr>
          <td><?= $comment['comment_id'] ?></td>
          <td><?= $comment['comment_content'] ?></td>
          <td><?= $comment['customer_username'] ?></td>
          <td><?= $comment['comment_time'] ?></td>
          <td>
            <a href="./?controller=comment_detail&action=edit&comment_id=<?= $comment['comment_id'] ?>" class="btn btn-warning mb-2">
              <i class="fa-solid fa-pen-to-square"></i>
              Edit
            </a>
            <a href="./?controller=comment_detail&action=delete&comment_id=<?= $comment['comment_id'] ?>" class="btn btn-danger mb-2 <?= $quantity != 0 ? 'disabled' : '' ?>  " onclick="return confirm('Are you sure you want to delete comment <?= $comment['comment_id'] ?>')">
              <i class="fa-solid fa-trash"></i>
              Delete
            </a>
          </td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>

  <?php include '../components/pagination.php' ?>
</main>