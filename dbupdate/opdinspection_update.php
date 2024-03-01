
<?php
include 'dbcon.php';

$id = $_POST['id'];
$bp= $_POST['bp'];
$r2= $_POST['r2'];
$r3= $_POST['r3'];
$sta = $_POST['sta'];
$dia= $_POST['dia'];
$snote= $_POST['snote'];
$ward = $_POST['ward'];


$val = "i";
session_start();
$docid = $_SESSION['user'];
$did = "";
$sql1 = "SELECT `Emp_ID` FROM `system_user` WHERE `Use_ID` ='$docid'";
	$res1 = $conn->query($sql1);
	while ($row = mysqli_fetch_assoc($res1)) {
		 $did = $row['Emp_ID'];					
	}


$sql = "UPDATE `opd` SET `isInspect`=1,`Doc_ID`='$did',`plood_pressure`='$bp',`redading_two`='$r2',`redading_three`='$r3',`Pos_ID`='$sta',`diagnose`='$dia',`special_note`='$snote' WHERE `Opd_ID` ='$id'";

	if ($conn->query($sql) === TRUE) {
	    //echo "New record created successfully";
	    $val  ="g";
	} else {
		$val  ="f";
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
if($sta = 3){
	$sql2 = "INSERT INTO `opd_admit`(`Opd_ID`, `WO_ID`, `statues`, `date_time`) VALUES ('$id','$ward','0',NOW())";
	if ($conn->query($sql2) === TRUE) {
	   	
	   	} else {
		
		}

	
}
	



$conn->close();	
header('Location: ..\index.php?s='.$sql1.'');
exit;

?>