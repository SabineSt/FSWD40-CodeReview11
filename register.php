<?php
ob_start();
session_start(); // start a new session or continues the previous
if( isset($_SESSION['user'])!="" ){
 header("Location: home.php"); // redirects to home.php
}
include_once 'dbconnect.php';
$error = false;
if ( isset($_POST['btn-registration']) ) {

 // sanitize user input to prevent sql injection
 $fname = trim($_POST['fname']);
 $fname = strip_tags($fname);
 $fname = htmlspecialchars($fname);

 $lname = trim($_POST['lname']);
 $lname = strip_tags($lname);
 $lname = htmlspecialchars($lname);

 $email = trim($_POST['email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $pass = trim($_POST['password']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);


 // basic name validation
 if (empty($fname)) {
  $error = true;
  $nameError = "Please enter your first name.";
 } else if (strlen($fname) < 3) {
  $error = true;
  $nameError = "Name must have at least 3 characters.";
 } else if (!preg_match("/^[a-zA-Z ]+$/",$fname)) {
  $error = true;
  $nameError = "Name must contain alphabets.";
 }

 // basic name validation
 if (empty($lname)) {
  $error = true;
  $nameError = "Please enter your last name.";
 } else if (strlen($lname) < 3) {
  $error = true;
  $nameError = "Name must have at least 3 characters.";
 } else if (!preg_match("/^[a-zA-Z ]+$/",$lname)) {
  $error = true;
  $nameError = "Name must contain alphabets.";
 }

 //basic email validation
 if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address.";
 } else {
  // check whether the email exist or not
  $query = "SELECT email FROM customers WHERE email='$email'";
  $result = mysqli_query($conn, $query);
  $count = mysqli_num_rows($result);
  if($count!=0){
   $error = true;
   $emailError = "Provided Email is already in use.";
  }
 }
 // password validation
 if (empty($pass)){
  $error = true;
  $passError = "Please enter password.";
 } else if(strlen($pass) < 6) {
  $error = true;
  $passError = "Password must have atleast 6 characters.";
 }

 // password hashing for security
$password = hash('sha256', $pass);


 // if there's no error, continue to signup
 if( !$error ) {
  
  $query = "INSERT INTO customers(fname, lname, email, password) VALUES('$fname','$lname','$email','$password')";
  $res = mysqli_query($conn, $query);
  
  if ($res) {
   $errTyp = "success";
   $errMSG = "Successfully registered, you may login now";
   unset($fname);
   unset($lname);
   unset($email);
   unset($pass);
  } else {
   $errTyp = "danger";
   $errMSG = "Something went wrong, try again later...";
  }
  
 }


}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles.css">
    <title>Login & Registration System</title>
    <!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
</head>
<body>
  <h1>GREEN WHEELS</h1>
  <p>Drive with us & future starts today!</p>
   <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
           <?php
        if (isset($errMSG)) {
           ?>
           <div class="alert alert-<?php echo $errTyp ?>">
                        <?php echo $errMSG; ?>
           </div>

      <?php
        }
        ?>
    <fieldset>
    <legend>Registration</legend>
            <input type="text" name="fname" class="form-control" placeholder="Enter First Name" maxlength="50" value="<?php echo $fname ?>" />
      
               <span class="text-danger"><?php echo $nameError; ?></span>

            <input type="text" name="lname" class="form-control" placeholder="Enter Last Name" maxlength="50" value="<?php echo $lname ?>" />
      
               <span class="text-danger"><?php echo $nameError; ?></span>
            
            <input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
    
               <span class="text-danger"><?php echo $emailError; ?></span>           
        
            <input type="password" name="password" class="form-control" placeholder="Enter Your Password" maxlength="15" />
            
               <span class="text-danger"><?php echo $passError; ?></span><br><br>
         
            <button type="submit" class="btn btn-block btn-primary" name="btn-registration">Register</button>
            <hr />
          
            <a href="index.php">Login here!</a>
      </fieldset>
     </form>
     <center><img src="pix/electrocar.png" alt="green cars" width="200px">
</center>

</body>
</html>
<?php ob_end_flush(); ?>