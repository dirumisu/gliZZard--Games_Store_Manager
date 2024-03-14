<?php
// Include the database connection file
require_once("admin_catalog_con.php");

// Start session
session_start();

// Check if itemName, itemQty, and unitPrice parameters are set
if (isset($_GET['itemName']) && isset($_GET['itemQty']) && isset($_GET['unitPrice'])) {
    // Retrieve item details from the URL parameters
    $itemName = $_GET['itemName'];
    $itemQty = $_GET['itemQty'];
    $unitPrice = $_GET['unitPrice'];

    // Calculate total amount
    $totalAmount = $itemQty * $unitPrice;

    // Check if cusID is set in session
    if (isset($_SESSION['cusId'])) {
        // Retrieve cusID from session
        $cusID = $_SESSION['cusId'];

        // Insert the order into the orders table with cusID
        $insertQuery = "INSERT INTO orders (cusID, orderedItem, totalAmount) VALUES ('$cusID', '$itemName', '$totalAmount')";

        if (mysqli_query($con, $insertQuery)) {
            // Get the auto-generated orderID
            $orderID = mysqli_insert_id($con);

            // Store the orderId in session
            $_SESSION['orderID'] = $orderID;

            // Redirect to glizzard_payment.php after successful insertion
            header("Location: glizzard_payment.php");
            exit(); // Ensure to exit after redirection

        } else {
            // Redirect to error page if insertion fails
            header("Location: glizzard_error.html");
            exit(); // Ensure to exit after redirection
        }
    } else {
        // If cusID is not set in session, display an error message
        echo "<h1>Error: Customer ID not found!</h1>";
    }
} else {
    // If parameters are not set, display an error message
    echo "<h1>Error: Order details not found!</h1>";
}
