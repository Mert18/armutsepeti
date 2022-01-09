<?php
session_start();

include('../auth/db.php');
include('../auth/auth.php');


$username = $_SESSION['username'];
$total = $_GET['total'];

$usersql = "SELECT * FROM users WHERE username= '" . $_SESSION['username'] . "';";

$result = $conn->query($usersql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $userid = $row['id'];
  }
}

$sql = "INSERT INTO orders(user_id, total, delivered) VALUES ($userid, $total, false)";

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully";

if (mysqli_query($conn, $sql)) {
  echo "Records added successfully.";
  header('location: ../order/ordersuccess.php');
} else {
  echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
  header('location: ../order/orderfail.php');
}
