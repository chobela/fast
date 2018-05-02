<?php

 class Perf{

 
	function todayCollect() {

		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		
		 $new_users = "SELECT SUM(payment) AS today FROM payhistory WHERE date = CURDATE() AND approved = 'Approved'";
 			$results = mysqli_query($db,$new_users);
 			

		 while ($row = mysqli_fetch_array($results)) {

                return  $row ['today'];

     }
	}	

function yestCollect() {

		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		
		 $new_users = "SELECT SUM(payment) AS yesterday FROM payhistory WHERE date = DATE_SUB(CURRENT_DATE(),INTERVAL 1 DAY) AND approved = 'Approved'";
 			$results = mysqli_query($db,$new_users);
 			

		 while ($row = mysqli_fetch_array($results)) {

                return  $row ['yesterday'];
     }
	}	


function lwCollect() {

		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		
		 $new_users = "SELECT SUM(payment) AS lw FROM payhistory WHERE date < CURDATE() AND date > DATE_SUB(CURRENT_DATE(),INTERVAL 7 DAY) AND approved = 'Approved'";
 			$results = mysqli_query($db,$new_users);
 			

		 while ($row = mysqli_fetch_array($results)) {

                return  $row ['lw'];
     }
	}	


function janCollect() {

		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		
		 $new_users = "SELECT SUM(payment) AS j FROM payhistory WHERE date > '2018-01-01' AND date < '2018-01-30' AND approved = 'Approved'";
 			$results = mysqli_query($db,$new_users);
 			

		 while ($row = mysqli_fetch_array($results)) {

                return  $row ['j'];
     }
	}	


function febCollect() {

		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		
		 $new_users = "SELECT SUM(payment) AS f FROM payhistory WHERE date > '2018-02-01' AND date < '2018-02-30' AND approved = 'Approved'";
 			$results = mysqli_query($db,$new_users);
 			

		 while ($row = mysqli_fetch_array($results)) {

                return  $row ['f'];
     }
	}	


function marchCollect() {

		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		
		 $new_users = "SELECT SUM(payment) AS m FROM payhistory WHERE date > '2018-03-01' AND date < '2018-03-30' AND approved = 'Approved'";
 			$results = mysqli_query($db,$new_users);
 			

		 while ($row = mysqli_fetch_array($results)) {

                return  $row ['m'];
     }
	}	


function aprilCollect() {

		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		
		 $new_users = "SELECT SUM(payment) AS a FROM payhistory WHERE date > '2018-04-01' AND date < '2018-04-30' AND approved = 'Approved'";
 			$results = mysqli_query($db,$new_users);
 			

		 while ($row = mysqli_fetch_array($results)) {

                return  $row ['a'];
     }
	}	

function mayCollect() {

		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		
		 $new_users = "SELECT SUM(payment) AS m FROM payhistory WHERE date > '2018-05-01' AND date < '2018-05-30' AND approved = 'Approved'";
 			$results = mysqli_query($db,$new_users);
 			

		 while ($row = mysqli_fetch_array($results)) {

                return  $row ['m'];
     }
	}	


function juneCollect() {

		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		
		 $new_users = "SELECT SUM(payment) AS ju FROM payhistory WHERE date > '2018-06-01' AND date < '2018-06-30' AND approved = 'Approved'";
 			$results = mysqli_query($db,$new_users);
 			

		 while ($row = mysqli_fetch_array($results)) {

                return  $row ['ju'];
     }
	}	


function julyCollect() {

		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		
		 $new_users = "SELECT SUM(payment) AS jl FROM payhistory WHERE date > '2018-07-01' AND date < '2018-07-30' AND approved = 'Approved'";
 			$results = mysqli_query($db,$new_users);
 			

		 while ($row = mysqli_fetch_array($results)) {

                return  $row ['jl'];
     }
	}	


function augCollect() {

		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		
		 $new_users = "SELECT SUM(payment) AS au FROM payhistory WHERE date > '2018-08-01' AND date < '2018-08-30' AND approved = 'Approved'";
 			$results = mysqli_query($db,$new_users);
 			

		 while ($row = mysqli_fetch_array($results)) {

                return  $row ['au'];
     }
	}	


function septCollect() {

		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		
		 $new_users = "SELECT SUM(payment) AS s FROM payhistory WHERE date > '2018-09-01' AND date < '2018-09-30' AND approved = 'Approved'";
 			$results = mysqli_query($db,$new_users);
 			

		 while ($row = mysqli_fetch_array($results)) {

                return  $row ['s'];
     }
	}	


function octCollect() {

		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		
		 $new_users = "SELECT SUM(payment) AS oct FROM payhistory WHERE date > '2018-10-01' AND date < '2018-10-30' AND approved = 'Approved'";
 			$results = mysqli_query($db,$new_users);
 			

		 while ($row = mysqli_fetch_array($results)) {

                return  $row ['oct'];
     }
	}	

function novCollect() {

		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		
		 $new_users = "SELECT SUM(payment) AS n FROM payhistory WHERE date > '2018-11-01' AND date < '2018-11-30' AND approved = 'Approved'";
 			$results = mysqli_query($db,$new_users);
 			

		 while ($row = mysqli_fetch_array($results)) {

                return  $row ['n'];
     }
	}	


function decCollect() {

		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		
		 $new_users = "SELECT SUM(payment) AS d FROM payhistory WHERE date > '2018-12-01' AND date < '2018-12-30' AND approved = 'Approved'";
 			$results = mysqli_query($db,$new_users);
 			

		 while ($row = mysqli_fetch_array($results)) {

                return  $row ['d'];
     }
	}

function todayptp() {

		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		
		 $new_users = "SELECT COUNT(id) AS t FROM ptp WHERE date = CURDATE()";
 			$results = mysqli_query($db,$new_users);
 			

		 while ($row = mysqli_fetch_array($results)) {

                return  $row ['t'];
     }
	}

function yestptp() {

		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		
		 $new_users = "SELECT COUNT(id) AS ptps FROM ptp WHERE date = DATE_SUB(CURRENT_DATE(),INTERVAL 1 DAY)";
 			$results = mysqli_query($db,$new_users);
 			

		 while ($row = mysqli_fetch_array($results)) {

                return  $row ['ptps'];
     }
	}	


function lwptp() {

		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		
		 $new_users = "SELECT COUNT(id) AS ptps FROM ptp WHERE date < CURDATE() AND date > DATE_SUB(CURRENT_DATE(),INTERVAL 7 DAY) ";
 			$results = mysqli_query($db,$new_users);
 			

		 while ($row = mysqli_fetch_array($results)) {

                return  $row ['ptps'];
     }
	}	


function janptp() {

		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		
		 $new_users = "SELECT COUNT(id) AS ptps FROM ptp WHERE date > '2018-01-01' AND date < '2018-01-30'";
 			$results = mysqli_query($db,$new_users);
 			

		 while ($row = mysqli_fetch_array($results)) {

                return  $row ['ptps'];
     }
	}	



		

}


?>
