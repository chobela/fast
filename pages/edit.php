<?php
	include('conn.php');
	
	$id=$_GET['id'];
	
	$company=$_POST['company'];
        $comment=$_POST['comment'];
	$person=$_POST['person'];
        $position=$_POST['position'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $rag=$_POST['rag'];
        $status_remarks= mysqli_escape_string($conn, $_POST['status_remarks']);
	
	mysqli_query($conn,"update development set company='$company', comment='$comment', person='$person', position='$position', phone='$phone', email='$email', rag='$rag', status_remarks='$status_remarks' where id='$id'");
	header('location:development.php');

?>
