<?php require_once 'php_action/db_connect.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP CRUD</title>

	<style type="text/css">
		.manageMember {
			width: 100%;
			margin: auto;
		}

		table {
			width: 100%;
			margin-top: 20px;
		}

	</style>

</head>
<body>

<div class="manageMember">
	<a href="create.php"><button type="button">Add Member</button></a>
	<table border="1" cellspacing="0" cellpadding="0">
		<thead>

		<tr> <td> check all  </td>
		<td> <input type="checkbox" id="checkall">   </td>
		 </tr>
			<tr>
		
				<th>Name</th>
				<th>Age</th>
				<th>Contact</th>
				<th>email</th>
				<th>gender</th>
				<th>roles</th>
				<th>Option</th>
				

				
			</tr>
		</thead>
		<tbody>
			<?php
			$sql = "SELECT * FROM members ";
			$result = $connect->query($sql);

			if($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {

				
					echo "<tr>
					
						<td>".$row['fname']." ".$row['lname']."</td>
						<td>".$row['age']."</td>
						<td>".$row['contact']."</td>
						<td>".$row['email']."</td>
						<td>".$row['gender']."</td>
						<td>".$row['roller']."</td>
						<td>
						    
							<a href='edit.php?id=".$row['id']."'><button type='button'>Edit</button></a>
							<a href='remove.php?id=".$row['id']."'><button type='button'>Remove</button></a>
						</td>
					</tr>";
				}
			} else {
				echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
			}
			?>
		</tbody>
	</table>
</div>




</script>
</body>
</html>


