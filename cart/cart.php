<?php
session_start();

include("../auth/auth.php");
include("../auth/db.php");

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Yemek Sepeti - Cart</title>
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="../css/cart.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>

<body>

  <?php
  include('../layout/header.php');
  ?>

  <div class="container">
    <?php
    if ($_SESSION['cart']) {

      $items = $_SESSION['cart'];
      $cartitems = explode(",", $items);
    ?>
      <div class="row">
        <table class="table">
          <tr>
            <th>S.NO</th>
            <th>Food Image</th>
            <th>Food Name</th>
            <th>Price</th>
            <th>Remove</th>
          </tr>
          <?php
          $total = 0;
          $i = 1;
          if ($items) {
            foreach ($cartitems as $key => $id) {
              $sql = "SELECT * FROM products WHERE id = $id";
              $res = mysqli_query($conn, $sql);
              $r = mysqli_fetch_assoc($res);
          ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><img src="../foods/<?php echo $r['image'] ?>" width="128px" /></td>
                <td><?php echo $r['name']; ?></td>
                <td><?php echo $r['price']; ?>&#8378;</td>
                <td><a href="/armutsepeti/cart/delcart.php?remove=<?php echo $key; ?>">Remove</a></td>
              </tr>
            <?php
              $total = $total + $r['price'];
              $i++;
            }
          } else {
            ?>
            <div class="empty">
              <p>Cart is empty.</p>
            </div>
          <?php }  ?>
          <tr class="result">
            <td><strong>Total Price</strong></td>
            <td><strong><?php echo $total; ?>&#8378;</strong></td>
            <td><a href="/armutsepeti/order/placeorder.php?total=<?php echo $total;  ?>" class="checkout">Checkout</a></td>
          </tr>
        </table>


      </div>


    <?php
    } else {
    ?>
      <div class="emptycart">
        <p>Cart is empty.</p>
      </div>
    <?php
    }
    ?>
  </div>

  <?php
  include('../layout/footer.php');
  ?>


</body>

</html>
