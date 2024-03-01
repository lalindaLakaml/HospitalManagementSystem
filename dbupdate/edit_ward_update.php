
<?php
include 'dbcon.php';

$id = $_POST['id'];
$name= $_POST['name'];
$des= $_POST['des'];
$hid= $_POST['hid'];
$type= $_POST['type'];
$cat= $_POST['cat'];
$count= $_POST['count'];
$rawCount = (int)$_POST['doc_count'];
$val = "i";

$sql = "UPDATE `wards` SET `Hos_ID`='$hid',`wor_cat_ID`='$cat',`wor_typ_ID`='$type',`Description`='$name',`Memo`='$des',`Total_bed_count`='$count',`Remaning_Bed_Count`='$count' WHERE `Wor_ID` ='$id'";

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
    $val  ="g";
} else {
	$val  ="f";
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql2 = "DELETE FROM `ward_doctor_nurse` WHERE `War_ID` = '$id'";

if ($conn->query($sql2) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}


for ($i = 0; $i <= $rawCount; $i++) {
	$eid = $i."ID";
	//$empID = $_POST[$eid];
	
	
	if (isset($_POST[$eid])) {
		$empID = $_POST[$eid];
		$sql1 = "INSERT INTO `ward_doctor_nurse`(`War_ID`, `Emp_ID`) VALUES ('$id','$empID')";
    
	    if ($conn->query($sql1) === TRUE) {
		
		} else {
	
    	echo "Error: " . $sql1 . "<br>" . $conn->error;
		}
	} else {
		$c = 0;
	}

	

    

    
}



$conn->close();	
header('Location: ..\index.php?s='.$val.'');
exit;

?>