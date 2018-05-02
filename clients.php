<?php

 include("config/config.php");
 include("config.php");
 include("dbupdates.php");
 session_start();

 if (!isset ($_SESSION ['id']) && !isset ($_SESSION ['user_group']) && !isset ($_SESSION ['firstname'])   && !isset ($_SESSION ['groupe'])) {

 header('Location:login.php');

} else

if ($_SESSION ['user_group'] != '1' && $_SESSION ['user_group'] != '3' && $_SESSION ['user_group'] != '4' &&$_SESSION ['user_group'] != '5') {

 header('Location:supervisor.php');

} 

 $id = $_SESSION ['id'];
 $fname = $_SESSION ['firstname'];
 $lname = $_SESSION ['lastname'];
 $pos = $_SESSION ['user_group'];


	$update = new dbupdates;


$sql = "SELECT *, clients.id AS clid, clients.name AS cliname, COUNT(debtors.id) AS addk, SUM(debtors.owing) AS addowe, SUM(debtors.paid) AS addpay, SUM(debtors.balance) AS sumbal FROM clients LEFT JOIN debtors ON clients.id = debtors.client GROUP BY clients.id";

 
 $result = mysqli_query($con,$sql);
 $count = mysqli_num_rows($result);

$today = date("Y-m-d");

$sql2 = "SELECT * FROM comments JOIN users ON users.id = comments.kam LEFT JOIN status ON status.id = comments.status LEFT JOIN debtors ON debtors.id = comments.debtor_id WHERE comments.id IN (SELECT MAX(comments.id) FROM comments GROUP BY debtor_id) AND contactdate = '$today'";
 
  $resultt = mysqli_query($con,$sql2);
 $countt = mysqli_num_rows($resultt);


?>

<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Fast Debt</title>
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

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />


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
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="../../index.html">FAST - DEBT MANAGERS</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count"><?php echo  $countt; ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">APPOINTMENTS</li>
                            <li class="body">
                                <ul class="menu">

<?php 

 if ($countt > 0) {

              while ($roww = mysqli_fetch_array($resultt)) { $uid = $roww['id'];?>


                                    <li>
                                        <a href="javascript:void(0);">
                                           


<?php 

$status = $roww ['status'] ;

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
				
?>
       
           
                    <div class="icon-circle <?php echo $css; ?>">

</td>
                                      
                                            </div>
                                            <div class="menu-info">
                                               
                                               <h4><?php echo $roww['name'];?></h4>

  <p>
                                                    <i class="material-icons">Last contacted on</i> <?php echo $roww['date'];?>
                                                </p>
                                               
                                            </div>
                                        </a>
                                    </li>
   <?php } }?>                  

                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Notifications -->
            
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION ['firstname']?></div>
                    <div class="email"><?php echo $_SESSION ['groupe']?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                       
                            <li><a href="logout.php""><i class="material-icons">input</i>Sign Out</a></li>
  
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                   

                    <li class="active">
                        <a href="index.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>

  <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">people</i>
                            <span>Debtors</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="pages/debtors.php">Work in progress</a>
                            </li>
                            <li>
                                <a href="pages/notworked.php">Files not worked on</a>
                            </li>
                           
                        </ul>
                    </li>



 <li>
                        <a href="pages/reports.php">
                            <i class="material-icons">folder</i>
                            <span>Reports</span>
                        </a>
                    </li>


 <li>
                        <a href="pages/settings.php">
                            <i class="material-icons">settings</i>
                            <span>Settings</span>
                        </a>
                    </li>


                  

                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                   &copy; 2015 - 2018 <a href="javascript:void(0);">Fast Debt Managers</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 2.0.
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
                <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red" class="active">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="settings">
                    <div class="demo-settings">
                        <p>GENERAL SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Report Panel Usage</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Email Redirect</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>SYSTEM SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Notifications</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Auto Updates</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>ACCOUNT SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Offline</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Location Permission</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    FAST - DEBT SUMMARY
                    <small>Summary of clients and debt books</a></small>
                </h2>
            </div>

 
          
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EXPORTABLE TABLE
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table id="example" class="table table-bordered table-striped table-hover dataTable js-exportable">
                                   <thead>
               <tr>
<th>Client id</th>
                  <th>Client name</th>
                  <th>Contract signed</th>
                  <th>Contract Expiry</th>
                  <th>Debt book value</th>
                  <th>Total collected</th>
                  <th>Debtors</th>
 		  <th>Commision rate</th>		 
                  <th>Balance</th>
                  <th>Files</th>
                 
                </tr>
                </thead>
                <tbody>
                
	<?php 

 if ($count > 0) {

              while ($row = mysqli_fetch_array($result)) { $uid = $row['clid'];?>

    <tr>
        <td><?php echo $row['clid'];?></td>
 	<td><?php echo $row['cliname'];?></td>
	<td><?php echo $row['signed'];?></td>
        <td><?php echo $row['expiry'];?></td>
 
        <td><?php echo 'K' . number_format($row['addowe'],2);?></td>
 <td><?php echo 'K' . number_format($row['addpay'],2);?></td>


<td><?php echo $row['addk'];?></td>
<td><?php echo $row['rate'];?></td>
 <td><?php echo $row['sumbal'];?></td>
 
 <td  style="text-align:center"><a href="summary.php?clid=<?=$uid?>" class="label bg-grey">Files</a></td>

  </tr>

<?php } }?>
                </tbody>
                <tfoot>
               <tr>
               <th>Client id</th>
              <th>Client name</th>
                  <th>Contract signed</th>
                  <th>Contract Expiry</th>
                  <th>Debt book value</th>
 <th>Total collected</th>
                  <th>Debtors</th>
 		  <th>Commision rate</th>
		 
                  <th>Balance</th>
                     <th>Files</th>
                
                </tr>
                </tfoot>  



                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
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
    <script src="js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="plugins/jquery-countto/jquery.countTo.js"></script>


<!-- Flot Charts Plugin Js -->
    <script src="plugins/flot-charts/jquery.flot.js"></script>
    <script src="plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="plugins/flot-charts/jquery.flot.time.js"></script>

  <!-- Sparkline Chart Plugin Js -->
    <script src="plugins/jquery-sparkline/jquery.sparkline.js"></script>

</body>

</html>
