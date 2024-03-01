
<?php
include 'dbcon.php';

$id= $_POST['id'];
$name= $_POST['name'];
$dis= $_POST['dis'];

$val = "i";


//$hash = password_hash($pass, PASSWORD_DEFAULT);


$sql = "INSERT INTO `city`(`Cit_ID`, `Dis_ID`, `Description`, `Memo`, `isActiva`) VALUES ('$id','$dis','$name','',1)";
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

