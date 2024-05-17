<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "serenio";

/*
$servername = "localhost";
$dbname = "u593341949_db_serenio";
$username = "u593341949_dev_serenio";
$password = "20212014Serenio";
*/

try {
    // Create a PDO connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get POST data
    $user_id = 1; // Assuming you have the user ID from session or other method
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postal_code = $_POST['postal_code'];
    $country = $_POST['country'];

    // Prepare SQL statement to insert into database
    $sql = "INSERT INTO addresses (user_id, street, city, state, postal_code, country) VALUES (:user_id, :street, :city, :state, :postal_code, :country)";
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':street', $street);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':state', $state);
    $stmt->bindParam(':postal_code', $postal_code);
    $stmt->bindParam(':country', $country);

    // Execute the statement
    $stmt->execute();

    // Redirect to a confirmation page or back to the product list
    header("Location: success.php");
    exit(); // Terminate script execution after redirection
} catch(PDOException $e) {
    // Display error message
    echo "Error: " . $e->getMessage();
}

// Close the connection
$conn = null;
?>
