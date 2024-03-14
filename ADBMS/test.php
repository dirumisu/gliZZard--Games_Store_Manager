<?php
// Manager Class for MongoDB
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

// Query Class (removed the query condition)
$query = new MongoDB\Driver\Query([]);

// Output of the executeQuery will be object of MongoDB\Driver\Cursor class
$cursor = $manager->executeQuery('glizzard.reviews', $query); // Assuming 'glizzard' is the database and 'reviews' is the collection

// Convert cursor to Array
$documents = $cursor->toArray();
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>glizzard - view orders</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #1d2630;
        }

        /* Add some margin or padding to the top of the image */

        .img-container {
            margin-top: 50px;
            /* Adjust this value as needed */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-md-offset-3" align="center">
                <div class="img-container">
                    <img src="gliZZard imgs/glizzard_icon.png" alt="" /><br /><br />
                    <h1 style="color: white;">Pending Orders</h1>
                    <small style="color: white">Want to go back?
                        <a href="glizzard_admin_catalog.php">Click Here</a></small><br><br>
                </div>
            </div>
            <br>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Customer ID</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Telephone</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Order ID</th>
                            <th>Ordered Item</th>
                            <th>Total Amount</th>
                            <th>Payment ID</th>
                            <th>Payment Method</th>
                            <th>Card Number</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Establish a connection to MySQL
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $database = "glizzard";

                        $conn = new mysqli($servername, $username, $password, $database);

                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        // Query to fetch joined data
                        $sql = "SELECT 
                                    cd.cusId,
                                    cd.cusName,
                                    cd.cusAddress,
                                    cd.cusTele,
                                    cd.cusEmail,
                                    cd.cusPassword,
                                    o.orderID,
                                    o.orderedItem,
                                    o.totalAmount,
                                    op.paymentID,
                                    op.paymentMethod,
                                    op.cardNo,
                                    op.paymentDate
                                FROM 
                                    customer_detail AS cd
                                INNER JOIN 
                                    orders AS o ON cd.cusId = o.cusID
                                INNER JOIN 
                                    orderpayment AS op ON o.orderID = op.orderID";

                        $result = $conn->query($sql);

                        // Check if there are any rows returned
                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["cusId"] . "</td>";
                                echo "<td>" . $row["cusName"] . "</td>";
                                echo "<td>" . $row["cusAddress"] . "</td>";
                                echo "<td>" . $row["cusTele"] . "</td>";
                                echo "<td>" . $row["cusEmail"] . "</td>";
                                echo "<td>" . $row["cusPassword"] . "</td>";
                                echo "<td>" . $row["orderID"] . "</td>";
                                echo "<td>" . $row["orderedItem"] . "</td>";
                                echo "<td>" . $row["totalAmount"] . "</td>";
                                echo "<td>" . $row["paymentID"] . "</td>";
                                echo "<td>" . $row["paymentMethod"] . "</td>";
                                echo "<td>" . $row["cardNo"] . "</td>";
                                echo "<td>" . $row["paymentDate"] . "</td>";
                                echo "<td><button type='button' class='btn btn-warning change-color-btn'>Pending</button></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='13'>No pending orders</td></tr>";
                        }

                        // Close MySQL connection
                        $conn->close();
                        ?>
                    </tbody>
                </table><br><br>
                
                <div class="row justify-content-center">
                 <div class="col-md-6 col-md-offset-3" align="center">
                    <h1 style="color: white;">Customer Reviews</h1>
                 </div></div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Review</th>
                            </tr>
                        </thead>
                        <?php foreach ($documents as $document) : ?>
                            <tr>
                                <td><?php echo $document->customer_name; ?></td>
                                <td><?php echo $document->review; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>

            </div>

        </div>
    </div>

</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var colorChangeBtns = document.querySelectorAll('.change-color-btn');
        colorChangeBtns.forEach(function(btn) {
            btn.addEventListener('click', function() {
                btn.classList.toggle('btn-info');
                btn.classList.toggle('btn-warning');
                if (btn.classList.contains('btn-info')) {
                    btn.textContent = 'Completed';
                } else {
                    btn.textContent = 'Pending';
                }
            });
        });
    });
</script>


</html>