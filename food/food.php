<?php
session_start();

include("../auth/auth.php");
include("../auth/db.php");

if (isset($_GET['id']))
  $foodId = $_GET['id'];

$result = mysqli_query(
  $conn,
  "SELECT * FROM `products` WHERE `id`='$foodId'"
);

$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$id = $row['id'];
$code = $row['code'];
$price = $row['price'];
$image = $row['image'];
$description = $row['description'];


?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Yemek Sepeti - Food</title>
  <link rel="stylesheet" href="/armutsepeti/css/style.css" />
  <link rel="stylesheet" href="/armutsepeti/css/food.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>

<body>
  <?php
  include('../layout/header.php');
  ?>
  <main class="foodpage">
    <div class="foodwrapper">
      <div class="singlefood">
        <div class="foodmid">
          <div class="foodmidimg">
            <img src="../foods/<?php echo $image ?>" alt="<?php echo $name ?>" width="100%" />
          </div>
          <div class="foodmidexp">
            <div class="group">
              <span class="explanator">Food Name</span>
              <p><?php echo $name ?></p>
            </div>
            <div class="group">
              <span class="explanator">Description</span>
              <p><?php echo $description  ?></p>
            </div>
            <div class="group">
              <span class="explanator">Total Price</span>
              <p><?php echo $price ?> &#8378;</p>
            </div>
            <div class="addtocart">
              <button><a href="../cart/addtocart.php?id=<?php echo $foodId ?>">ORDER</a></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php include('../layout/footer.php') ?>

</body>

</html>
