<?php
include("auth.php");
include("db.php");

if (isset($_GET['id']))
  $foodId = $_GET['id'];
// $sql = "SELECT * FROM products WHERE id = '$foodId'";
// $result = $conn->query($sql);

$result = mysqli_query(
  $conn,
  "SELECT * FROM `products` WHERE `id`='$foodId'"
);

$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$code = $row['code'];
$price = $row['price'];
$image = $row['image'];
$description = $row['description'];
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Yemek Sepeti</title>
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>

<body>
  <?php
  include('header.php');
  ?>
  <main class="foodpage">
    <div class="foodwrapper">
      <div class="singlefood">
        <div class="foodmid">
          <div class="foodmidimg">
            <img src="./foods/<?php echo $image ?>" alt="<?php echo $name ?>" width="100%" />
          </div>
          <div class="foodmidexp">
            <div class="foodmidexptop">
              <span class="explanator">Food Name</span>
              <h1><?php echo $name ?></h1>
            </div>
            <div class="group">
              <span class="explanator">Description</span>
              <p><?php echo $description  ?></p>
            </div>
            <div class="inputgroup">
              <span class="explanator">Quantity</span>
              <input min="1" max="10" type="number" name="quantity" id="quantity" value=1 />
            </div>
            <div class="price">
              <span class="explanator">Total Price</span>
              <h3><?php echo $price ?> &#8378; * Quantity</h3>
            </div>
            <div class="addtocart">
              <button>ORDER</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php include('footer.php') ?>

</body>

</html>
