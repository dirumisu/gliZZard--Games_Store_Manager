<?php
// Start session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "glizzard";

    // Create connection
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to select user with given email and password
    $query = "SELECT * FROM customer_detail WHERE cusEmail='$email' AND cusPassword='$password'";

    $result = $conn->query($query);

    // Check if the query returned any rows
    if ($result->num_rows == 1) {
        // Fetch cusID from the result
        $row = $result->fetch_assoc();
        $cusID = $row['cusId'];
        $cusname = $row['cusName'];

        // Set cusID in session variable
        $_SESSION['cusId'] = $cusID;
        $_SESSION['cusName'] = $cusname;

        // Redirect to catalog page if login successful
        header("Location: glizzard_catalog.php");
        exit();
        
    } else {
        // Redirect back to login page if login unsuccessful
        header("Location: glizzard_error.html");
        exit();
    }

    // Close connection
    $conn->close();
}
