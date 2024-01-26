<?php
function insert_category($name)
{
  $sql = "INSERT INTO categories (category_name) VALUES ('$name')";
  pdo_execute($sql);
}

function update_category($id, $name)
{
  $sql = "UPDATE categories SET category_name = '$name' WHERE category_id = $id";
  pdo_execute($sql);
}

function delete_category($id)
{
  $sql = "DELETE FROM categories WHERE category_id = $id";
  pdo_execute($sql);
}

function get_all_categories()
{
  $sql = "SELECT * FROM categories ORDER BY category_id DESC";
  return pdo_query($sql);
}

function get_category_by_id($id)
{
  $sql = "SELECT * FROM categories WHERE category_id = $id";
  return pdo_query_one($sql);
}
