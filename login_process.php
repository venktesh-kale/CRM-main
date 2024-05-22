<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crm";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get username and password from form
$username = $_POST['username'];
$password = $_POST['password'];

// Query to check if user exists
$sql = "SELECT * FROM users WHERE user_id='$username' AND pass='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User exists, set session variable and redirect to profile page
    $_SESSION['username'] = $username;
    header("Location: NewDashboard.html");
    exit;
} else {
    // User does not exist, redirect back to login page
   print("errrrr");
    header("Location: index.php");
}
$conn->close();
?>
