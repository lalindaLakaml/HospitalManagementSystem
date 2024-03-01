
<?php
include 'dbcon.php';

$id = $_POST['id'];
$note= $_POST['note'];
$type = $_POST['type'];
$ward= $_POST['ward'];


$val = "i";


$sql = "UPDATE `bed` SET `Bed_Typ_ID`='$type',`Wor_ID`='$ward',`Description`='$note',`isActive`=1 WHERE `Bed_ID` = '$id'";
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

