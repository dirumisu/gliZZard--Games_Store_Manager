<?php
if (isset($_GET['id'])) {
    $ProID = $_GET['id'];

    $conn = mysqli_connect("localhost", "webuser", "1234", "glizzard");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to retrieve user data
    $sql = "SELECT * FROM item_details WHERE itemID= '$ProID'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            $productName = $row['itemName'];
            $productQty = $row['itemQty'];
            $unitPrice = $row['unitPrice'];
        }
    } else {
        echo "0 results";
    }

    $conn->close();
}

if (isset($_POST["submit"])) {

    $pID = $_POST['productID'];
    $productName = $_POST['productName'];
    $productQty = $_POST['productQty'];
    $unitPrice = $_POST['unitPrice'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "reg";

    $con = mysqli_connect("localhost", "webuser", "1234", "glizzard");

    if (!$con) {
        die("error:" . mysqli_connect_error());
    }

    $sql = "UPDATE item_details SET itemName='$productName',itemQty='$productQty',unitPrice='$unitPrice' WHERE itemID='$pID'";

    // Debugging: Output the SQL query
    echo "Debug: SQL query: $sql<br>";

    if ($con->query($sql)) {
        // Display update successful message using JavaScript
        echo "<script type='text/javascript'>alert('Item Updated Successfully !!!'); window.location.href = 'glizzard_admin_catalog.php';</script>";
        exit();
    } else {
        echo "Something went wrong: " . $con->error;
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <title>glizzard - Update Item</title>
    <style>
        body {
            background-color: #1d2630;
        }

        .container {
            margin-top: 150px;
        }

        input {
            max-width: 300px;
            min-width: 300px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-md-offset-3" align="center">
                <img src="gliZZard imgs/glizzard_icon.png" alt=""><br><br>

                <h1 style="color: white;">Update Product</h1><br>

                <form action="#" method="post">

                    <input type="hidden" id="productID" name="productID" value="<?php echo isset($ProID) ? $ProID : ''; ?>" required>

                    <input type="text" id="productName" name="productName" class="form-control" placeholder="Enter Item Name" value="<?php echo isset($productName) ? $productName : ''; ?>" required><br>

                    <input type="number" id="productQty" name="productQty" class="form-control" placeholder="Enter Item Name" value="<?php echo isset($productQty) ? $productQty : ''; ?>" required><br>


                    <input type="text" id="unitPrice" name="unitPrice" class="form-control" placeholder="Enter Item Name" value="<?php echo isset($unitPrice) ? $unitPrice : ''; ?>" required><br>


                    <input type="submit" name="submit" class="btn btn-success" value="Update"> </input>

                </form>
            </div>
</body>

</html>