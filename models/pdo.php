<?php
function pdo_get_connection()
{
  $servername = "localhost";
  $username = "root";
  $password = "";
  try {
    $conn = new PDO("mysql:host=$servername;dbname=du_an_mau", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
}

function pdo_execute($sql)
{
  $sql_args = array_slice(func_get_args(), 1);
  try {
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute($sql_args);
  } catch (PDOException $e) {
    echo "Query failed: " . $e->getMessage();
  } finally {
    unset($conn);
  }
}

function pdo_query($sql)
{
  $sql_args = array_slice(func_get_args(), 1);
  try {
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute($sql_args);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    echo "Query failed: " . $e->getMessage();
  } finally {
    unset($conn);
  }
}

function pdo_query_one($sql)
{
  $sql_args = array_slice(func_get_args(), 1);
  try {
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute($sql_args);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    echo "Query failed: " . $e->getMessage();
  } finally {
    unset($conn);
  }
}

function upload_file($file)
{
  $target_dir = "../uploads/";
  $filename = explode('.', $file["name"]);
  $ext = end($filename);
  $file["name"] = uniqid() . '.' . $ext;
  $target_file = $target_dir . basename($file["name"]);
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  $allowedTypes = array('jpg', 'png', 'jpeg', 'webp');

  if (!in_array($imageFileType, $allowedTypes)) {
    echo "Type is not allowed";
  } elseif (file_exists($target_file)) {
    echo "Sorry, file already exists.";
  } elseif ($file["size"] > 5000000) {
    echo "Sorry, your file is too large.";
  } elseif (move_uploaded_file($file["tmp_name"], $target_file)) {
    // echo "The file " . basename($file["name"]) . " has been uploaded.";
    return $file["name"];
  }

  return '';
}
