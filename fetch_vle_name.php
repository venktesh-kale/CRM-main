<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crm";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get customer_id from GET parameter
$customer_id = $_GET['customer_id'];

// Prepare and execute SQL query to fetch VLE Name from csc_data table
$sql = "SELECT VLE_Name FROM csc_data WHERE CSC_ID = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Error preparing statement: " . $conn->error);
}

$stmt->bind_param("s", $customer_id);
if (!$stmt->execute()) {
    die("Error executing statement: " . $stmt->error);
}

$stmt->bind_result($vle_name);
$stmt->fetch();

// Close statement
$stmt->close();

// Close connection
$conn->close();

// Output VLE Name
echo $vle_name;
?>
