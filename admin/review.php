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
	$dbname = "myDB";
	$password = "password";
	$username = "username";
	
//Creating Connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Checkgin Connection
if($conn->connect_error){
	die("Connection Failure: " . $conn->connect_error);
}
$sql = "Insert SQL Query Here";
$result = $conn->query($sql);

//Run For/Foreach/While/If Statements here




//Closing Connection to Server
$conn->close();
	?>

		
	</body>
</html>