<?php
session_start();

include("./auth/auth.php");
include("./auth/db.php");
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Yemek Sepeti</title>
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="stylesheet" href="./css/home.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>

<body>
  <?php
  include('./layout/header.php');
  ?>

  <main class="main">
    <div class="foods">
      <?php
      $sql = "SELECT * FROM products";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
      ?>
          <div class="food">
            <div class="food__img">
              <img src="./foods/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>" width="256px" height="256px" />
            </div>
            <div class="food__btm">
              <p>
                <?php echo $row['name']; ?>
              </p>
              <p>
                <?php echo $row['price']; ?> &#8378;
              </p>
              <a href=" /armutsepeti/food/food.php?id=<?php echo $row['id'] ?>"><i class="fas fa-search"></i></a>
            </div>
          </div>
      <?php
        }
      } else {
        echo "0 records";
      }
      ?>
    </div>
    <div class="aside">
      <div class="foodoftheday">
        <h2>Food of the Day</h2>
        <img src="foods/pizza.jpeg" width="256px" alt="pizza image" />
        <a href="/">Buy Food of the Day with 25% discount!</a>
      </div>
    </div>
  </main>

  <?php
  include('./layout/footer.php');
  ?>

</body>

</html>
