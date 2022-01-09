<?php
include("db.php");
include("auth.php");

$username = $_SESSION['username'];

$usersql = "SELECT * FROM users WHERE username= '" . $_SESSION['username'] . "';";

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>ArmutSepeti | Profile</title>
  <link rel="stylesheet" href="/armutsepeti/css/style.css" />
  <link rel="stylesheet" href="/armutsepeti/css/profile.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>

<body>
  <?php
  include('../layout/header.php')
  ?>

  <div class="profile">

    <div class="profileinfo">
      <h1> <?php echo $username ?></h1>
    </div>

    <div class="orderswrapper">
      <div>
        <h3>Your Orders</h3>
      </div>
    </div>

    <div class="orders">

      <?php

      $result = $conn->query($usersql);
      if ($result->num_rows > 0) {
        while ($r = $result->fetch_assoc()) {
          $user_id = $r['id'];
        }
      }

      $sql = "SELECT * FROM orders WHERE user_id =" . $user_id . ";";
      $resulttwo = $conn->query($sql);

      if ($resulttwo->num_rows > 0) {
        while ($row = $resulttwo->fetch_assoc()) {
      ?>
          <div class="order">
            <div class="ordergroup">
              <span class="small">Order Id</span>
              <p> <?php echo $row['id']; ?> </p>
            </div>
            <div class="ordergroup">
              <span class="small">Order Date</span>
              <?php echo $row['order_date']; ?>
            </div>
            <div class="ordergroup">
              <span class="small">Total Price</span>
              <p>
                <?php echo $row['total']; ?> &#8378;
              </p>
            </div>
            <div class="ordergroup">
              <span class="small">Is Delivered?</span>
              <p>
                <?php
                if ($row['delivered'] == 0) {
                  echo "No";
                } else {
                  echo "Yes";
                }
                ?>
              </p>
            </div>
          </div>
      <?php
        }
      } else {
        echo "0 records";
      }


      ?>

    </div>


  </div>

  <?php
  include('../layout/footer.php')
  ?>

</body>

</html>
