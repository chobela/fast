<?php
	include('conn.php');
	
	$id=$_GET['debtor_id'];
	
	$income_source=$_POST['income_source'];
	$payment_freq=$_POST['payment_freq'];
        $amount=$_POST['amount'];
        $employer=$_POST['employer'];
	
	mysqli_query($conn,"update source set income_source='$income_source', payment_freq='$payment_freq', amount='$amount', employer='$employer' where debtor_id='$id'");
	header('location:source.php');

?>
