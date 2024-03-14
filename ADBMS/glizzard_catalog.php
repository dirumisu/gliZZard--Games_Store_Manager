<?php
require_once("admin_catalog_con.php");
$query = "SELECT * FROM item_details";
$result = mysqli_query($con, $query);

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>glizzard - browse games</title>
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
                <!-- Wrap the image in a container and apply the margin/padding -->
                <div class="img-container">
                    <img src="gliZZard imgs/glizzard_icon.png" alt="" /><br /><br />
                    <h1 style="color: white;">Shop All Your Games at One Place</h1>
                    <small style="color: white">Want to Logout?
                        <a href="glizzard_cus_login.html">Click Here</a></small>
                </div>
                <br>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Item Name</th>
                                <th>Quantity available</th>
                                <th>Price per unit</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $row['itemName'] ?></td>
                                    <td><?php echo $row['itemQty'] ?></td>
                                    <td><?php echo $row['unitPrice'] ?></td>
                                    <td><a class="btn btn-success" href="glizzard_cus_orders.php?itemName=<?php echo urlencode($row['itemName']) ?>&itemQty=<?php echo urlencode($row['itemQty']) ?>&unitPrice=<?php echo urlencode($row['unitPrice']) ?>">Buy</a></td>

                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

</body>

</html>