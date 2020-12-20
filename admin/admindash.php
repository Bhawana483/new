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
?> 

	<div class="admintitle" align="center">
		<h4><a href="logout.php" style="float: right;margin-right: 30px; color: white; font-size: 20px;"> Logout</a></h4>
		
		<h1>Welcome to Admin Dashboard</h1>

	</div>
	<div class="dashboard" >
		<div class="table-responsive">
		<table style="width: 50%;" align="center"  >
			
			<tr>
				<td>1.</td><td><a href="addstudent.php">Insert Student Details</a></td>
			</tr>
			<tr>
				<td>2.</td><td><a href="updatestudent.php">update Student Details</a></td>
			</tr>
			<tr>
				<td>3.</td><td><a href="deletestudent.php">delete Student Details</a></td>
			</tr>
			

		</table>
	</div>
		
	</div>
</body>
</html>