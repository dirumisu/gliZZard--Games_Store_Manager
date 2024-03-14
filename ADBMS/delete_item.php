<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $conn = new mysqli('localhost', 'root', '', 'glizzard');
    if ($conn->connect_error) {
        die('Not Connected..');
    }

    $id = $_GET['id'];

    $sql = "DELETE FROM item_details WHERE itemID = $id";

    if ($conn->query($sql) === TRUE) {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Delete Item</title>
        </head>

        <body>
            <script type="text/javascript">
                var alertStyle = "padding: 10px; background-color: #4CAF50; color: white;";
                alert("Item Deleted Successfully !!!");
                window.location.href = "glizzard_admin_catalog.php";
            </script>
        </body>

        </html>
<?php
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request";
}
?>