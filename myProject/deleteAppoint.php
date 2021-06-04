<form action='' method='POST'>
<?php
require_once('DBconnect.php');

$id=$_GET['id'];

$sql  = "DELETE FROM appointment WHERE App_Num=".$id;

$result=mysqli_query($connect,$sql) or die(mysqli_error());
	if($result==true){
		header('location:appointment.php');
	}
	else
		echo "ERROR";
	 



?>
</form>