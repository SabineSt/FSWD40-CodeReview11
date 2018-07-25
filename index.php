<?php
ob_start();
session_start();
require_once 'dbconnect.php';

// it will never let you open index(login) page if session is set
if ( isset($_SESSION['user'])!="" ) {
 header("Location: home.php");
 exit;
}

$error = false;

if( isset($_POST['btn-login']) ) {

 // prevent sql injections/ clear user invalid inputs
 $email = trim($_POST['email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $pass = trim($_POST['password']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);
 // prevent sql injections / clear user invalid inputs

 if(empty($email)){
  $error = true;
  $emailError = "Please enter your email address.";
 } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address.";
 }

 if(empty($pass)){
  $error = true;
  $passError = "Please enter your password.";
 }

 // if there's no error, continue to login
 if(!$error) {
  
  $password = hash('sha256', $pass); // password hashing

  $res=mysqli_query($conn, "SELECT customerID, fname, lname, password FROM customers WHERE email='$email'");
  $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
  $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
  
  if($count == 1 && $row['password']==$password) {
   $_SESSION['user'] = $row['customerID'];
   header("Location: office_list.php");
  } else {
   $errMSG = "Incorrect Credentials, Try again...";
  }
  
 }

}
?> 

<!DOCTYPE html>
<html>
<head>
	<title>Car Rental</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<h1>GREEN WHEELS</h1>
	<p>Drive with us & future starts today!</p>
	<form action='<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>' method="post" autocomplete="off" accept-charset="utf-8">
		         <?php
  if ( isset($errMSG) ) {
echo $errMSG; ?>
              
               <?php
  }
  ?>
		<fieldset width: 300>
			<legend>Log In</legend><br>
			<input type="email" name="email" placeholder="Your Email" class="form-control value="<?php echo $email; ?> maxlength="40"><br><br>
			<span class="text-danger"><?php echo $emailError; ?></span>
			<input type="password" name="password" class="form-control" placeholder="Your Password" maxlength="15"><br><br>
			<span class="text-danger"><?php echo $passError; ?></span>

			<button type="submit" name="btn_login">Log In</button><br><br>
			<a href="register.php">Are you registered yet?...</a>

		</fieldset>		
	</form>
	<center><img src="pix/green.jpg" alt="green cars" width="200px">
</center>
</body>
</html>
<?php ob_end_flush(); ?>