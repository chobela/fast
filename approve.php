<?php
	include('conn.php');
	
	if(isset($_POST['idd'])){
		foreach ($_POST['idd'] as $id):
			mysqli_query($conn,"update payhistory set approved = 'Approved' where id='$id'");
		endforeach;
		
		header('location:index.php');
	}
	else{
		?>
		<script>
			window.alert('Please check a payment to edit');
			window.location.href='index.php';
		</script>
		<?php
	}
	
?>
