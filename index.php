<?php

 include("config/config.php");
 include("config.php");
 include("dbupdates.php");
 include("Perf.php");
 session_start();

 if (!isset ($_SESSION ['id']) && !isset ($_SESSION ['user_group']) && !isset ($_SESSION ['firstname'])   && !isset ($_SESSION ['groupe'])) {

 header('Location:login.php');

} else

if ($_SESSION ['user_group'] != '1' && $_SESSION ['user_group'] != '3' && $_SESSION ['user_group'] != '4' &&$_SESSION ['user_group'] != '5') {

 header('Location:supervisor.php');

} 

$perf = new Perf;


?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php include ("includes/title.php") ?>
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

    <!-- Morris Chart Css-->
    <link href="plugins/morrisjs/morris.css" rel="stylesheet" />

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
   


<?php include ("includes/topbar.php")?>



    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            
         
<?php
include ("includes/userinfo.php");
include ("includes/smenu.php");
include ("includes/footer.php");
?>       
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

           <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">folder</i>
                        </div>
                        <div class="content">
                            <div class="text">CLIENTS</div>

                            <div class="number"><?php echo  $update -> newclients(); ?></div>
                          
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">DEBTORS</div>
                             <div class="number"><?php echo number_format($update -> newdebtors()); ?></div>
                            
                        </div>
                    </div>
                </div>

  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">check_box</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Collections</div>

                            <div class="number"><?php echo  number_format($update -> newcollections()); ?></div>
                            
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">work</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Balance</div>
                           <div class="number"><?php echo  number_format($update -> newvalue()); ?></div>

                           
                        </div>
                    </div>
                </div>




            </div>
            <!-- #END# Widgets -->
        
            <div class="row clearfix">
                <!-- Visitors -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body bg-pink">
                            <div class="sparkline" data-type="line" data-spot-Radius="4" data-highlight-Spot-Color="rgb(233, 30, 99)" data-highlight-Line-Color="#fff"
                                 data-min-Spot-Color="rgb(255,255,255)" data-max-Spot-Color="rgb(255,255,255)" data-spot-Color="rgb(255,255,255)"
                                 data-offset="90" data-width="100%" data-height="92px" data-line-Width="2" data-line-Color="rgba(255,255,255,0.7)"
                                 data-fill-Color="rgba(0, 188, 212, 0)">
                                COLLECTIONS MADE
                            </div>
                            <ul class="dashboard-stat-list">
                                <li>
                                    TODAY
                                    <span class="pull-right"><b>K <?php echo  number_format($perf -> todayCollect()); ?></b></span>
                                </li>
                                <li>
                                    YESTERDAY
                                    <span class="pull-right"><b>K <?php echo  number_format($perf -> yestCollect()); ?></b></span>
                                </li>
                                <li>
                                    LAST 7 DAYS
                                    <span class="pull-right"><b>K <?php echo  number_format($perf -> lwCollect()); ?></b></span>
                                </li>
 <li>
                                    MARCH
                                    <span class="pull-right"><b>K <?php echo  number_format($perf -> marchCollect()); ?></b></span>
                                </li>

 </li>
 <li>
                                    APRIL
                                    <span class="pull-right"><b>K <?php echo  number_format($perf -> aprilCollect()); ?></b></span>
                                </li>


 <li>
                                    MAY
                                    <span class="pull-right"><b>K <?php echo  number_format($perf -> mayCollect()); ?></b></span>
                                </li>

 <li>
                                    JUNE
                                    <span class="pull-right"><b>K <?php echo  number_format($perf -> juneCollect()); ?></b></span>
                                </li>

 <li>
                                    JULY
                                    <span class="pull-right"><b>K <?php echo  number_format($perf -> julyCollect()); ?></b></span>
                                </li>

 <li>
                                    AUGUST
                                    <span class="pull-right"><b>K <?php echo  number_format($perf -> augCollect()); ?></b></span>
                                </li>

 <li>
                                    SEPTEMBER
                                    <span class="pull-right"><b>K <?php echo  number_format($perf -> septCollect()); ?></b></span>
                                </li>

 <li>
                                    OCTOBER
                                    <span class="pull-right"><b>K <?php echo  number_format($perf -> octCollect()); ?></b></span>
                                </li>

 <li>
                                    NOVEMBER
                                    <span class="pull-right"><b>K <?php echo  number_format($perf -> novCollect()); ?></b></span>
                                </li>

 <li>
                                    DECEMBER
                                    <span class="pull-right"><b>K <?php echo  number_format($perf -> decCollect()); ?></b></span>
                                </li>



                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Visitors -->
                <!--  Trends -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body bg-cyan">
                            <div class="m-b--35 font-bold">BEST COLLECTORS</div>
                            <ul class="dashboard-stat-list">


<?php
  error_reporting(-1);
        ini_set('display_errors', 'On');
				include('conn.php');
			 

				$query=mysqli_query($conn,"SELECT SUM(payment) AS collected, payhistory.kam AS kamm, users.firstname AS firstname FROM `payhistory` LEFT JOIN users ON payhistory.kam = users.id GROUP BY kam");

				while($row=mysqli_fetch_array($query)) {
					
?>

                                <li>
                                    <?php echo $row['firstname'];?>
                                    <span class="pull-right">
                                        <b>K <?php echo $row['collected'];?></b>
                                    </span>
                                </li>
<?php
}

                             ?>
                              
                           
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Latest Social Trends -->
                <!-- Answered Tickets -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body bg-teal">
                            <div class="font-bold m-b--35">PROMISE TO PAY</div>
                            <ul class="dashboard-stat-list">
                                <li>
                                    TODAY
                                     <span class="pull-right"><b><?php echo  number_format($perf -> todayptp()); ?></b></span>
                                </li>
                                <li>
                                    YESTERDAY
                                   <span class="pull-right"><b><?php echo  number_format($perf -> yestptp()); ?></b></span>
                                </li>
                                <li>
                                    LAST WEEK
                                   <span class="pull-right"><b><?php echo  number_format($perf -> yestptp()); ?></b></span>
                                </li>
                                <li>
                                    LAST MONTH
                                   <span class="pull-right"><b><?php echo  number_format($perf -> yestptp()); ?></b></span>
                                <li>
                                    LAST YEAR
                                    <span class="pull-right"><b><?php echo  number_format($perf -> yestptp()); ?></b></span>
                                </li>
                                <li>
                                    ALL
                                   <span class="pull-right"><b><?php echo  number_format($perf -> yestptp()); ?></b></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Answered Tickets -->
            </div>

         
            </div>
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

    <!-- Jquery CountTo Plugin Js -->
    <script src="plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="plugins/flot-charts/jquery.flot.js"></script>
    <script src="plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>



</body>

</html>
