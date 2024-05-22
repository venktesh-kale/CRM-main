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
    // Replace NULL values with 0
    $district = ($row['district'] !== "") ? $row['district'] : '0';
    $subDistrict = ($row['subdistrict'] !== "") ? $row['subdistrict'] : '0';
    $totalTxn = ($row['Total_DSP_Txn'] !== "") ? $row['Total_DSP_Txn'] : '0';
    $panApplications = ($row['PAN_CARD_APPLICATIONS'] !== "") ? $row['PAN_CARD_APPLICATIONS'] : '0';
    $agricultureService = ($row['AGRICULTURE_SERVICE'] !== "") ? $row['AGRICULTURE_SERVICE'] : '0';

    // Output HTML content directly
    echo "<tr><th>District :</th><td>{$district}</td></tr>";
    echo "<tr><th>Sub district :</th><td>{$subDistrict}</td></tr>";
    echo "<tr><th>Total Txn :</th><td>{$totalTxn}</td></tr>";
    echo "<tr><th>PAN Applications :</th><td>{$panApplications}</td></tr>";
    echo "<tr><th>Agriculure Service :</th><td>{$agricultureService}</td></tr>";
} else {
    // Output default values or error message
    echo "<tr><td colspan='2'>Data not found</td></tr>";
}

// Close statement
$stmt->close();

// Close connection
$conn->close();
?>
