<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $itemName = $_POST['ItemName'];
    $quantity = $_POST['Quantity'];
    $unitPrice = $_POST['UnitPrice'];


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

    try {
        $query = "INSERT INTO item_details VALUES (' ','$itemName','$quantity','$unitPrice')";
        $result = $conn->query($query);

        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Add Item</title>
        </head>

        <body>
            <script type="text/javascript">
                var alertStyle = "padding: 10px; background-color: #4CAF50; color: white;";
                alert("Item Added Successful !!!");
                window.location.href = "glizzard_admin_catalog.php";
            </script>
        </body>

        </html>
<?php
    } catch (Exception) {
        header("Location: glizzard_error");
    }
} ?>
