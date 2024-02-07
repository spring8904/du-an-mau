<?php
$limit = 20;

$customers = get_customers(
  $search,
  $limit,
  ($page - 1) * $limit
);

$all_customers = get_customers();

$total_customers = count($all_customers);
$total_pages = ceil($total_customers / $limit);

$prev_page = $page <= 1 ? 1 : $page - 1;
$next_page = $page >= $total_pages ? $total_pages : $page + 1;
?>

<main class="container">
  <h1 class="text-center alert alert-danger">List Customer</h1>

  <form class="d-flex gap-2" method="get">
    <input type="hidden" name="c" value="customer">
    <input class="form-control" type="search" placeholder="Customer username" name="search" value="<?= $search ?>">
    <button class="btn btn-outline-success" type="submit">Search</button>
  </form>

  <?php include '../components/group-btn.php' ?>

  <table class="mt-3 table table-striped table-hover table-bordered">
    <thead>
      <tr>
        <th scope="col" class="text-center">
          <input class="form-check-input mt-0" type="checkbox" name="select-all">
        </th>
        <th scope="col">ID</th>
        <th scope="col">Image</th>
        <th scope="col">Username</th>
        <th scope="col">Full Name</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($customers as $customer) {
      ?>
        <tr>
          <td class="text-center">
            <input class="form-check-input mt-0" type="checkbox" value="<?= $customer['customer_id'] ?>">
          </td>
          <td><?= $customer['customer_id'] ?></td>
          <td>
            <img width="100px" height="100px" src="../uploads/<?= $customer['customer_avatar'] ?>" alt="<?= $customer['customer_username'] ?>">
          </td>
          <td><?= $customer['customer_username'] ?></td>
          <td><?= $customer['customer_full_name'] ?></td>
          <td><?= $customer['customer_email'] ?></td>
          <td><?= $customer['customer_role'] ? 'admin' : 'customer' ?></td>
          <td>
            <?php if ($customer['customer_role'] == 0) { ?>
              <a href="./?controller=customer&action=edit&customer_id=<?= $customer['customer_id'] ?>" class="btn btn-warning mb-2">
                <i class="fa-solid fa-pen-to-square"></i>
                Edit
              </a>
              <a href="./?controller=customer&action=delete&customer_id=<?= $customer['customer_id'] ?>" class="btn btn-danger mb-2" onclick="return confirm('Are you sure you want to delete customer <?= $customer['customer_username'] ?>')">
                <i class="fa-solid fa-trash"></i>
                Delete
              </a>
            <?php } ?>
          </td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>

  <?php include '../components/group-btn.php' ?>

  <?php include '../components/pagination.php' ?>
</main>