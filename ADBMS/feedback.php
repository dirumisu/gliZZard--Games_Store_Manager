<?php
// Start session
session_start();

// Manager Class
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

// Query Class (removed the query condition)
$query = new MongoDB\Driver\Query([]);

// Output of the executeQuery will be object of MongoDB\Driver\Cursor class
$cursor = $manager->executeQuery('glizzard.reviews', $query); // Assuming 'glizzard' is the database and 'reviews' is the collection

// Convert cursor to Array
$documents = $cursor->toArray();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $review = $_POST['review'];

    // Retrieve user's name from session
    $cusName = $_SESSION['cusName'];

    // Create new document object
    $document = new stdClass();
    $document->review = $review;
    $document->customer_name = $cusName; // Add customer's name to the document

    // Insert document into MongoDB collection
    $bulkWrite = new MongoDB\Driver\BulkWrite();
    $bulkWrite->insert($document);
    $manager->executeBulkWrite('glizzard.reviews', $bulkWrite);

    // Redirect to the same page to refresh the records
    header("Location: {$_SERVER['PHP_SELF']}");
    exit;
}

?>




<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <title>gliZZard - Customer Login</title>
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
                <h1 style="color: white;">Add a Review</h1>
                <form id="reviewForm" action="#" method="post">
                    <textarea class="form-control" id="review" rows="5" name="review" required></textarea><br>
                    <input type="submit" name="submit" class="btn btn-success" value="Submit"><br><br>
                    <small style="color: white">Want to Buy More Games?
                        <a href="glizzard_catalog.php">Click Here</a></small><br>
                    <small style="color: white">Want to Logout?
                        <a href="glizzard_cus_login.html">Log Out</a></small><br><br>
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
                </form>
            </div>
        </div>
    </div>
    <script>
        // JavaScript code to display a popup message after successful submission
        document.addEventListener('DOMContentLoaded', function() {
            var reviewForm = document.getElementById('reviewForm');
            reviewForm.addEventListener('submit', function(event) {
                // Display alert message after successful submission
                alert('Thank you for your review! Your feedback has been submitted successfully.');
            });
        });
    </script>
</body>

</html>