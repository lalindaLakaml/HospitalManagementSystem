
<?php
include 'dbcon.php';

$id  = $_POST['id'];
$tit = $_POST['tit'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$dob = $_POST['dob'];
$gen = $_POST['gen'];
$citzip = $_POST['citzip'];
$rel = $_POST['rel'];
$matsta= $_POST['matsta'];
$nic= $_POST['nic'];
$ad1 = $_POST['ad1'];
$ad2 = $_POST['ad2'];
$ad3 = $_POST['ad3'];
$hos = $_POST['hos'];
$mob = $_POST['mob'];
$lan = $_POST['lan'];
$email = $_POST['email'];
$jdate = $_POST['jdate'];
$cti = $_POST['cti'];
$val = "i";


$sql = "INSERT INTO `patient_master`(`Pat_ID`,`Title`, `First_Name`, `Middle_Name`, `Last_Name`, `Add1`, `Add2`, `Add3`, `Cit_ID`, `Gender`, `Ctz_ID`, `Eth_ID`, `Mat_ID`, `Reg_ID`, `Reg_Date`, `DOB`, `NIC_Passport`, `Contact_Person`, `isActive`) VALUES ('$id','$tit','$fname','$mname','$lname','$ad1','$ad2','$ad3','$cti','$gen','$citzip','$citzip','$matsta','$rel','$jdate','$dob','$nic','$nic','1')";


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