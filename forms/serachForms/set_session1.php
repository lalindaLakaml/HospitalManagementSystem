<?php
// Start the session
session_start();

if (isset($_POST['section'])) {
   
    $_SESSION['section'] = $_POST['section'];
    echo "Session variable set successfully";
} else {
    echo "Failed to set session variable";
}


?>
