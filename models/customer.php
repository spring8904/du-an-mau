<?php
function insert_customer($username, $password, $full_name = '', $email = '', $avatar = '')
{
  if ($avatar != '') {
    $avatar = upload_file($avatar);
    $sql = "INSERT INTO customers(customer_username, customer_password, customer_full_name, customer_avatar, customer_email) 
            VALUES ('$username', '$password', '$full_name', '$avatar', '$email')";
  } else {
    $sql = "INSERT INTO customers(customer_username, customer_password, customer_full_name, customer_email) 
            VALUES ('$username', '$password', '$full_name', '$email')";
  }
  pdo_execute($sql);
}

function update_customer($id, $username, $password, $full_name, $avatar, $email)
{
  if (isset($avatar) && $avatar['name'] != '') {
    $avatar = upload_file($avatar);
  } else {
    $avatar = get_customer_by_id($id)['customer_avatar'];
  }

  $sql = "UPDATE customers 
          SET customer_username = '$username', customer_password = '$password', customer_full_name='$full_name', customer_avatar = '$avatar', customer_email = '$email' 
          WHERE customer_id = $id";
  pdo_execute($sql);
}

function delete_customer($id)
{
  $sql = "DELETE FROM customers WHERE customer_id = $id";
  pdo_execute($sql);
}

function get_customers($search = '', $limit = '', $offset = '')
{
  $sql = "SELECT * FROM customers";

  if ($search != '') {
    $sql .= " WHERE customer_username LIKE '%$search%'";
  }

  $sql .= " ORDER BY customer_id DESC";

  if ($limit != '') {
    $sql .= " LIMIT $limit";
  }

  if ($offset != '') {
    $sql .= " OFFSET $offset";
  }
  return pdo_query($sql);
}

function get_customer_by_id($id)
{
  $sql = "SELECT * FROM customers WHERE customer_id = $id";
  return pdo_query_one($sql);
}

function get_customer_by_username($username)
{
  $sql = "SELECT * FROM customers WHERE customer_username = '$username'";
  return pdo_query_one($sql);
}
