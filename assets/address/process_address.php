<?php
// Database connection
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "serenio";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get POST data
$user_id = 1; // Assuming you have the user ID from session or other method
$street = $_POST['street'];
$city = $_POST['city'];
$state = $_POST['state'];
$postal_code = $_POST['postal_code'];
$country = $_POST['country'];

// Insert into database
$sql = "INSERT INTO addresses (user_id, street, city, state, postal_code, country) VALUES ('$user_id', '$street', '$city', '$state', '$postal_code', '$country')";

if ($conn->query($sql) === TRUE) {
    echo "New address recorded successfully";
    // Redirect to a confirmation page or back to the product list
    header("Location: success.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
