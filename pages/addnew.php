<?php
	include('conn.php');
	
	$company=$_POST['company'];
        $date= date('Y-m-d');
        $comment=$_POST['comment'];
	$person=$_POST['person'];
        $position=$_POST['position'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $rag=$_POST['rag'];
        $status_remarks=$_POST['status_remarks'];
	
	
	mysqli_query($conn,"insert into development (company, i_date, comment, person, position, phone, email, rag, status_remarks) values ('$company', '$date', '$comment', '$person', '$position', '$phone', '$email', '$rag', '$status_remarks')");
	header('location:development.php');

?>

