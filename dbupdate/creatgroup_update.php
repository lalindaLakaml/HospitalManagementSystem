
<?php
include 'dbcon.php';

$id = $_POST['id'];
$name = $_POST['name'];
$dis = $_POST['dis'];

$val = "i";



//$hash = password_hash($pass, PASSWORD_DEFAULT);

$sql1 = "INSERT INTO `system_user_groups`(`Gro_ID`, `Description`, `Memo`, `isActive`) VALUES ('$id','$name','$dis',1)";


if ($conn->query($sql1) === TRUE) {
	$val  ="g";
} else {
	$val ="f";
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql2 = "SELECT `Opt_ID` FROM `system_options` WHERE `isActive` = 1";
$res = $conn->query($sql2);
			while ($row = mysqli_fetch_assoc($res)) {
					$cre = $row['Opt_ID'] . "CR";
					$edi = $row['Opt_ID'] . "ED";
					$vie = $row['Opt_ID'] . "VI";
					
					$opt = $row['Opt_ID'];

					
				//	$c = $_POST[$cre];
				//	$e = $_POST[$edi];
				//	$v = $_POST[$vie];
					
					if (isset($_POST[$cre])) {
						$c = 1;
					} else {
						$c = 0;
					}
					
					if (isset($_POST[$edi])) {
						$e = 1;
					} else {
						$e = 0;
					}

					if (isset($_POST[$vie])) {
						$v = 1;
					} else {
						$v = 0;
					}

					
			
  				$sql = "INSERT INTO `system_group_permission`(`Gro_ID`, `Opt_ID`, `Add_Rec`, `Edit_Rec`, `View_Rec`) VALUES ('$id','$opt','$c','$e','$v')";
  							
			
				if ($conn->query($sql) === TRUE) {
	
					} else {
	
    				echo "Error: " . $sql . "<br>" . $conn->error;
					}

			}



$conn->close();	
header('Location: ..\index.php?s='.$val.'');
exit;

?>

