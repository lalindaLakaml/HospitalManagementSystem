
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


$sql = "UPDATE `patient_master` SET `Title`='$tit',`First_Name`='$fname',`Middle_Name`='$mname',`Last_Name`='$lname',`Add1`='$ad1',`Add2`='$ad2',`Add3`='$ad3',`Cit_ID`='$cti',`Gender`='$gen',`Ctz_ID`='$citzip',`Eth_ID`='$matsta',`Mat_ID`='$matsta',`Reg_ID`='$rel',`Reg_Date`='$jdate',`DOB`='$dob',`NIC_Passport`='$nic',`Contact_Person`='$nic',`isActive`='1' WHERE `Pat_ID`='$id';"

if ($conn->query($sql) === TRUE) {
	$val  ="g";
} else {
	$val ="f";
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();	
header('Location: ..\index1.php?s='.$sql.'');
exit;

?>