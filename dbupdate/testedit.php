<?php
// Establish database connection
include 'dbcon.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query
$sql = "SELECT `Opt_ID`,`Description` FROM `system_options`";
$result = $conn->query($sql);

// Check if any rows returned
if ($result->num_rows > 0) {
    // Output data
    while ($row = $result->fetch_assoc()) {
        echo "<p>ID: " . $row['Opt_ID'] . " - Name: " . $row['Description'] . "</p>";
    }
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>
