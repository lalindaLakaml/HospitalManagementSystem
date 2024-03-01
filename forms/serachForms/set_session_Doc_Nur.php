<?php
session_start();

if(isset($_POST['docnusid']) && isset($_POST['cat']) && isset($_POST['tit'])&& isset($_POST['fname'])&& isset($_POST['lname'])) {
    
    
    $variable1 = $_POST['docnusid'];
    $variable2 = $_POST['cat'];
    $variable3 = $_POST['tit'];
    $variable4 = $_POST['fname'];
    $variable5 = $_POST['lname'];

   
    $_SESSION['docnusid'] = $variable1;
    $_SESSION['cat'] = $variable2;
    $_SESSION['tit'] = $variable3;
    $_SESSION['fname'] = $variable4;
    $_SESSION['lname'] = $variable5;

    echo "Session variables set successfully!";
} else {
    echo "Failed to set session variables!";
}
?>
