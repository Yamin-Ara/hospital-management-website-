<?php
include("DBconnect.php");

     $id=$_POST['id'];
     $DT=$_POST['Date_time'];
	 $doc=$_POST['doc_ID'];
	 $nurse=$_POST['nurse_ID'];
	 
	 $sql="UPDATE appointment SET Date_time='$DT',doc_ID='$doc',nurse_ID='$nurse' WHERE App_Num='$id'";
	 $result=mysqli_query($connect,$sql) or die(mysqli_error());
	if($result==true){
		header('location:appointment.php');
	}
	else
		echo "ERROR";
	 
?>