
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

$sql = "INSERT INTO `wards`(`Wor_ID`, `Hos_ID`, `wor_cat_ID`, `wor_typ_ID`, `Description`, `Memo`, `Total_bed_count`, `Remaning_Bed_Count`) VALUES ('$id','$hid','$cat','$type','$name','$des','$count','$count')";

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
    $val  ="g";
} else {
	$val  ="f";
    echo "Error: " . $sql . "<br>" . $conn->error;
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