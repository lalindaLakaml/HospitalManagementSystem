
<?php
include 'dbcon.php';

$id  = $_POST['id'];
$tit = $_POST['tit'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$dob = $_POST['dob'];
$gen = $_POST['gen'];
$typ = $_POST['typ'];
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


$sql = "INSERT INTO `employee_master`(`Emp_ID`, `Emp_Typ_ID`, `Title`, `First_Name`, `Middle_Name`, `Last_Name`, `DOB`, `Add1`, `Add2`, `Add3`, `Cty_ID`, `Gender`, `email`, `Join_Date`, `Hos_ID`, `isActive`,`land`,`mobile`) VALUES ('$id','$typ','$tit','$fname','$mname','$lname','$dob','$ad1','$ad2','$ad3','$cti','$gen','$email','$jdate','$hos',1,'$lan','$mob');";
$sql .= "INSERT INTO `employee_history`(`Emp_ID`, `Hos_ID`, `start_date`, `end_date`, `emp_typ_ID`, `memo`) VALUES ('$id','$hos','$jdate','$jdate','$typ','Create Employee')";


if ($conn->multi_query($sql) === TRUE) {
	
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