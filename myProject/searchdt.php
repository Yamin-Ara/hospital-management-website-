<?php
require_once('DBconnect.php');

    if(isset($_POST['submit'])){
		$q=$_POST['q'];
		$column = $_POST['column'];
		if($column=="")
		     $column="Select Filter";
		
		
		$sql="SELECT * from doctor WHERE $column LIKE '$q%'";
		$result=mysqli_query($connect,$sql);
							if(mysqli_num_rows($result)!=0){
								while($data=mysqli_fetch_array($result)){
		                            echo "ID:". $data['doc_ID']."<br>";
									echo "Name:". $data['Doc_Name']."<br>";
									echo "Phone:". $data['Mobile_num']."<br>";
									
		                        }
		                    }
							else
			                     echo"Your search did not match any data";
	}                       
?>