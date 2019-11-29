<?php
$connection = mysqli_connect('localhost','root','');
if (!$connection){
    echo 'Database Connection Failed' . die(mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'web');
if (!$select_db){
    echo 'Database Selection Failed' . die(mysqli_error($connection));
}

if (isset($_POST)& !empty($_POST)) {
  
print_r($_POST);
 $username=$_POST['username'];
$email=$_POST['email'];
 $password=$_POST['password'];
$sql = "INSERT INTO `user` (username, email, password) VALUES ('$username', '$email', '$password')";
$result = mysqli_query($connection, $sql);
}
?>

<html>

<head>

  <link rel="stylesheet" href="styles.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styles.css">
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <title>User registration script PHP</title>
</head>

<body>
  <div class="container">
    <form class="form-signin" method="POST">
      <h2 class="form-signin-heading">Please register</h2>
      <input type="text" name="username" class="form-control" placeholder="Username" required>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required
        autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <label for="inputPasswordagain" class="sr-only">Password again</label>
      <label for="inputPasswordAgain" class="sr-only">Password Again</label>

<input type="passwordAgain" name="passwordagain" id="inputPasswordAgain" class="form-control" placeholder="Password Again" required>

      <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
      <a class="btn btn-lg btn-primary btn-block" href="login.php">Login</a>
    </form>
  </div>
</body>

</html>