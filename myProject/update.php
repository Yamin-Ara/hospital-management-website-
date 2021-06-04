<?php
include("DBconnect.php");

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hospital Management System</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><i class="fa fa-square-o "></i>&nbsp;My Space</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">See Website</a></li>
                 
                        <li><a href="#">Report Bug</a></li>
						 <li><a href="index.php">Log out</a></li>
                    </ul>
                </div>

            </div>
        </div>
        <!-- /. NAV TOP  -->
        
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Dashboard</h2>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                
				
                <!-- /. ROW  -->
                
				
                
				    
					<div class="col-md-6">
                        <h5>Nurse Table</h5>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr style="padding:5px;">
								<th></th>
                                    <th>#ID</th>
                                    <th>Name</th>
                                    <th>Department</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
							
							<?php
							require_once("DBconnect.php");
							$sql="SELECT * FROM nurse ORDER BY nurse_ID";
							$result=mysqli_query($connect,$sql);
							if(mysqli_num_rows($result)!=0){
								while($row=mysqli_fetch_array($result)){
									
									
							?>
							
						
							<tr class="row" style="padding:5px;">
							<td class="col-md-6">
							<?php echo $row["nurse_ID"];?>
							</td>
							
							<td class="col-md-3">
							<?php echo $row["Name"];?>
							</td>
							
							<td class="col-md-3">
							<?php echo $row["Department"];?>
							</td>
							
							
							</tr>
							<?php }}?>
                            </tbody>
                        </table>

                    </div>
				
                    
					
					<div class="appointmentADD">
					     <h5> Updating appointment </h5>
						 
						 <?php
						     $id=$_GET['id'];
							 
							 $sql="SELECT * FROM appointment WHERE App_Num=".$id;
							 $result=mysqli_query($connect,$sql);
							 if($result==true){
								 $row=mysqli_fetch_assoc($result);
								 
	                             $DT=$row['Date_time'];
	                             $doc=$row['doc_ID'];
	                             $nurse=$row['nurse_ID'];
							 }
						 ?>
						 
						 <form method="post" action="updateaction.php">
						 <table>
						    
							   
								<?php
				 				echo '#:';
								echo $id;
								?>
							
							<tr>
							    <td> Date & Time </td>
								<td><input type="text" name="Date_time" value="<?php echo $DT;?>" /></td>
							</tr>
							<tr>
							    <td> Doctor requested ID </td>
								<td><input type="text" name="doc_ID" value="<?php echo $doc;?>" /></td>
							</tr>
							
							<tr>
							    <td> Nurse in charge </td>
								<td><input type="text" name="nurse_ID" value="<?php echo $nurse;?>"/></td>
							</tr>
							<tr>
							    <td> &nbsp; <input type="hidden" name="id" value="<?php echo $id;?>"</td>
								<td><input type="submit" name="submit" value="Update" /></td>
							</tr>	
						</table>
						</form>
					</div>		
						 
					
					
					
					
					
					
					
					<div class="col-md-6">
                        <h5>Appointment Table</h5>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr style="padding:5px;">
								<th></th>
                                    <th>#</th>
                                    <th>Date & Time</th>
                                    <th>Doctor requested ID</th>
                                    <th>Nurse in charge</th>
									<th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
							
							<?php
							require_once("DBconnect.php");
							$sql="SELECT * FROM appointment ORDER BY Date_time";
							$result=mysqli_query($connect,$sql);
							if(mysqli_num_rows($result)!=0){
								while($row=mysqli_fetch_array($result)){
									
									
							?>
							
						
							<tr class="row" style="padding:5px;">
							<td class="col-md-3">
							<?php echo $row["App_Num"];?>
							</td>
							
							<td class="col-md-3">
							<?php echo $row["Date_time"];?>
							</td>
							
							<td class="col-md-3">
							<?php echo $row["doc_ID"];?>
							</td>
							
							<td class="col-md-3">
							<?php echo $row["nurse_ID"];?>
							</td>
							<td>
							     <a href="#"><button type="button">UPDATE</button></a>
								 <a href="#"><button type="button">DELETE</button></a>
							</td>
							</tr>
							<?php }}?>
                            </tbody>
                        </table>

                    </div>
				
                    <div class="col-md-6">
                        <h5>Doctors Table</h5>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
									<th></th>
                                        <th>#ID</th>
                                        <th>Name</th>
										<th>Department</th>
                                        <th>Visiting_hour</th>
										<th>Phone</th>
                                        
                                    </tr>
                                </thead>
								 <tbody>
							
							<?php
							require_once("DBconnect.php");
							$sql="SELECT * FROM doctor ORDER BY Doc_Name";
							$result=mysqli_query($connect,$sql);
							if(mysqli_num_rows($result)!=0){
								while($row=mysqli_fetch_array($result)){
									
									
							?>
							
						
							<tr class="row" style="padding:5px;">
							
							<td class="col-md-3">
							<?php echo $row["doc_ID"];?>
							</td>
							
							<td class="col-md-6">
							<?php echo $row["Doc_Name"];?>
							</td>
							
							
							
							<td class="col-md-3">
							<?php echo $row["Department"];?>
							</td>
							
							<td class="col-md-3">
							<?php echo $row["Visiting_hour"];?>
							</td>
							<td class="col-md-3">
							<?php echo $row["Mobile_num"];?>
							</td>
							</tr>
							<?php }}?>
                            </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />


                
                

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>
</html>
