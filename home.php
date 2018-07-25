<?php
ob_start();
session_start();
require_once 'dbconnect.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['user']) ) {
 header("Location: index.php");
 exit;
}
// select logged-in users detail
$res=mysqli_query($conn, "SELECT * FROM customers WHERE customerID=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="styles.css">
	<title>Welcome - <?php echo $userRow['email']; ?></title>
  <style type="text/css">
        .combi {
          color: white;
        }   
  </style>

</head>
<body>
	 <nav>
  <a href="office_list.php">Offices</a>
    <a href="cars_list.php">Cars</a>
  
   <?php 
      if ($_SESSION['user'] == "1" ) {
      echo "<a class='form-inline' href='admin_report.php'>Admin</a>";
      } 
      ?> 
 

    <h3>Hello <?php echo $userRow['lname'] . "!"; ?></h3>
      <br><br>

  </div>
</nav>
 <div>
  <?php

        $sql= "SELECT street_name FROM address";
       $result = $conn->query($sql);
      if($result->num_rows>0) {
        echo "<select name='offices'>";
            while($row = $result->fetch_assoc()) {
          echo 		
			"<option>".$row['street_name']."</option>"
		}  echo "</select>";
} else {
    echo "0 results";
  
		}

  // <select name='type'>
    //  <option value='type'>".$row['car_type']. "
//     echo "</select>";
// } else {
//                 echo "<tr><td colspan='5'><center>No Data Available</center></td></tr>
	
 $conn->close();
	 ?>
 </div>
           <button type="submit">Go!</button> 

           <a href="logout.php?logout">Sign Out</a>
<a href="logout.php?logout">Log Out</a>

</body>
</html>

<?php ob_end_flush(); ?>

