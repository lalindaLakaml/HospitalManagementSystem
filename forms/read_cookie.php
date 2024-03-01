<?php
// Check if the 'user' cookie is set
if(isset($_COOKIE['user'])) {
    // Retrieve the value of the 'user' cookie
    $user = $_COOKIE['user'];
    echo "Value of 'user' cookie: " . $user;
} else {
    echo "Cookie 'user' is not set.";
}
?>
