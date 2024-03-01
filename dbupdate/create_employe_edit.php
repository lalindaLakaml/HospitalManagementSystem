
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


$sql = "UPDATE `employee_master` SET `Emp_Typ_ID`='$typ',`Title`='$tit',`First_Name`='$fname',`Middle_Name`='$mname',`Last_Name`='$lname',`DOB`='$dob',`Add1`='$ad1',`Add2`='$ad2',`Add3`='$ad3',`Cty_ID`='$cti',`Gender`='$gen',`email`='$email',`mobile`='$mob',`land`='$lan',`Join_Date`='$jdate',`Hos_ID`='$hos' WHERE `Emp_ID` ='$id'";
//$sql = "UPDATE `employee_master` SET `Emp_Typ_ID`='$typ',`Title`='$tit',`First_Name`='$fname',`Middle_Name`='$mname',`Last_Name`='$lname',`Add1`='$ad1',`Add2`='$ad2',`Add3`='$ad3',`Cty_ID`='$cti',`Gender`='$gen',`email`='$email',`mobile`='$mob',`land`='$lan,`Hos_ID`='$hos' WHERE `Emp_ID` ='$id'";        
//$sql = "UPDATE `employee_master` SET `Emp_Typ_ID`='1',`Title`='1',`First_Name`='Savi Sanaka',`Middle_Name`='fwef',`Last_Name`='gegge',`Add1`='geqrgergqer',`Add2`='hwerqjetbgtqe',`Add3`='qrtqertqw',`Cty_ID`='1',`Gender`='1',`email`='fasdfds@gjmm.vom',`mobile`='08978978',`land`='798787678',`Hos_ID`='1' WHERE `Emp_ID` ='1000001'";


if ($conn->query($sql) === TRUE) {
	
    //echo "New record created successfully";
    if(mysqli_affected_rows($conn)== 0){
    	$val  ="f";
    }else{
    	$val  ="g";
    }
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    $val  ="f";
}

$conn->close();	
header('Location: ..\index.php?s='.$val.'');
exit;

?>