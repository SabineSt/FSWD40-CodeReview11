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
	<title>Cars</title>
	<link rel="stylesheet" href="styles.css">
  <style type="text/css">
        .combi {
          color: white;
        }    
  </style>
</head>
<body>
  <h1>GREEN WHEELS</h1>
  <p>Drive with us & future starts today!</p>
  <div>
  <?php

        $sql= "SELECT cars.image, cars.brand, car_type.car_type FROM (cars inner join car_type on cars.fk_type = car_type.car_typeID)";
       $result = $conn->query($sql);
      if($result->num_rows>0) {

          echo "<table align='' cellpadding='50' cellspacing='50' border='0' class='combi'><tr><th></th><th>Brand</th><th>Type</th></tr>";

    // output data of each row

             while($row = $result->fetch_assoc()){
               echo "<tr><td><img src='" . $row["image"] . "' alt='' border=3 height=250 width=350></td><td>" . $row["brand"] . "</td><td>" . $row["car_type"] . "</td><td>" . $row["status"] . "</td></tr>";
              }     
            
    echo "</table>";
} else {
                echo "<tr><td colspan='5'><center>No Data Available</center></td></tr>";
            }
 $conn->close();

?>
</div>
<!--   $sql= "SELECT cars.image, cars.brand, car_type.car_type, lended.status FROM ((cars inner join car_type on cars.fk_type = car_type.car_typeID)
           inner join lended on cars.fk_lended = lended.lendedID)"; -->
</body>
</html>
<?php ob_end_flush(); ?>
