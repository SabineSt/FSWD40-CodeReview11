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
	<title>Offices</title>
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
			$sql = "SELECT street_name, house_no, city FROM (address inner join offices on address.addressID=offices.fk_address)";
$result = $conn->query($sql);
if($result->num_rows>0) {
    echo "<table align='center' cellpadding='15' cellspacing='30' border='0' class='combi'><tr><th>Offices </th><th>No.</th><th>City</th></tr>";
    //output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["street_name"] . "</td><td>" . $row["house_no"] . "</td><td>" . $row["city"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
 ?>
		
	</div>




</body>
</html>

<?php ob_end_flush(); ?>
