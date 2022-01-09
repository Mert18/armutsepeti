<?php

include('../auth/db.php');
include('../auth/auth.php');

?>

<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8" />
  <title>Yemek Sepeti - Add To Cart Failed</title>
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="../css/components.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>

<body>

  <div class="app">

    <div class="popupsuccess">
      <div class="popupsuccesslogo">
        <img src="../assets/close.png" width="64px" alt="failed" />
      </div>
      <div class="popupsuccessright">
        <div class="popupsuccessrighttop">
          <h2>Failed</h2>
        </div>
        <div class="popupsuccessrightbottom">
          <p>We encountered an error adding the food to the cart. <a href="/armutsepeti/index.php">Go Home</a></p>
          <div class="buttons">
            <button> <a href="/armutsepeti/cart/cart.php">Go To Cart</a></button>
          </div>
        </div>

      </div>
    </div>

  </div>

</body>

</html>
