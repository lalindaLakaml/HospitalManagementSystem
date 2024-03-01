
<?php
include 'dbcon.php';

$id    = $_POST['admid'];
$note  = $_POST['note'];
$bedno = $_POST['bedno'];
$patid = $_POST['patid'];
$gname = $_POST['gname'];
$gmob  = $_POST['gmob'];
$opdid = $_POST['opdid'];


$val = "i";


$sql = "INSERT INTO `admission`(`Adm_ID`, `Bed_ID`, `Guardian_Name`, `Guardian_Mobile`, `Note`, `Pat_ID`) VALUES ('$id','$bedno','$gname','$gmob','$note','$patid');";
$sql .= "UPDATE `opd_admit` SET `Adm_ID`= '$id' WHERE `Opd_ID` = '$opdid';";
$sql .= "UPDATE `opd_admit` SET `statues`= '1' WHERE `Opd_ID` = '$opdid';";
$sql .= "UPDATE `bed` SET `isOccupied`= '1'  WHERE `Bed_ID`= '$bedno'";


if ($conn->multi_query($sql) === TRUE) {
	
    //echo "New record created successfully";
    $val  ="g";
} else {
	$val  ="f";
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();	
header('Location: ..\pendingadmission.php?s='.$val.'');
exit;

?>