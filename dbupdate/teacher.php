
<?php

include 'dbcon.php';

$id = $_POST['id'];
$name= $_POST['name'];
$nic = $_POST['nic'];
$mob = $_POST['mob'];
$email= $_POST['email'];
$mocc= $_POST['mocc'];

$val = "i";

//$hash = password_hash($nic, PASSWORD_DEFAULT);


$sql = "INSERT INTO `m_teacher`(`id`, `first_name`,`nic`, `tel_no`, `email`, `teacher_cat_id`, `isactive`) VALUES ('$id','$name','$nic','$mob','$email','$mocc',1)";
$sql1 = "INSERT INTO `users`(`id`,`name`, `password`, `group_id`) VALUES ('$id','$name','$nic',2)";
if ($conn->query($sql) === TRUE) {
	$conn->query($sql1);
    $val  ="g";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    $val  ="f";
}


$conn->close();	
header('Location: ..\index.php?s='.$val.'');
exit;

?>