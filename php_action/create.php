
<?php 
include ('db_connect.php');
if($_POST) {
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$age = $_POST['age'];

	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$contact = $_POST['contact'];
	$check=implode(',',$_POST['ch']);
	
	$sql = "SELECT * FROM members WHERE email='$email'";
	
	$result = $connect->query($sql);
	if($result->num_rows > 0)  {
	$msg="Sorry... email already taken"; 	

echo "<script type='text/javascript'>alert('$msg');
window.location.href='../index.php';
</script>";          
  	}


	  else{
$sql = "INSERT INTO `members` (`fname`, `lname`, `contact`, `age`,`email`,`gender`,`roller`) VALUES ('$fname', '$lname', '$contact', '$age','$email','$gender','$check')";
		if($connect->query($sql) === TRUE) {
		echo "<p>New Record Successfully Created</p>";
		echo "<a href='../create.php'><button type='button'>Back</button></a>";
		echo "<a href='../index.php'><button type='button'>Home</button></a>";
		
	} else {
		echo "Error " . $sql . '  ' . $connect->connect_error;
	}

	$connect->close();
}	
}
?>