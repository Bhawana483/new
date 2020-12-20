<?php

include('../dbcon.php');
		$rollno= $_POST['rollno'];
		$name= $_POST['name'];
		$city= $_POST['city'];
		$pcon= $_POST['pcon'];
		$std= $_POST['std'];
		$id= $_POST['sid'];
		$imagename= $_FILES['simg']['name'];
		$tempname = $_FILES['simg']['tmp_name'];

		move_uploaded_file($tempname, "../dataimg/$imagename");

		$qry= "UPDATE student SET Rrollno = '$rollno', name = '$name', City = '$city', P_cont = '$pcon', Standard = '$std',Image='$imagename' WHERE id = '$id'"; 
		$run=mysqli_query($con,$qry);
		if ($run == true)
	 	{
	 		?>
			<script>
				alert('Data Updated Successfully.');
				window.open('updateform.php?sid=<?php echo $id;?>','_self');
			</script>
				<?php
	 	}
	 	else
	 	{
	 		echo("error:".mysqli_error($con));
	 	}

?>