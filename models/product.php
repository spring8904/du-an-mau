<?php
function insert_product($name, $price, $sale, $description, $image, $category_id)
{;
  $image = upload_file($image);

  if ($image != '') {
    $sql = "INSERT INTO products(product_name, product_price, product_sale, product_description, product_image, category_id) 
            VALUES ('$name', '$price', '$sale', '$description', '$image', '$category_id')";
    pdo_execute($sql);
  }
}

function update_product($id, $name, $price, $sale, $description, $image, $category_id)
{
  if (isset($image) && $image['name'] != '')
    $image = upload_file($image);
  else
    $image = get_product_by_id($id)['product_image'];

  $sql = "UPDATE products 
          SET product_name = '$name', product_price = '$price', product_sale='$sale', product_description = '$description', product_image = '$image', category_id = '$category_id' 
          WHERE product_id = $id";
  pdo_execute($sql);
}


function delete_product($id)
{
  $sql = "DELETE FROM products WHERE product_id = $id";
  pdo_execute($sql);
}

function get_products($category_id = '', $search = '', $limit = '', $offset = '')
{
  $sql = "SELECT * FROM products JOIN categories ON products.category_id = categories.category_id";

  if ($category_id == '') {
    if ($search != '') $sql .= " WHERE product_name LIKE '%$search%'";
  } else if ($category_id != '') {
    if ($search != '') {
      $sql .= " WHERE products.category_id = $category_id 
              AND product_name LIKE '%$search%'";
    } else $sql .= " WHERE products.category_id = $category_id";
  }

  $sql .= " ORDER BY product_id DESC";

  if ($limit != '') {
    $sql .= " LIMIT $limit";
  }

  if ($offset != '') {
    $sql .= " OFFSET $offset";
  }

  return pdo_query($sql);
}

function get_product_by_id($id)
{
  $sql = "SELECT * FROM products 
          JOIN categories ON products.category_id = categories.category_id 
          WHERE product_id = $id";
  return pdo_query_one($sql);
}
