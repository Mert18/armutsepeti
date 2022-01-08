<?php
include("auth.php");
include("db.php");
?>


<!doctype html>
<header class="head">
  <div class="head-logo">
    <a href="./index.php">
      <img src="./yemeksepeti-seeklogo.com.svg" width="168px" alt="yemeksepeti logo" />
    </a>
  </div>
  <div class="headinfo">
    <a href="profile.php"><?php echo $_SESSION['username']; ?></a>
    <a href="logout.php">Logout</a>
  </div>
</header>
