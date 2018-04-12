<?php
	include('conn.php');
	
	$income_source=$_POST['income_source'];
	$payment_freq=$_POST['payment_freq'];
        $amount=$_POST['amount'];
        $employer=$_POST['employer'];
	
	
	mysqli_query($conn,"insert into source (income_source, payment_freq, amount, employer) values ('$income_source', '$payment_freq', '$amount', '$employer')");
	header('location:index.php');

?>

