
<?php
include 'dbcon.php';

$user= $_GET['temp'];
$pass= $_GET['temp'];
$gru= $_GET['h_beat'];

$val = "i";


//$hash = password_hash($pass, PASSWORD_DEFAULT);


//$sql = "INSERT INTO `users`(`id`,`name`, `password`, `group_id`) VALUES ('BED001','$user','$pass','$gru')";

$sql = INSERT INTO `patient_data`(`Bed_ID`, `temp`, `hart_beat`, `o_levvel`) VALUES (['BD001','$user','$pass','$gru')


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

