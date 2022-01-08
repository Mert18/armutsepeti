<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="./css/style.css" />
</head>
<body>
<?php
require "db.php";

if (isset($_REQUEST["username"])) {
    $username = stripslashes($_REQUEST["username"]);
    $username = mysqli_real_escape_string($conn, $username);
    $email = stripslashes($_REQUEST["email"]);
    $email = mysqli_real_escape_string($conn, $email);
    $password = stripslashes($_REQUEST["password"]);
    $password = mysqli_real_escape_string($conn, $password);
    $trn_date = date("Y-m-d H:i:s");
    $query =
        "INSERT into `users` (username, password, email, trn_date)
VALUES ('$username', '" .
        md5($password) .
        "', '$email', '$trn_date')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
    }
} else {
     ?>
<div class="app">

<div class="form-wrapper">
 <form class="login" action="" method="post">
  <div class="form-logo-wrapper">
    <img src="./armutsepeti.svg" alt="armutsepeti logo" width= "128px" height="128px" />
  </div>
  <h1 class="login-title">Register | ArmutSepeti</h1>
  <input type="text" class="login-input" name="username" placeholder="Username" required />
  <input type="text" class="login-input" name="email" placeholder="Email Adress">
  <input type="password" class="login-input" name="password" placeholder="Password">
  <input type="submit" name="submit" value="Register" class="login-button">
  <p class="login-lost">Already Registered? <a href="login.php">Login Here</a></p>
 </form>
</div>

</div>
<?php
}
?>
</body>
</html>