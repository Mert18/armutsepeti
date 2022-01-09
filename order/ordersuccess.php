<?php

include('../auth/db.php');
include('../auth/auth.php');

$_SESSION['cart'] = [];
?>

<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8" />
  <title>Yemek Sepeti - Order Success</title>
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>

<body>

  <div class="popupsuccess">
    <h2>Success</h2>
    <p>Your order placed successfully. <a href="/armutsepeti/index.php">Return Home</a></p>
  </div>

</body>

</html>
