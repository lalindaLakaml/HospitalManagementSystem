<?php
// Set a cookie named "user" with the value "John Doe" that expires in 1 hour
setcookie("user", "John Doe", time()+3600, "/");

echo "Cookie 'user' is set!";
?>