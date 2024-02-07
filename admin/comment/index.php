<?php
$limit = 20;
$comments = get_comments_group_by_product_name($limit, ($page - 1) * $limit);
$total_comments = count(get_comments_group_by_product_name());
$total_pages = ceil($total_comments / $limit);
$prev_page = $page <= 1 ? 1 : $page - 1;
$next_page = $page >= $total_pages ? $total_pages : $page + 1;
?>

<main class="container">
  <h1 class="text-center alert alert-danger">List Comment</h1>

  <table class=" table table-striped table-hover table-bordered mt-3">
    <thead>
      <tr>
        <th scope="col">Product name</th>
        <th scope="col">Quantity comment</th>
        <th scope="col">Latest time</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($comments as $comment) {
        $quantity =  count(get_comments($comment['product_id'])); ?>
        <tr>
          <td><?= $comment['product_name'] ?></td>
          <td><?= $quantity ?></td>
          <td><?= $comment['comment_time'] ?></td>
          <td>
            <a href="./?controller=comment_detail&product_id=<?= $comment['product_id'] ?>" class="btn btn-primary">
              View
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