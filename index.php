<html>
<head>
	<title>Student  Management System</title>
</head>
<body>
	
<h3 align="right" style="margin-right: 20px;"><a href="login.php">Admin Login</a></h3>
<h1 align="center">Welcome to Student  Management System</h1>

<form method="post" action="index.php" >
<table style="line-height: 30px; width: 50%;" align="center" border="3">
	<tr>
		<td colspan="2" align="center">Student Information</td>
	</tr>
	<tr>
		<td align="left">Choose Standard</td>
		<td>
			<select name="std">
				<option value="1">1st</option>
				<option value="2">2nd</option>
				<option value="3">3rd</option>
				<option value="4">4th</option>
				<option value="5">5th</option>
				<option value="6">6th</option>
				<option value="7">7th</option>
				<option value="8">8th</option>
				<option value="9">9th</option>
				<option value="10">10th</option>
				<option value="11">11th</option>
				<option value="12">12th</option>
			</select>
		</td>
	</tr>
	<tr>
		<td align="left">Enter Rollno</td>
		<td><input type="text" name="Rollno" required></td>
	</tr>
	<tr>
		<td colspan="2" align="center"><input type="submit" name="submit" value="Show Info"></td>
	</tr>

</table>
</form>

<table style="width:80%; margin-top:50px;" align="center" border="1px">
    <tr style="background-color:black; color:white">
        <th>Roll no</th>
        <th>Name</th>
        <th>City</th>
        <th>Parent's contact</th>
        <th>Standard</th>
        <th>Photo</th>
    </tr>

<?php
if(isset($_POST['submit'])) {
    require 'dbcon.php';
    $std = $_POST['std'];
    $rollno = $_POST['Rollno'];

    $qry = "SELECT * FROM `student` WHERE `Standard` = $std AND `Rrollno` = $rollno ";
    $run = mysqli_query($con, $qry);

    if(mysqli_num_rows($run)<1) {
        ?>

        <script>alert('No results found!');</script>
        
        <?php
    } else {
        $data = mysqli_fetch_assoc($run);
    ?>
    
    <tr align="center">
        <td><?php echo $data['Rrollno'];?></td>
        <td><?php echo $data['name'];?></td>
        <td><?php echo $data['City'];?></td>
        <td><?php echo $data['P_cont'];?></td>
        <td><?php echo $data['Standard'];?></td>
        <td><img src="dataimg/<?php echo $data['Image']?>" width="70px"></td>
    </tr>

    <?php
    }
    
}

?>

</table>
</body>
</html>


<?php

if(isset($_POST['submit']))
{
	$Standard= $_POST['std'];
	$Rrollno= $_POST['Rollno'];

	include('dbcon.php');
	include('function.php');
	showdetails($Standard,$Rrollno);
	
}
?>
