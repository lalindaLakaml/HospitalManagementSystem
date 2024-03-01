
<?php
include 'dbcon.php';

$temp  = $_GET['temp'];
$hbeat = $_GET['h_beat'];
$b_id  = $_GET['b_id'];

$val = "i";


//$hash = password_hash($pass, PASSWORD_DEFAULT);


// $sql = "INSERT INTO `users`(`id`,`name`, `password`, `group_id`) VALUES ('$user','$user','$pass','$gru')";

$sql = "INSERT INTO `patient_data`( `Bed_ID`, `temp`, `hart_beat`, `o_levvel`) VALUES ('$b_id','$temp','$hbeat','$temp')";


if ($conn->query($sql) === TRUE) {
	$val  ="g";
} else {
	$val ="f";
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();	
header('Location: ..\index.php?s='.$val.'');
exit;

?>

