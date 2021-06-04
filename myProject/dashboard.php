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
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center user-image-back">
                        <img src="assets/img/find_user.png" class="img-responsive" />
                     
                    </li>


                    <li>
                        <a href="dashboard.php"><i class="fa fa-desktop "></i>Dashboard</a>
                    </li>
                  
                    <li>
                        <a href="#"><i class="fa fa-edit "></i>Forms </a>
                    </li>


                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Dashboard</h2>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
				<div class="row">
                 <div class="col-md-6">
				        <a href="patient.php" class="btn btn-primary">patients</a>
                        <a href="doctor.php" class="btn btn-danger">doctors</a>
                        <a href="appointment.php" class="btn btn-success">appointments</a>
				 </div>
				</div>
				<hr/>
			<div class="row">
				
				<div class="col-md-3 col-sm-3 col-xs-6">
                        
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa fa-bar-chart-o fa-5x"></i>
                                <h3>	<?php
					                         $sql="select count(*) as total from patient";
                                             $result=mysqli_query($connect,$sql);
                                             $data=mysqli_fetch_assoc($result);
                                             echo $data['total'];
					                    ?> 
								</h3>
                            </div>
                            <div class="panel-footer back-footer-blue">
                                No.of Patients
                            
                            </div>
                        </div>
                </div>
				
				<div class="col-md-3 col-sm-3 col-xs-6">
                        
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa fa-bar-chart-o fa-5x"></i>
                                <h3>	<?php
					                         $sql="select count(*) as total from doctor";
                                             $result=mysqli_query($connect,$sql);
                                             $data=mysqli_fetch_assoc($result);
                                             echo $data['total'];
					                    ?> 
								</h3>
                            </div>
                            <div class="panel-footer back-footer-blue">
                                No.of Doctors
                            
                            </div>
                        </div>
                </div>
				<div class="col-md-3 col-sm-3 col-xs-6">
                        
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa fa-bar-chart-o fa-5x"></i>
                                <h3>	<?php
					                         $sql="select count(*) as total from nurse";
                                             $result=mysqli_query($connect,$sql);
                                             $data=mysqli_fetch_assoc($result);
                                             echo $data['total'];
					                    ?> 
								</h3>
                            </div>
                            <div class="panel-footer back-footer-blue">
                                No.of Nurses
                            
                            </div>
                        </div>
                </div>
				<div class="col-md-3 col-sm-3 col-xs-6">
                        
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa fa-bar-chart-o fa-5x"></i>
                                <h3>	<?php
					                         $sql="select count(*) as total from appointment";
                                             $result=mysqli_query($connect,$sql);
                                             $data=mysqli_fetch_assoc($result);
                                             echo $data['total'];
					                    ?> 
								</h3>
                            </div>
                            <div class="panel-footer back-footer-blue">
                                No.of Appointments
                            
                            </div>
                        </div>
                </div>
			</div>
			<hr/>
			
				
                <!-- /. ROW  -->
                
				<div class="row">
				
                
				    
					
					<div class="col-md-12">
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
				
                    
                </div>
                <!-- /. ROW  -->

               

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
