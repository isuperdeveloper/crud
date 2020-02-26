<?php 

require_once 'php_action/db_connect.php';

if($_GET['id']) {
	$id = $_GET['id'];
	

	$sql = "SELECT * FROM members WHERE id = {$id}";
	$result = $connect->query($sql);

	$data = $result->fetch_array();
	$a=$data['roller'];
	$role=explode(",",$a);

	$connect->close();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Member</title>

	<style type="text/css">
		fieldset {
			margin: auto;
			margin-top: 100px;
			width: 50%;
		}

		table tr th {
			padding-top: 20px;
		}
	</style>

</head>
<body>

<fieldset>
	<legend>Edit Member</legend>

	<form action="php_action/update.php" method="post">
		<table cellspacing="0" cellpadding="0">
			<tr>
				<th>First Name</th>
				<td><input type="text" name="fname" placeholder="First Name" value="<?php echo $data['fname'] ?>" /></td>
			</tr>		
			<tr>
				<th>Last Name</th>
				<td><input type="text" name="lname" placeholder="Last Name" value="<?php echo $data['lname'] ?>" /></td>
			</tr>
			<tr>
				<th>Age</th>
				<td><input type="text" name="age" placeholder="Age" value="<?php echo $data['age'] ?>" /></td>
			</tr>
			<tr>
				<th>Contact</th>
				<td><input type="text" name="contact" placeholder="Contact" value="<?php echo $data['contact'] ?>" /></td>
			</tr>

			<tr>
				<th>email</th>
				<td><input type="text" name="email" placeholder="email	" value="<?php echo $data['email'] ?>" /></td>
			</tr>

			
			<tr>
				<th>gender</th>
				<td><input type="radio" name="gender" value="male" <?php if($data['gender']=="male"){ echo "checked";} ?> /> male</td> 
				<td><input type="radio" name="gender"   value="female"  <?php if($data['gender']=="female"){ echo "checked";} ?>   />  female</td>
			</tr>  
	<tr>
				<th>roles</th> 

				<td><input type="checkbox" name="$role[]" value="Admin" 
				<?php if(in_array("Admin",$role)){echo "checked";}?>
				/>Admin</td>

				<td><input type="checkbox" name="$role[]" value="Subadmin" 
				<?php if(in_array("Subadmin",$role)){echo "checked";}?>
				/>subadmin</td>

				<td><input type="checkbox" name="$role[]" value="User" 
				 <?php if(in_array("User",$role)){echo "checked";}?>/>user</td>
			</tr>


			<tr>
				<input type="hidden" name="id" value="<?php echo $data['id']?>" />
				<td><button type="submit">Save Changes</button></td>
				<td><a href="index.php"><button type="button">Back</button></a></td>
			</tr>
		</table>
	</form>

</fieldset>

</body>
</html>

<?php
}
?>