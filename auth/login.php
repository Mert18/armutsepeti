<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Yemek Sepeti - Login</title>
  <link rel="stylesheet" href="/armutsepeti/css/login.css" />
  <link rel="stylesheet" href="/armutsepeti/css/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>

<body>
  <?php
  require('db.php');
  session_start();
  if (isset($_POST['username'])) {
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($conn, $username);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `users` WHERE username='$username'
and password='" . md5($password) . "'";
    $result = mysqli_query($conn, $query) or die(mysql_error());
    $rows = mysqli_num_rows($result);
    if ($rows == 1) {
      $_SESSION['username'] = $username;
      header("Location: ../index.php");
    } else {
      echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
    }
  } else {
  ?>
    <div class="loginpage">
      <div class="formwrapper">
        <form class="login" action="" method="post" name="login">
          <div class="formlogowrapper">
            <img src="/armutsepeti/assets/yemeksepeti-seeklogo.com.svg" alt="armutsepeti logo" width="256px" />
          </div>
          <h1 class="login-title">Login</h1>
          <input type="text" class="login-input" name="username" placeholder="Username" autofocus>
          <input type="password" class="login-input" name="password" placeholder="Password">
          <input type="submit" value="Login" name="submit" class="login-button">
          <p class="loginregister">New Here? <a href="/armutsepeti/auth/registration.php">Register</a></p>
        </form>
      </div>
    </div>

  <?php } ?>
</body>

</html>
