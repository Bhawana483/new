<?php
session_start();
if(isset($_SESSION['uid']))
{
	header('location:admin/admindash.php');
}
?>

<html>
<head>
	<title>Admin Login</title>
</head>
<body>
	<h1 align="center">Admin Login</h1>
	<form action="login.php" method="post">
		<table align="center">
			<tr>
				<td>Username</td><td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td>Password</td><td><input type="password" name="pass"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="login" value="Login"></td>
				<td colspan="2" align="center" ><a href="index.php">Back</a></td>
			</tr>
		</table>
		
	</form>

</body>
</html>


<?php


include('dbcon.php');

if (isset($_POST['login'])) 
{
	$user= $_POST['username'];
	$pass= $_POST['pass'];

	$qry="SELECT * FROM  admin WHERE username ='$user' AND password='$pass'";
	$run=mysqli_query($con,$qry) or exit($qry);
	$row = mysqli_num_rows($run);
	if ($row <1)
	 {
	 	?>
		<script>
			alert('Username or Password not match!!');
			window.open('login.php','_self');
		</script>
		<?php
	 }
	 else
	 {
	 	
	 	$data=mysqli_fetch_assoc($run);

	 	$id=$data['id'];

	 	session_start();
	 	$_SESSION['uid']=$id;
	 	header('location:admin/admindash.php');
	 	//echo "id = ".$id;
	 }
}

?>