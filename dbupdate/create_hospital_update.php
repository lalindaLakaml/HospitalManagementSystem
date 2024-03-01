
<?php
include 'dbcon.php';

$id = $_POST['id'];
$name= $_POST['name'];
$des= $_POST['des'];
$cid= $_POST['cid'];
$type= $_POST['type'];
$tel= $_POST['tel'];
$fax= $_POST['fax'];
$email= $_POST['email'];
$ad1 = $_POST['ad1'];
$ad2 = $_POST['ad2'];
$ad3 = $_POST['ad3'];
$conp= $_POST['conp'];
$conu= $_POST['conu'];
$val = "i";

$sql = "INSERT INTO `hospital`(`Hos_ID`, `name`, `Description`, `Cit_ID`, `Typ_ID`, `add1`, `add2`, `add3`, `telephone`, `fax`, `email`, `isActive`, `con_person`, `con_number`) VALUES ('$id','$name','$des','$cid','$type','$ad1','$ad2','$ad3','$tel','$fax','$email' ,1,'$conp','$conu')";

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
    $val  ="g";
} else {
	$val  ="f";
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();	
header('Location: ..\index.php?s='.$val.'');
exit;

?>