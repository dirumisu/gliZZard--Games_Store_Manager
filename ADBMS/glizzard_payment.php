<?php
if (isset($_POST["payNow"])) {
    $paymentMethod = $_POST['paymentMethod'];
    $cardNo = $_POST['cardNo'];
    $paymentDate = $_POST['paymentDate'];

    // Start session to access orderId
    session_start();

    // Check if orderId is set in session
    if (isset($_SESSION['orderID'])) {
        // Retrieve orderId from session
        $orderID = $_SESSION['orderID'];

        $servername = "localhost";
        $username = "root";
        $password = ""; // No password
        $database = "glizzard"; // Database name

        // Create connection
        $conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and bind SQL statement
        $stmt = $conn->prepare("INSERT INTO orderpayment (paymentMethod, cardNo, paymentDate, orderID, status) VALUES (?, ?, ?, ?, 'pending')");
        $stmt->bind_param("sssi", $paymentMethod, $cardNo, $paymentDate, $orderID,);

        // Execute the statement
        if ($stmt->execute()) {
            echo "<script>alert('Payment successful!');  window.location.href = 'feedback.php'</script>";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the connection
        $conn->close();
    } else {
        // If orderId is not set in session, display an error message
        echo "<h1>Error: Order ID not found!</h1>";
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <title>glizzard - Payment</title>
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
        select{
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

            <h1 style="color: white;">Payments</h1><br>

            <form action="#" method="post">
                <input type="hidden" id="productID" name="productID" value="<?php echo isset($ProID) ? $ProID : ''; ?>" required>

                <div class="form-group">
                    <select id="paymentMethod" name="paymentMethod" class="form-control" required>
                        <option value="">Select Payment Method</option>
                        <option value="Credit Card">Credit Card</option>
                        <option value="Debit Card">Debit Card</option>
                        <option value="PayPal">PayPal</option>
                    </select>
                </div><br>

                <div class="form-group">
                    <input type="number" id="cardNo" name="cardNo" class="form-control" placeholder="Enter Card Number" required>
                </div><br>

                <div class="form-group">
                    <input type="date" id="paymentDate" name="paymentDate" class="form-control" placeholder="Enter Date" required>
                </div><br>

                <input type="submit" name="payNow" class="btn btn-success" value="Pay Now">
            </form>
        </div>
    </div>
</div>

</body>

</html>