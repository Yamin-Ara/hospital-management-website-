<?php
//connect to database
require_once('DBconnect.php');

//check validity of inputs
if(isset($_POST['name']) && isset($_POST['password'])){
	//query to check if the username n password exists in db or not
	$u=$_POST['name'];
	$p=$_POST['password'];
	$sql="SELECT * FROM nurse WHERE Name='$u' AND password='$p'";
	
	//execute the query
	$result=mysqli_query($connect,$sql);
	
	//check for empty set
	if(mysqli_num_rows($result)!=0){
		//echo " sign in successful ";
		header("Location: dashboard.php");
	}
	else{
		//echo "Something's wrong :(";
		header("Location:index.php");
	}
}
?>