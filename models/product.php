<?php
function insert_product($name, $price, $description, $image, $category_id)
{;
  $image = upload_file($image);

  if ($image != '') {
    $sql = "INSERT INTO products(product_name, product_price, product_description, product_image, category_id) 
            VALUES ('$name', '$price', '$description', '$image', '$category_id')";
    pdo_execute($sql);
  }
}

function update_product($id, $name, $price, $description, $image, $category_id)
{
  if (isset($image) && $image['name'] != '')
    $image = upload_file($image);
  else
    $image = get_product_by_id($id)['product_image'];

  $sql = "UPDATE products 
          SET product_name = '$name', product_price = '$price', product_description = '$description', product_image = '$image', category_id = '$category_id' 
          WHERE product_id = $id";
  pdo_execute($sql);
}


function delete_product($id)
{
  $sql = "DELETE FROM products WHERE product_id = $id";
  pdo_execute($sql);
}

function get_products($categories_id = 'all', $search = '', $limit = '', $offset = '')
{
  $sql = "SELECT * FROM products JOIN categories ON products.category_id = categories.category_id";

  if ($categories_id == 'all') {
    if ($search != '') $sql .= " WHERE product_name LIKE '%$search%'";
  } else if ($categories_id != '') {
    if ($search != '') {
      $sql .= " WHERE products.category_id = $categories_id 
              AND product_name LIKE '%$search%'";
    } else $sql .= " WHERE products.category_id = $categories_id";
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

function upload_file($file)
{
  $target_dir = "../uploads/";
  $filename = explode('.', $file["name"]);
  $ext = end($filename);
  $file["name"] = uniqid() . '.' . $ext;
  $target_file = $target_dir . basename($file["name"]);
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  $allowedTypes = array('jpg', 'png', 'jpeg');

  if (!in_array($imageFileType, $allowedTypes)) {
    echo "Type is not allowed";
  } elseif (file_exists($target_file)) {
    echo "Sorry, file already exists.";
  } elseif ($file["size"] > 5000000) {
    echo "Sorry, your file is too large.";
  } elseif (move_uploaded_file($file["tmp_name"], $target_file)) {
    echo "The file " . basename($file["name"]) . " has been uploaded.";
    return $file["name"];
  }

  return '';
}
