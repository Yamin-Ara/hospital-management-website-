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
                 <div class="col-md-6">
				        <a href="patient.php" class="btn btn-primary">patients</a>
                        <a href="doctor.php" class="btn btn-danger">doctors</a>
                        <a href="appointment.php" class="btn btn-success">appointments</a>
				 </div>
				
                <!-- /. ROW  -->
                
				 
					
				<form method="post" action="searchdt.php">
				    <input type="text" name="q" placeholder="Search Doctor...">
				    <select name="column">
				        <option value="">Select Filter</option>
						
						<option value="doc_ID">Doctor ID</option>
						
						<option value="Doc_Name">Doctor Name</option>
						
				    </select>

					<input type="submit" name="submit" value="Find">
				</form>	
				<div class="row">
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
										<th>Make call</th>
                                        
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
							<td>
							<a href="tel:$row['Mobile_num']">Call</a>
						
							</td>
							</tr>
							<?php }}?>
                            </tbody>
                                
                            </table>
                        </div>
                    </div>
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