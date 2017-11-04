<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title> Title </title>
	</head>
	<body>
	
	<?php 
//ALL variables just examples, must be Changed when running different database
	$servername = "localhost";
	$dbname = "imdb small";
	$password = "Suzuki14";
	$username = "gunnerganske";
	
//Creating Connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Checkgin Connection
if($conn->connect_error){
	die("Connection Failure: " . $conn->connect_error);
}
$sqlAvg = "SELECT AVG(film_count) FROM actors";
$resultAvg = $conn->query($sqlAvg);
$sqlSum = "SELECT SUM(film_count) FROM actors";
$resultSum = $conn->query($sqlSum);

//Run For/Foreach/While/If Statements here
 
//Average Function 
if($resultAvg->num_rows > 0){
	while($rowAvg=$resultAvg-> fetch_assoc()){
		echo "Average of Film_Count: " . $rowAvg["AVG(film_count)"] . "<br>";
	}
	
}

if($resultSum->num_rows > 0){
	while($rowSum=$resultSum-> fetch_assoc()){
		echo "Sum of Film_Count: " . $rowSum["SUM(film_count)"] . "<br>";
	}
	
}
//Count Function
//Name Functions


//Closing Connection to Server
$conn->close();
	?>

		
	</body>
</html>