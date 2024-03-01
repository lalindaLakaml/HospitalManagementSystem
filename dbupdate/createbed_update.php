
<?php
include 'dbcon.php';

$id = $_POST['id'];
$note= $_POST['note'];
$type = $_POST['type'];
$ward= $_POST['ward'];


$val = "i";


$sql = "INSERT INTO `bed`(`Bed_ID`, `Bed_Typ_ID`, `Wor_ID`, `Description`, `isOccupied`, `isActive`) VALUES ('$id','$type','$ward','$note',0,1)";
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

