<?php  
session_start();  
if(!isset($_SESSION["user"]))
{
 header("location:index.php");
}
?> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SUNRISE HOTEL</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">MAIN MENU </a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
			
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="settings.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
					
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a class="active-menu" href="settings.php"><i class="fa fa-dashboard"></i>Room Status</a>
                    </li>
					<li>
                        <a  href="room.php"><i class="fa fa-plus-circle"></i>Add Room</a>
                    </li>
                    <li>
                        <a   href="roomdel.php"><i class="fa fa-pencil-square-o"></i> Delete Room</a>
                    </li>
					

                    
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
       
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                           ADMINISTRATOR<small> accounts </small>
                        </h1>
                    </div>
                </div> 
                 
                                 
            <?php
						include ('db.php');
						$sql = "SELECT * FROM `room`";
						$re = mysqli_query($con,$sql)
				?>
                
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
											<th>Type</th>
                                            <th>Bedding</th>
                                            <th>Place</th>
											<th>CusID</th>
                                            <th>Info</th>
                                            <th>Prize</th>
                                            
											<th>Update</th>
											<th>Remove</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
									<?php
										while($row = mysqli_fetch_array($re))
										{
										
											$id = $row['id'];
											$type = $row['type'];
											$bedding = $row['bedding'];
											$place = $row['place'];
											$cusid = $row['cusid'];
											$info = $row['info'];
											$price = $row['price'];
											if($id % 2 ==0 )
											{
												echo"<tr class='gradeC'>
													<td>".$id."</td>
													<td>".$type."</td>
													<td>".$bedding."</td>
													<td>".$place."</td>
													<td>".$cusid."</td>
													<td>".$info."</td>
													<td>".$price."</td>

													<td><button class='btn btn-primary btn' data-toggle='modal' data-target='#myModal'>
															 Update 
													</button></td>
													<td><a href=usersettingdel.php?eid=".$id ." <button class='btn btn-danger'> <i class='fa fa-edit' ></i> Delete</button></td>
												</tr>";
											}
											else
											{
												echo"<tr class='gradeU'>
													<td>".$id."</td>
													<td>".$type."</td>
													<td>".$bedding."</td>
													<td>".$place."</td>
													<td>".$cusid."</td>
													<td>".$info."</td>
													<td>".$price."</td>
													
													<td><button class='btn btn-primary btn' data-toggle='modal' data-target='#myModal'>
                              Update 
                            </button></td>
													<td><a href=usersettingdel.php?eid=".$id ." <button class='btn btn-danger'> <i class='fa fa-edit' ></i> Delete</button></td>
												</tr>";
											
											}
										
										}
										
									?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
						
					<div class="panel-body">
                            
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Change Room Settings</h4>
                                        </div>
										<form method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                            <label>Change Room Type</label>
                                            <input name="roomtype" value="<?php echo $type; ?>" class="form-control" placeholder="Enter Room Type">
											</div>
										</div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                            <label>Change Room Bedding</label>
                                            <input name="bedding" value="<?php echo $bedding; ?>" class="form-control" placeholder="Enter Room Bedding">
											</div>
										</div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                            <label>Change Room Place</label>
                                            <input name="place" value="<?php echo $place; ?>" class="form-control" placeholder="Enter Room Place">
											</div>
										</div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                            <label>Change Room CusID</label>
                                            <input name="cusid" value="<?php echo $cusid; ?>" class="form-control" placeholder="Enter Room Cusid">
											</div>
										</div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                            <label>Change Room Info</label>
                                            <input name="info" value="<?php echo $info; ?>" class="form-control" placeholder="Enter Room Info">
											</div>
										</div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                            <label>Change Room Prize</label>
                                            <input name="price" value="<?php echo $place; ?>" class="form-control" placeholder="Enter Room Price">
											</div>
										</div>
										
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											
                                           <input type="submit" name="up" value="Update" class="btn btn-primary">
										  </form>
										   
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
               
                <!-- /. ROW  -->
                <?php 
				if(isset($_POST['up']))
				{
					$type = $_POST['type'];
					$bedding = $_POST['bedding'];
					$place = $_POST['place'];
					$cusid = $_POST['cusid'];
					$info = $_POST['info'];
					$price = $_POST['price'];
					
					$upsql = "UPDATE `room` SET `type`='$type',`bedding`='$bedding',`place`='$place',`cusid`='$cusid',`info`='$info',`price`='$price' WHERE id = '$id'";
					if(mysqli_query($con,$upsql))
					{
					echo' <script language="javascript" type="text/javascript"> alert("User name and password update") </script>';
					
				
					}
				
				header("Location: roomedit.php");
				
				}
				ob_end_flush();
				
				
				
				
				?>
                                
                  
            
			 <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
