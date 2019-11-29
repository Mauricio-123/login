<?php
require_once('conexion.php');
$errors = array();
function usuarioExiste($username,$connection)
{
    $stmt = $connection->prepare("SELECT *   FROM user WHERE username = ? LIMIT 1");
    
		$stmt->bind_param("s", $username);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;
		$stmt->close();
		
		if ($num > 0){
			return true;
			} else {
			return false;
		}



}
	
function resultBlock($errors){
  if(count($errors) > 0)
  {

    
    echo "<div id='error' class='alert alert-danger fade in'><a href='register.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <ul>";
    foreach($errors as $error)
    {
      echo "<li>".$error."</li>";
    }
    echo "</ul>";
    echo "</div>";
  }
}
function emailExistente($email,$connection)
{
    $stmt = $connection->prepare("SELECT *   FROM user WHERE email = ? LIMIT 1");
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;
		$stmt->close();
		
		if ($num > 0){
			return true;
			} else {
			return false;
		}



}
if (isset($_POST)& !empty($_POST)) {
  
echo "</br>";
$username=$_POST['username'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$passwordAgain=md5($_POST['passwordagain']);
if ($password==$passwordAgain) {

  if(usuarioExiste($username,$connection))
		{
			$errors[] = "El nombre de usuario $username ya existe";
		}
else{
  if(emailExistente($email,$connection))
		{
			$errors[] = "El email de usuario $email ya existe";
		}
    else{
      $sql = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";
      $result = mysqli_query($connection, $sql);
      if($result){
        echo "User registration succesfully";
        
      }else{
          echo "User registration failed"; 
      }
      
    }
      
     
    }

}
else
{
  echo "Contraseña no coincide";
}

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
      <label for="inputPasswordAgain" class="sr-only">Password Again</label>

      <input type="password" name="passwordagain" id="inputPasswordAgain" class="form-control"
        placeholder="Password Again" required>
      <br>
      <?php 
				echo resultBlock($errors);
				?>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
      <a class="btn btn-lg btn-primary btn-block" href="login.php">Login</a>
    </form>
  </div>
</body>

</html>