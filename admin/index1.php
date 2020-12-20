

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Management System</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>

<h3 align="right" style="margin-right:20px"><a href="login.php">Login</a></h3>
<h1 align="center">WELCOME TO STUDENT MANAGEMENT SYSTEM</h1>    

<form action="index1.php" method="post">
    <table style = "width:40%; border-collapse:collapse; height:150px;" align = "center" border = "1" >
        <tr>
            <td colspan="2" align = "center">Student Information</td>
        </tr>
        <tr>
            <td>Choose Standard</td>
            <td>
                <select name="std" required>
                    <option value="1">1st</option>
                    <option value="2">2nd</option>
                    <option value="3">3rd</option>
                    <option value="4">4th</option>
                    <option value="5">5th</option>
                    <option value="6">6th</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Enter Rollno</td>
            <td>
                <input type = "text" name = "rollno" required>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type = "submit" name = "submit" value = "Show info"></td>
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
    $rollno = $_POST['rollno'];

    $qry = "SELECT * FROM `student` WHERE `Standard` = $std AND `Rrollno` = $rollno ";
    $run = mysqli_query($con, $qry);

    if(mysqli_num_rows($run)<1) {
        ?><script>alert('No results found!');</script><?php
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
 


