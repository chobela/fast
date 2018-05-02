<?php
include("config/config.php");
 include("config.php");
 include("dbupdates.php");
 session_start();


  if (!isset ($_SESSION ['id']) && !isset ($_SESSION ['user_group']) && !isset ($_SESSION ['firstname'])) {

 header('Location:login.php');
}

$myid = $_SESSION ['id'];

 
?>
﻿<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php include("includes/title.php")?>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

 <!-- Wait Me Css -->
    <link href="plugins/waitme/waitMe.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />





<style>
		input[type="checkbox"] {
		transform:scale(2, 2);
    }
	</style>
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
   

<?php include ("includes/topbar.php") ?>


    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
           
<?php
include ("includes/userinfo.php");
include ("includes/ssmenu.php");
include ("includes/footer.php");
?>       
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    PAYMENT APPROVAL
                    <small>Payments forwarded to <a href="https://datatables.net/" target="_blank">Supervisor Department</a></small>
                </h2>
            </div>
          
 <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Payments For Approval
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a     <!-- Jquery CountTo Plugin Js -->
    <script src="plugins/jquery-countto/jquery.countTo.js"></script>


<!-- Flot Charts Plugin Js -->
    <script src="plugins/flot-charts/jquery.flot.js"></script>
    <script src="plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="plugins/flot-charts/jquery.flot.time.js"></script>

  <!-- Sparkline Chart Plugin Js -->
    <script src="plugins/jquery-sparkline/jquery.sparkline.js"></script><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                
<table class="table table-striped table-bordered table-hover">
			<thead>
				<th></th>

				 <th>KAM</th>
                                        <th>PAYMENT</th>
                                        <th>BALANCE</th>
                                        <th>DATE OF PAYMENT</th>
                                       <th>TYPE</th>
				
			</thead>
			<form method="POST" action="approve.php">
			<tbody>
			<?php
  error_reporting(-1);
        ini_set('display_errors', 'On');
				include('conn.php');
			 

				$query=mysqli_query($conn,"SELECT *, payhistory.id AS idd FROM payhistory JOIN users ON payhistory.kam = users.id JOIN debtors ON payhistory.debtor_id = debtors.id LEFT JOIN paytypes ON payhistory.type = paytypes.id");

				while($row=mysqli_fetch_array($query)){
					?>
					<tr>


<td align="center">  <input type="checkbox" id="<?php echo $row['idd']; ?>" value="<?php echo $row['idd']; ?>"  name="idd[]" >
                                <label for="<?php echo $row['idd']; ?>"></label>
</td>
						

 <td><?php echo $row['firstname'];?></td>
 	<td><?php echo 'K' . number_format($row['payment'],2);?></td>
<td>
<?php 

$balance = $row['owing'] - $row['payment'];

echo 'K' . number_format($balance,2);?></td>
	<td><?php echo $row['date'];?></td>
        <td><?php echo $row['type'];?></td>

                                                <?php 

$status = $row ['approved'] ;

                               
                                if ($status == 'Not Approved') {
						$css = "label-danger" ;
				}
				elseif($status == 'Approved') {
						$css = "label-success" ;
				}

?>

   <td style="vertical-align:middle" data-order="<?php echo $status; ?>">         <a class="label <?php echo $css; ?>"><?php

 							 if ($status == NULL) {
									echo 'Not worked on';
										}
									 else {echo $row['approved'];}
 										?></a><td>

	
					</tr>
					<?php
				}
			
			?>
			</tbody>
		</table>
 <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Approve</button>
			</form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->






        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/vfs_fonts.table table-bordered table-striped table-hover dataTable js-exportablejs"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
</body>

</html>
