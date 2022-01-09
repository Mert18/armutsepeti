<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Yemek Sepeti - Registration</title>
  <link rel="stylesheet" href="/armutsepeti/css/style.css" />
  <link rel="stylesheet" href="/armutsepeti/css/login.css" />
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

    $sql = "SELECT * FROM users";
    $checkresult = $conn->query($sql);
    $flag = 0;

    while ($row = $checkresult->fetch_assoc()) {
      if ($row['email'] === $email || $row['username'] === $username) {
        $flag = 1;
      }
    }

    if ($flag) {
      header('location:error.php');
      exit();
    }

    $query =
      "INSERT into `users` (username, password, email, trn_date)
VALUES ('$username', '" .
      md5($password) .
      "', '$email', '$trn_date')";
    $result = mysqli_query($conn, $query);
    if ($result) {
      header('location: login.php');
    }
  } else {
  ?>
    <div class="loginpage">

      <div class="formwrapper">
        <form class="login" action="" method="post">
          <div class="formlogowrapper">
            <img src="/armutsepeti/yemeksepeti-seeklogo.com.svg" alt="armutsepeti logo" width="256px" />
          </div>
          <h1 class="login-title">Register</h1>
          <input type="text" class="login-input" name="username" placeholder="Username" required />
          <input type="text" class="login-input" name="email" placeholder="Email Adress">
          <input type="password" class="login-input" name="password" placeholder="Password">
          <input type="submit" name="submit" value="Register" class="login-button">
          <p class="loginregister">Already Registered? <a href="login.php">Login Here</a></p>
        </form>
      </div>

    </div>
  <?php
  }
  ?>
</body>

</html>
