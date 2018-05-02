<?php

 include("../config/config.php");
include("../config.php");
 include("../dbupdates.php");
session_start();

 if (!isset ($_SESSION ['id']) && !isset ($_SESSION ['user_group']) && !isset ($_SESSION ['firstname'])) {

 header('Location:../login.php');

}


 $id = $_SESSION ['id'];
 $fname = $_SESSION ['firstname'];
 $lname = $_SESSION ['lastname'];
 $pos = $_SESSION ['user_group'];

 

$sql = "(SELECT *, debtors.id AS idd, debtors.name AS debtorname, clients.name AS clientname  FROM debtors Left JOIN users on users.id = debtors.kam LEFT JOIN clients ON clients.id = debtors.client LEFT JOIN comments ON comments.debtor_id = debtors.id LEFT JOIN status ON status.id = comments.status LEFT JOIN payhistory ON debtors.id = payhistory.debtor_id WHERE status IS NULL AND payment IS NULL)";
 
 $result = mysqli_query($con,$sql);
 $count = mysqli_num_rows($result);

?>
﻿<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
     <?php include("includes/title.php")?>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../css/themes/all-themes.css" rel="stylesheet" />
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
   


<?php include ("../includes/topbar.php") ?>
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
          <?php
include ("../includes/userinfo.php");
include ("../includes/smenu.php");
include ("../includes/footer.php");
?>       
           





        
        </aside>
        <!-- #END# Left Sidebar -->
        
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    DEBTOR SUMMARY
                    <small>Taken from <a href="https://datatables.net/" target="_blank">Summary of debtors</a></small>
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DEBTOR SUMMARY
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
    <script src="plugins/jquery-sparkline/jquery.sparkline.js"></script>href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Debtor</th>
                                            <th>Client</th>
                                            <th>Owing</th>
                                            <th>Status</th>
                                            <th>Contact Details</th>
                                            <th>Comments</th>
                                            <th>Payments</th>
<th>PTP</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Debtor</th>
                                            <th>Client</th>
                                            <th>Owing</th>
                                            <th>Status</th>
                                            <th>Contact Details</th>
                                            <th>Comments</th>
                                            <th>Payments</th>
<th>PTP</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

<?php 

 if ($count > 0) {

              while ($row = mysqli_fetch_array($result)) { $uid = $row['idd'];?>

    <tr>
        <td><?php echo $row['debtorname'];?></td>
 	<td><?php echo $row['clientname'];?></td>
	<td><?php echo  'K' . number_format($row['owing'],2);?></td>
     

     <?php 

$status = $row ['status'] ;

                               
                       if ($status == 1) {
						$css = "bg-brown" ;
				}
				elseif($status == 2) {
						$css = "label-warning" ;
				}
                                elseif($status == 3) {
						$css = "label-primary" ;
				}
                                elseif($status == 4) {
						$css = "bg-black" ;
				}
                                 elseif($status == 5) {
						$css = "bg-purple" ;
				}
                                 elseif($status == 6) {
						$css = "label-success" ;
				}
			         elseif($status == NULL) {
						$css = "label-danger" ;
				}
				
?>

           <td style="vertical-align:middle" data-order="<?php echo $status; ?>">


                  
                    <a class="label <?php echo $css; ?>"><?php

 							 if ($status == NULL) {
									echo 'Not worked on';
										}
									 else {echo $row['type'];}
 										?></a>
				

</td>






 <td  style="text-align:center"><a href="contacts.php?id=<?=$uid?>" class="label bg-grey">Contact Details</a></td>
 <td  style="text-align:center"><a href="comments.php?id=<?=$uid?>" class="label bg-grey">Comments</a></td>
 <td  style="text-align:center"><a href="payhistory.php?id=<?=$uid?>" class="label bg-grey">Payments</a></td>
 <td  style="text-align:center"><a href="ptp.php?id=<?=$uid?>" class="label bg-grey">PTP</a></td>


  </tr>

<?php } }?>
                                     
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->

        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="../plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/vfs_fonts.table table-bordered table-striped table-hover dataTable js-exportablejs"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
    <script src="../js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="../js/demo.js"></script>
</body>

</html>
