
<?php
include 'dbcon.php';

$id = $_POST['id'];
$user = $_POST['user'];
$pass = $_POST['txtPassword'];
$emp = $_POST['emp'];
$gru = $_POST['gru'];

$val = "i";


//$hash = password_hash($pass, PASSWORD_DEFAULT);


$sql = "INSERT INTO `system_user`(`ID`,`Use_ID`,`Gro_ID`,`Emp_ID`,`password`,`isActive`,`pro_image`) VALUES ('$id','$user','$gru','$emp','$pass',1,'$user')";
if ($conn->query($sql) === TRUE) {
	$val  ="g";
} else {
	$val ="f";
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();	
header('Location: ..\forms\home.php?s='.$val.'');
exit;

?>

