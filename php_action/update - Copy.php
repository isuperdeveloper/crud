
<?PHP

require_once 'db_connect.php';



if($_REQUEST) {
	$id = $_REQUEST['id'];

	$fname = $_REQUEST['fname'];
	$lname = $_REQUEST['lname'];
	$age = $_REQUEST['age'];
	$contact = $_REQUEST['contact'];
	$email = $_REQUEST['email'];
	$gender = $_REQUEST['gender'];
	$c=$_REQUEST ['roller'];

 
 $sql= "UPDATE members SET fname = '$fname', lname = '$lname', age = '$age', contact = '$contact', email = '$email', gender = '$gender',roller = '$c'  WHERE id = $id";
//print_r($sql); die;
	if($connect->query($sql) === TRUE) {	
		echo "<p>Succcessfully Updated</p>";
		echo "<a href='../edit.php?id=".$id."'><button type='button'>Back</button></a>";
		echo "<a href='../index.php'><button type='button'>Home</button></a>";
	}else
	
	{

		echo "Erorr while updating record : ". $connect->error;
	} 



	$connect->close();

}

?>
