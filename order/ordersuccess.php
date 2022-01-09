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
  <link rel="stylesheet" href="../css/components.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>


<body>
  <?php
  include('../layout/header.php');
  ?>
  <div class="app">

    <div class="popupsuccess">
      <div class="popupsuccesslogo">
        <img src="../assets/success.png" width="64px" alt="success" />
      </div>
      <div class="popupsuccessright">
        <div class="popupsuccessrighttop">
          <h2>Success</h2>
        </div>
        <div class="popupsuccessrightbottom">
          <p>Your order has been placed.</p>
          <div class="buttons">
            <button> <a href="/armutsepeti/index.php">Go Homepage</a></button>
          </div>
        </div>

      </div>
    </div>

  </div>
  <?php
  include('../layout/footer.php');
  ?>

</body>

</html>
