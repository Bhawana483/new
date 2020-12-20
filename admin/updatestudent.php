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
?>

<table align="center">
<form action="updatestudent.php" method="post">
	<tr>
		<td><input type="number" name="standard" placeholder="Enter standard" required="required"/></td>
	</tr>
	<tr>
		<td><input type="text" name="stuname" placeholder="Enter Student Name" required="required"/></td>
	</tr>

	<td colspan="2"><input type="submit" name="submit" value="search"></td>
	


</form>
</table>

<table align="center" width="80%" border="1" style="margin-top: 10px;">
	<tr >
		<th>No</th>
		<th>Image</th>
		<th>Name</th>
		<th>Roll No</th>
		<th>Edit</th>
	</tr>
	<?php
	if(isset($_POST['submit']))
	{
		include('../dbcon.php');

		$standard= $_POST['standard'];
		$name= $_POST['stuname'];


		$qry="SELECT * FROM `student` WHERE Standard ='$standard' AND name LIKE '%$name%'";
		$run=mysqli_query($con,$qry) ;

		if( mysqli_num_rows($run)<1)
		{
			echo "<tr><td colspan='5'>No Records Found </td></tr>";
		}
		else
		{
			$count=0;
			while($data=mysqli_fetch_assoc($run))
			{
				$count++;
				?>
						<tr align="center">
							<td><?php echo $count; ?></td>
							<td><img src="../dataimg/<?php echo $data ['Image'];  ?>" style="max-width: 100px;"/></td>
							<td><?php echo $data['name']; ?></td>
							<td><?php echo $data['Rrollno']; ?></td>
							<td><a href="updateform.php?sid=<?php echo $data['id']; ?>">Edit</a></td>
						</tr>


				<?php
			}
		}
		
	}
	?>
</table>