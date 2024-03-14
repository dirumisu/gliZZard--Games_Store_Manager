<?php
require_once("admin_catalog_con.php");
$query = "SELECT * FROM item_details";
$result = mysqli_query($con, $query);

?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gliZZard - Admin Catalog</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #1d2630;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-md-offset-3" align="center"><br><br>
                <img src="gliZZard imgs/glizzard_icon.png" alt=""><br><br>
                <h1 style="color: white;">Manage Games Catalog</h1> <br>
                <form action="add_item.php" method="post">
                    <input type="text" name="ItemName" placeholder="Enter Item Name" class="form-control mb-2" required>
                    <input type="number" name="Quantity" placeholder="Enter Quantity" class="form-control mb-2" required>
                    <input type="number" name="UnitPrice" placeholder="Enter Unit Price" class="form-control mb-2" required>
                    <button class="btn btn-success" name="btn-add">Add</button><br><br>
                    <small style="color: white">Want to Logout?
                        <a href="glizzard_admin_login.html">Click Here</a></small>

                </form>
            </div>
        </div>
    </div>
    </div>

    <br>

    <div class="container">
        <div class="row">
            <div class="col-lg6 m-auto">
                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Item Id</th>
                                <th>Item Name</th>
                                <th>Item Quantity</th>
                                <th>Unit Price</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $row['itemID'] ?></td>
                                    <td><?php echo $row['itemName'] ?></td>
                                    <td><?php echo $row['itemQty'] ?></td>
                                    <td><?php echo $row['unitPrice'] ?></td>
                                    <td><a href="update_item.php?id=<?php echo $row['itemID'] ?>" class="btn btn-success">Edit</a></td>
                                    <td><a href="delete_item.php?id=<?php echo $row['itemID'] ?>" class="btn btn-danger"><b>Delete</b></a></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    </table>
                    <div class="row justify-content-center">
                    <div class="col-md-6 col-md-offset-3" align="center">
                    <button class="btn btn-info" name="btn-view-orders" onclick="redirectToViewOrders()">View Orders</button><br><br>
                    </div></div>

                    <script>
                        function redirectToViewOrders() {
                            window.location.href = "view_orders.php";
                        }
                    </script>

                </div>
            </div>
        </div>
    </div>

</body>

</html>