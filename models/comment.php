<?php
function insert_comment($content, $product_id, $customer_id)
{
  $sql = "INSERT INTO comments (comment_content, product_id, customer_id) VALUES ('$content', '$product_id', '$customer_id')";
  pdo_execute($sql);
}

function update_comment($id, $content, $product_id, $customer_id)
{
  $sql = "UPDATE comments SET comment_content = '$content', product_id = '$product_id', customer_id = '$customer_id' WHERE comment_id = $id";
  pdo_execute($sql);
}

function delete_comment($id)
{
  $sql = "DELETE FROM comments WHERE comment_id = $id";
  pdo_execute($sql);
}

function get_comments($product_id = '', $customer_id = '', $limit = '', $offset = '')
{
  $sql = "SELECT * FROM comments 
          JOIN products ON comments.product_id = products.product_id 
          JOIN customers ON comments.customer_id = customers.customer_id";

  if ($product_id != '') {
    if ($customer_id != '') {
      $sql .= " WHERE products.product_id = $product_id AND customers.customer_id = $customer_id";
    } else {
      $sql .= " WHERE products.product_id = $product_id";
    }
  } else if ($customer_id != '') {
    $sql .= " WHERE customers.customer_id = $customer_id";
  }

  $sql .= " ORDER BY comment_id DESC";

  if ($limit != '') {
    $sql .= " LIMIT $limit";
  }

  if ($offset != '') {
    $sql .= " OFFSET $offset";
  }
  return pdo_query($sql);
}

function get_comment_by_id($id)
{
  $sql = "SELECT * FROM comments WHERE comment_id = $id";
  return pdo_query_one($sql);
}

function get_comments_group_by_product_name($limit = '', $offset = '')
{
  $sql = "SELECT * FROM comments 
          JOIN products ON comments.product_id = products.product_id GROUP BY products.product_id";

  $sql .= " ORDER BY comment_id DESC";

  if ($limit != '') {
    $sql .= " LIMIT $limit";
  }

  if ($offset != '') {
    $sql .= " OFFSET $offset";
  }
  return pdo_query($sql);
}
