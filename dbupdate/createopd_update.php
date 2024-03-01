
<?php
include 'dbcon.php';

$id = $_POST['id'];
$patid= $_POST['patid'];
$hei= $_POST['hei'];
$wei= $_POST['wei'];
$tem= $_POST['tem'];

$val = "i";

$sql1 ="SELECT DATE(NOW()) - DATE(`last_Token_Time`) AS diff ,`last_Token_No`+ 1 AS tno FROM `settings`";
$tnumber = 0;
$res1 = $conn->query($sql1);
	while ($row = mysqli_fetch_assoc($res1)) {
  		if ($row['diff'] == 0){
  			$tnumber =$row['tno'];
  		}else{
  			$tnumber = 1;
  		}				
	}



$sql  = "INSERT INTO `opd`(`Opd_ID`, `Pat_ID`, `height`, `weight`, `temperature`, `Date_Time`, `Tocken_No`,`isInspect`) VALUES ('$id','$patid','$hei','$wei','$tem',CURTIME(),'$tnumber',0);";
$sql .= "UPDATE `settings` SET `last_Token_No`='$tnumber',`last_Token_Time`= NOW() WHERE `id` = '1'";


if ($conn->multi_query($sql) === TRUE) {
    $val  ="g";
} else {
	$val  ="f";
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();	
header('Location: ..\forms\opd.php?tn='.$tnumber.'');
exit;

?>

