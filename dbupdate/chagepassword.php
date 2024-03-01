<?php
 include 'dbcon.php';
 session_start(); 
 
 $user = $_SESSION['user'];
 $pass = $_POST['pass'];
 $newpass = $_POST['newpass'];
 $val = "i";
 
 $sql = "SELECT * FROM `system_user` WHERE `Use_ID`= '$user' AND `password`= '$pass'";
 
 $res = $conn->query($sql);

	if ( mysqli_num_rows($res) == 0) {
	    
	    $val = "wp";
	} else {
	    $sql1 = "UPDATE system_user SET password = '$newpass' WHERE Use_ID = '$user'";
	    $res1 = $conn->query($sql1);
	    $val="g";
	}
	
$conn->close();	
header('Location: ..\forms\home.php?s='.$val.'');
exit;


?>