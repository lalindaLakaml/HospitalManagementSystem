<?php
session_start();
	
 include 'dbcon.php';
 
 $user = $_POST['user'];
 $pass = $_POST['pass'];
 $val = "i";
  
 $sql = "SELECT * FROM `system_user` WHERE `Use_ID` = '$user' and `password` = '$pass'";
 
         
 
 $res = $conn->query($sql);

 $val  ="lf";

	while ($row = mysqli_fetch_assoc($res)) {
		$_SESSION['loggedin'] = true;
	    $_SESSION['user'] = $user;
	    $_SESSION['username'] = $row['name'] ;
	    echo "Error: " . $sql . "<br>" . $conn->error;
	    $val  ="lg";  		
	   
}

$conn->close();	

if ($val == "lf"){
	header('Location: \HMSystem\forms\login.php?s='.$val.'');
}else {
	header('Location: \HMSystem\forms\home.php');
  	

}

exit;



?>