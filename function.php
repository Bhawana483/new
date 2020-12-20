<?php

	function showdetails($Standard,$Rrollno)
	{
		include('dbcon.php');

		$qry="SELECT * FROM `student` WHERE 'rollno'='$Standard' AND 'standard'='$Rrollno'";
		$run=mysqli_query($con,$qry);

		if( mysqli_num_rows($run)>0)
		{
			$data=mysqli_fetch_assoc($run);
			?>
				<table border="1" style="80%;" align="center">
					<tr>
						<th colspan="3">Student Details</th>
					</tr>
					<tr>
						<td rowspan="5"><img src="dataimg"><?php echo $data['Image'];?><style="max-width:150px; max-height: 120px;"></td>
						<th>Roll no</th>
						<td><?php echo $data['Rrollno']; ?></td>
					</tr>
					<tr>
						
						<th>Name</th>
						<td><?php echo $data['name']; ?></td>
					</tr>
					<tr>
						
						<th>Standard</th>
						<td><?php echo $data['Standard']; ?></td>
					</tr>
					<tr>
						
						<th>Parents Contact No</th>
						<td><?php echo $data['P_cont']; ?></td>
					</tr>
					<tr>
						
						<th>City</th>
						<td><?php echo $data['City']; ?></td>
					</tr>
				</table>
			/*<?php	 
		}
		/*else
		{
			/*<script>
					alert('No Student Found');
			</script>*/
			//echo "error";

		}
	
	
