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

$query = "SELECT * FROM csc_data WHERE CSC_ID = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $customer_id);
$stmt->execute();
$result = $stmt->get_result();

// Fetch data
if ($row = $result->fetch_assoc()) {
    // Store fetched data in an associative array
    $data = array(
        'customerName' => $row['VLE_Name'],
        'mobileNumber' => $row['Mobile_No'],
        'cscId' => $row['CSC_ID'],
        
    );
} else {
    // If no data found, set default values or return an error message
    $data = array(
        'customerName' => 'Unknown',
        'mobileNumber' => 'Unknown',
        'cscId' => 'Unknown',
        
    );
}

// Close statement
$stmt->close();

// Close connection
$conn->close();

// Send JSON response
header('Content-Type: application/json');
echo json_encode($data);
?>
