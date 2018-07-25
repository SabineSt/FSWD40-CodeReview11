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
$res=mysqli_query($conn, "SELECT * FROM customers WHERE customerID"== '1');
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin Report</title>
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
$sql = "SELECT street_name, house_no FROM address";
$query = "SELECT fk_carID FROM offices";
//  $result = mysqli_query($conn, $sql);

// if(mysqli_num_rows($result) > 0)
 

 // $query = "SELECT fk_carID FROM offices";
 // $outcome = mysqli_query($conn, $query);
 // $count = mysqli_num_rows($outcome);


$result = $conn->query($sql);
if($result->num_rows>0) {
    echo "<table align='center' cellpadding='15' cellspacing='30' border='0' class='combi'><tr><th>Offices</th><th>No.</th><th>Number of Cars</th></tr>";
    //output data of each row
    // while($row=mysqli_fetch_assoc($result))

    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["street_name"] . "</td><td>" . $row["house_no"] . "</td>";
			} 
    echo "</table>";
}else {
    echo "0 results";
}

$outcome = $conn->query($query);
 $count = mysqli_num_rows($outcome);

 while($row = $outcome->fetch_assoc()){
 	echo $count;
 }
    // echo count($count -1, COUNT_RECURSIVE);

//      while($row=mysqli_fetch_assoc($result)) {
//      	 echo"<td>". $count ."</td></tr>";

//   }
//     echo "</table>";
// }else {
//     echo "0 results";
// }
// mysqli_close($conn);
$conn->close();

 ?>

<!--  rows counten mit fk Problem, fk Ansatz funktioniert nicht
 -->		
	</div>
</body>
</html>
<?php ob_end_flush(); ?>

