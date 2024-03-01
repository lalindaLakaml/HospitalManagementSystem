
<?php
include 'dbcon.php';

$id  = $_POST['id'];
$gru = $_POST['gru'];
$pass = $_POST['txtPassword'];
$val = "i";


// $sql = "UPDATE `employee_master` SET `Emp_Typ_ID`='$typ',`Title`='$tit',`First_Name`='$fname',`Middle_Name`='$mname',`Last_Name`='$lname',`DOB`='$dob',`Add1`='$ad1',`Add2`='$ad2',`Add3`='$ad3',`Cty_ID`='$cti',`Gender`='$gen',`email`='$email',`mobile`='$mob',`land`='$lan',`Join_Date`='$jdate',`Hos_ID`='$hos' WHERE `Emp_ID` ='$id'";
   $sql = "UPDATE `system_user` SET `Gro_ID`='$gru',`password`='$pass' WHERE `ID` = '$id'";        


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