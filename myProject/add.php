<?php 
    include('DBconnect.php');
	
	
	$DT=$_POST['Date_time'];
	$doc=$_POST['doc_ID'];
	$nurse=$_POST['nurse_ID'];
	
	$sql="INSERT INTO appointment SET Date_time='$DT',doc_ID='$doc',nurse_ID='$nurse'";
	
	$result=mysqli_query($connect,$sql) or die(mysqli_error());
	if($result==true){
		header('location:appointment.php');
	}
	else
		echo "ERROR";
?>