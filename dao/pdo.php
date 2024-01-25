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
