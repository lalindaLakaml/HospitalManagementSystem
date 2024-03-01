
<?php
include 'dbcon.php';

$id  = $_POST['id'];
$repname = $_POST['repname'];
$type= $_POST['type'];
$count = (int)$_POST['count'];
$val = "i";


$sql = "INSERT INTO `lab_report_header`(`LRE_ID`, `Name`, `spe_type_id`) VALUES ('$id','$repname','$type')";

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
    $val  ="g";
} else {
	$val  ="f";
    echo "Error: " . $sql . "<br>" . $conn->error;
}


for ($i = 1; $i <= $count; $i++) {
		$lineid = "id".$i;
		$linename = "name".$i;
		
		$lid = $_POST[$lineid];
		$lname = $_POST[$linename];	
	
		$sql1 = "INSERT INTO `lab_report_layout`(`LRE_ID`, `line_ID`) VALUES ('$id ','$lid')";
		   
	    if ($conn->query($sql1) === TRUE) {
		
		}
		$sql1 = "INSERT INTO `lab_report_details`(`line_ID`, `Description`) VALUES ('$lid','$lname')";
		if ($conn->query($sql1) === TRUE) {
		
		}
		
	}

$conn->close();	
header('Location: ..\index.php?s='.$val.'');
exit;

?>