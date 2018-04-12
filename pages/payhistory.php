<?php
session_start();
 include("../config/config.php");
 
 if (!isset ($_SESSION ['id']) && !isset ($_SESSION ['user_group']) && !isset ($_SESSION ['firstname'])) {

 header('Location:login.php');
}


$userID = $_GET['id'];
$today = date("Y-m-d");

$sql = "SELECT * FROM payhistory JOIN users ON payhistory.kam = users.id JOIN debtors ON payhistory.debtor_id = debtors.id LEFT JOIN paytypes ON payhistory.type = paytypes.id";
 
 $result = mysqli_query($con,$sql);
 $count = mysqli_num_rows($result);

$db = "SELECT * FROM paytypes ORDER BY id ASC";

$sqll = "SELECT * FROM debtors WHERE debtors.id = $userID";
 
 $sth = mysqli_query($con,$sqll);
 $results=mysqli_fetch_array($sth);
 $name = $results['name'];

$sql2 = "SELECT * FROM comments JOIN users ON users.id = comments.kam LEFT JOIN status ON status.id = comments.status LEFT JOIN debtors ON debtors.id = comments.debtor_id WHERE comments.id IN (SELECT MAX(comments.id) FROM comments GROUP BY debtor_id) AND contactdate = '$today'";
 
  $resultt = mysqli_query($con,$sql2);
 $countt = mysqli_num_rows($resultt);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Fast - Debt</title>
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

    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../css/themes/all-themes.css" rel="stylesheet" />

 <!-- Multi Select Css -->
    <link href="../plugins/multi-select/css/multi-select.css" rel="stylesheet">

    <!-- Bootstrap Spinner Css -->
    <link href="../plugins/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet">

    <!-- Bootstrap Tagsinput Css -->
    <link href="../plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- noUISlider Css -->
    <link href="../plugins/nouislider/nouislider.min.css" rel="stylesheet" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<style type="text/css">
table tr th, table tr td{font-size: 1.2rem;}
.row{ margin:20px 20px 20px 20px;width: 100%;}
.glyphicon{font-size: 20px;}
.glyphicon-plus{float: right;}
a.glyphicon{text-decoration: none;}
a.glyphicon-trash{margin-left: 10px;}
.none{display: none;}
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
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="../../index.html">Fast - Debt Managers</a>
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
                    <img src="../../images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Chobela Kakumbi</div>
                    <div class="email">chobelak@gmail.com</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
          


<!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                   

 <li>
                        <a href="../index.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>

                    <li class="active">
                        <a href="debtors.php">
                            <i class="material-icons">people</i>
                            <span>Debtors</span>
                        </a>
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
                    <b>Version: </b> 2.0
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
                <h2>PAYMENTS</h2>
            </div>
          
           
            <!-- Bordered Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">Payment Summary for  <?php echo $results['name']; ?> <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLink" onclick="javascript:$('#addForm').slideToggle();"></a></div>
                          
 
            <div class="panel-body none formData" id="addForm">
                <h2 id="actionLabel">Add Payment</h2>
                <form role="form" action="" method="post">
 <input type="hidden" name="submitpay" value="true"/>


  <div class="form-group">
<input type="hidden" class="form-control" name="kam" id="kam" value="<?php echo $_SESSION ['id']; ?>"/>
 </div>

 <div class="form-group">
<input type="hidden" class="form-control" name="debtor_id" id="debtor_id" value="<?php echo $userID; ?>"/>
 </div>

                    <div class="form-group">

                        <label>Status</label>
                      
<select name="type" class="form-control show-tick"  id="type" >
                              <option value="-1" selected="selected">Select...</option>
                              <?php 


$type = mysqli_query($con,$db);
					
							foreach($type as $tp) { 
								
								echo "<option value=\"$tp[id]\">$tp[type]</option>" ;
							}
						 ?>
                            </select>
                    </div>




                    <div class="form-group">
                        <label>Ammount</label>
                        <input type="text" class="form-control" name="payment" id="payment"/>
                    </div>
                   
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addForm').slideUp();">Cancel</a>
                   
                    <button id="submit" name="submit" type="submit" class="btn btn-success">Add Payment</button>

<?php
/*********** post an event **********/

if (isset($_POST['submitpay'])){
    
    include('connect-mysql.php');
    
    $date = date("Y-m-d");
   
    $kam = $_POST['kam'];
    $debtor_id = $_POST['debtor_id'];
    $type = $_POST['type'];
    $payment = $_POST['payment'];
  
  

 $sqlinsert = mysqli_query ($dbcon, "INSERT INTO payhistory (kam, debtor_id, type, payment, date) VALUES ('$kam', '$debtor_id', '$type', '$payment', '$date')");

     
   header('Location: payhistory.php?id=$kam');
    

}
?>

                </form>
            </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                       
                                        <th>KAM</th>
                                        <th>PAYMENT</th>
                                        <th>BALANCE</th>
                                        <th>DATE OF PAYMENT</th>
                                       <th>TYPE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
<?php 

 if ($count > 0) {

              while ($row = mysqli_fetch_array($result)) { $uid = $row['id'];?>

    <tr>
        <td><?php echo $row['firstname'];?></td>
 	<td><?php echo 'K' . number_format($row['payment'],2);?></td>
<td>
<?php 

$balance = $row['owing'] - $row['payment'];

echo 'K' . number_format($balance,2);?></td>
	<td><?php echo $row['date'];?></td>
        <td><?php echo $row['type'];?></td>
  </tr>

<?php } }?>
                        


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Bordered Table -->
          
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

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>

    <!-- Demo Js -->
    <script src="../js/demo.js"></script>

 <!-- Bootstrap Colorpicker Js -->
    <script src="../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>

    <!-- Dropzone Plugin Js -->
    <script src="../plugins/dropzone/dropzone.js"></script>

    <!-- Input Mask Plugin Js -->
    <script src="../plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>

    <!-- Multi Select Plugin Js -->
    <script src="../plugins/multi-select/js/jquery.multi-select.js"></script>

    <!-- Jquery Spinner Plugin Js -->
    <script src="../plugins/jquery-spinner/js/jquery.spinner.js"></script>

    <!-- Bootstrap Tags Input Plugin Js -->
    <script src="../plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

    <!-- noUISlider Plugin Js -->
    <script src="../plugins/nouislider/nouislider.js"></script>
</body>

</html>
