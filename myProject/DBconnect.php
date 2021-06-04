<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";

//creating connection
$connect = new mysqli($servername, $username, $password);

//check connection
if($connect->connect_error){
	die("connection failure: " . $connect->connect_error);
}
else {
	mysqli_select_db($connect, $dbname);
	//echo "Connection Successful";
}

?>