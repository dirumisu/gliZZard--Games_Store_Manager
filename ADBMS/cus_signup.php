<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $tele = $_POST['tele'];
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

    try {
        $query = "INSERT INTO customer_detail VALUES (' ','$name','$address','$tele','$email','$password')";
        $result = $conn->query($query);
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Customer Signup</title>
        </head>

        <body>
            <script type="text/javascript">
                var alertStyle = "padding: 10px; background-color: #4CAF50; color: white;";
                alert("Created Account Successfully !!!");
                window.location.href = "glizzard_cus_login.html";
            </script>
        </body>

        </html>
<?php

    } catch (Exception) {
        header("Location: glizzard_error.html");
    }
}
