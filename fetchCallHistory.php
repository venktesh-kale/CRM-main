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
    $sql = "SELECT * FROM call_history WHERE customer_id = '8421279597'";

    // Execute SQL query
    $result = $conn->query($sql);

    // Check if any rows were returned
    if ($result->num_rows > 0) {
        // Output table header
           
            echo "<table class='table'>";
            echo "<tr>";
            echo "<th>Sr No.</th>";
            echo "<th>Customer Id</th>";
            echo "<th>Call Type</th>";
            echo "<th>Call Date</th>";
            echo "<th>Call Time / Remark</th>";
            echo "<th>Complaint</th>";
            echo "<th>Reason</th>";
            echo "<th>Project</th>";
            echo "<th>Type</th>";
            echo "<th>Sub Type</th>";
            echo "<th>Resolution</th>";
            echo "<th>Interaction</th>";
            echo "<th>Remark</th>";
            echo "</tr>";
           

        // Output data of each row
        $sr_no = 1; // Initialize the serial number
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $sr_no . "</td>";
            echo "<td>" . $row["customer_id"] . "</td>";
            echo "<td>" . $row["Call_InOut"] . "</td>";
            echo "<td>" . $row["Call_Date"] . "</td>";
            echo "<td>" . $row["Call_Time"] . "</td>";
            echo "<td>" . $row["Enquiry_Complaint"] . "</td>";
            echo "<td>" . $row["Call_Reason_Query"] . "</td>";
            echo "<td>" . $row["Project"] . "</td>";
            echo "<td>" . $row["Type"] . "</td>";
            echo "<td>" . $row["Subtype"] . "</td>";
            echo "<td>" . $row["Resolution"] . "</td>";
            echo "<td>" . $row["Interaction_Type"] . "</td>";
            echo "<td>" . $row["Remark"] . "</td>";
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
