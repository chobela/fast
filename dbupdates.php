<?php

 class dbupdates{

 
	function newclients() {

		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		
		 $new_users = "SELECT COUNT(*) FROM clients";
 			$results = mysqli_query($db,$new_users);
 			$counts = mysqli_num_rows($results);	

		 while ($row = mysqli_fetch_array($results)) {

                return  $row ['COUNT(*)'];

     }
	}	

       function newdebtors() {

		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		
		 $new_users = "SELECT COUNT(*) FROM debtors";
 			$results = mysqli_query($db,$new_users);
 			$counts = mysqli_num_rows($results);	

		 while ($row = mysqli_fetch_array($results)) {

                return  $row ['COUNT(*)'];

     }
	}	

function newvalue() {

		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		
		 $new_users = "SELECT SUM(owing) AS owe, SUM(paid) AS paid FROM debtors";
 			$results = mysqli_query($db,$new_users);
 			$counts = mysqli_num_rows($results);	

		 while ($row = mysqli_fetch_array($results)) {

                $balance = $row ['owe'] - $row ['paid'];

                return  $balance;

     }
	}	


function newvalues() {

		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		
		 $new_users = "SELECT SUM(owing) AS owe, SUM(paid) AS paid FROM debtors";
 			$results = mysqli_query($db,$new_users);
 			$counts = mysqli_num_rows($results);	

		 while ($row = mysqli_fetch_array($results)) {

                return  $row ['owe'];

     }
	}	

	function newcollections() {

		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		
		 $new_users = "SELECT SUM(payment) AS bal FROM payhistory";
 			$results = mysqli_query($db,$new_users);
 			$counts = mysqli_num_rows($results);	

		 while ($row = mysqli_fetch_array($results)) {

                return  $row ['bal'];

     }
	}	

	
}


?>
