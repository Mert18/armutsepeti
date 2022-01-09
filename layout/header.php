<?php
include("../auth/auth.php");
include("../auth/db.php");
?>

<!doctype html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Yemek Sepeti - Cart</title>
  <link rel="stylesheet" href="/armutsepeti/css/style.css" />
  <link rel="stylesheet" href="/armutsepeti/css/header.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>

<body>
  <header class="head">
    <div class="head-logo">
      <a href="/armutsepeti/index.php">
        <img src="/armutsepeti/assets/yemeksepeti-seeklogo.com.svg" width="168px" alt="yemeksepeti logo" />
      </a>
    </div>
    <div class="headinfo">
      <a href="/armutsepeti/cart/cart.php"><i class="fas fa-shopping-cart"></i> Cart</a>
      <a href="/armutsepeti/auth/profile.php"><?php echo $_SESSION['username']; ?></a>
      <a href="/armutsepeti/auth/logout.php">Logout</a>
    </div>
  </header>
</body>

</html>
