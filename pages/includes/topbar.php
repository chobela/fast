 <!-- Top Bar -->
<?php
$update = new dbupdates;

$today = date("Y-m-d");

$sql2 = "SELECT * FROM comments JOIN users ON users.id = comments.kam LEFT JOIN status ON status.id = comments.status LEFT JOIN debtors ON debtors.id = comments.debtor_id WHERE comments.id IN (SELECT MAX(comments.id) FROM comments GROUP BY debtor_id) AND contactdate = '$today'";
 
  $resultt = mysqli_query($con,$sql2);
 $countt = mysqli_num_rows($resultt);
?>
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html">FAST DEBT MANAGERS</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                   
                  <?php
include ("notifications.php");

?>
                  
               
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
