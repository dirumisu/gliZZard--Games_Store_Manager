<?php
// Establish a connection to MySQL
$servername = "localhost";
$username = "root";
$password = "";
$database = "glizzard";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data sent via POST request
$orderId = $_POST['orderId'];
$status = $_POST['status'];

// Convert status from boolean to actual status text
$statusText = $status == 1 ? 'confirmed' : 'pending';

// Prepare SQL statement to update status in orderpayment table
$sql = "UPDATE orderpayment SET status = '$statusText' WHERE orderID = $orderId";

// Execute SQL statement
if ($conn->query($sql) === TRUE) {
    echo "Status updated successfully";
} else {
    echo "Error updating status: " . $conn->error;
}

// Close MySQL connection
$conn->close();
?>
