<?php
session_start();

	if(isset($_SESSION['uid']))
	{
		echo "";
	}
	else
	{
		//echo "error.";
		header('location: ../login.php');
	}
?>

<?php
	include('header.php');
	include('titlehead.php');
	include('../dbcon.php');

	$sid = $_GET['uid'];
	$qry="SELECT * FROM student WHERE id='$sid'";
	$run=mysqli_query($con,$qry);

	$data=mysqli_fetch_assoc($run) ;
?>

<form method="post" action="updatedata.php" enctype="multipart/form-data">
	<table style="width: 50%;" align="center"  border="1">
		<tr>
			<td>Roll No</td><td><input type="text" name="rollno" value="<?php echo $data['Rrollno']; ?>" required></td>
		</tr>
		<tr>
			<td>Full Name</td><td><input type="text" name="name" value="<?php echo $data['name']; ?>" required></td>
		</tr>
		<tr>
			<td>City</td><td><input type="text" name="city" value="<?php echo $data['City']; ?>" required></td>
		</tr>
		<tr>
			<td>Parent Contact No</td><td><input type="text" name="pcon" value="<?php echo $data['P_cont']; ?>" required></td>
		</tr>
		<tr>
			<td>Standard</td><td><input type="number" name="std" value="<?php echo $data['Standard']; ?>" required></td>
		</tr>
		<tr>
			<td>Image</td><td><input type="file" name="simg" required></td>
		</tr>	
		<tr>
			<td colspan="2" align="center">
			<input type="hidden" name="sid" value="<?php echo $data['id']; ?>"/>
			 <input type="submit" name="submit" value="Submit"></td>
		</tr>	
	</table>
</form>
