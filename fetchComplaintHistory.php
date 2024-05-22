<?php

require_once "./Database/dbConnection.php";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the customer_id is set and not empty
if(isset($_GET['customer_id']) && !empty($_GET['customer_id'])) {
    // Sanitize the input to prevent SQL injection
    $customer_id = mysqli_real_escape_string($conn, $_GET['customer_id']);

    // Prepare SQL statement to select data from tag_complaint table for the specified customer_id
    $sql = "SELECT * FROM tagcomplaint WHERE mob_no = '8421279597'";

    // Execute SQL query
    $result = $conn->query($sql);

    // Check if any rows were returned
    if ($result->num_rows > 0) {
        // Output table header
        echo "<table class='table' border='1'>";
        echo "<tr><th>Sr No.</th><th>Tag Date & Time</th><th>Call Type</th><th>Type</th><th>Sub Type</th><th>Complaint Issue</th><th>Escalation Desk</th><th>Escalation Remark</th><th>Resolution TAT</th><th>Resolution Status</th><th>Complaint Handle</th><th>Complaint Remark</th></tr>";

        // Output data of each row
        $sr_no = 1; // Initialize the serial number
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $sr_no . "</td>";
            echo "<td>" . $row["tag_date_time"] . "</td>";
            echo "<td>" . $row["call_type"] . "</td>";
            echo "<td>" . $row["type"] . "</td>";
            echo "<td>" . $row["sub_type"] . "</td>";
            echo "<td>" . $row["complaint_issue"] . "</td>";
            echo "<td>" . $row["escalation_desk"] . "</td>";
            echo "<td>" . $row["escalation_remark"] . "</td>";
            echo "<td>" . $row["resolution_tat"] . "</td>";
            echo "<td>" . $row["resolution_status"] . "</td>";
            echo "<td>" . $row["complaint_handle"] . "</td>";
            echo "<td>" . $row["complaint_remark"] . "</td>";
            echo "</tr>";
            $sr_no++; // Increment the serial number
        }
        
        echo "</table>";
    } else {
        echo "0 results";
    } 
} else {
    echo "No customer ID provided";
}

$conn->close();
?>
