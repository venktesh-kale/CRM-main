<?php

require_once "./Database/dbConnection.php";


if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL statement to select data from tag_enquiry table
$sql = "SELECT * FROM tag_enquiry where customer_id = '8421279597'";

// Execute SQL query
$result = $conn->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) 
{
    // Output table header
    echo "<table class='enquiry-table' border='1'>";
    echo "<tr><th>Sr No.</th><th>Customer ID</th><th>Tag Date & Time</th><th>Call Type</th><th>Type</th><th>Sub Type</th><th>Query</th><th>Resolution</th><th>Feedback</th><th>Resolution Status</th><th>Remark</th></tr>";

    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["sr_no"] . "</td>";
        echo "<td>" . $row["customer_id"] . "</td>";
        echo "<td>" . $row["Tag_Date_Time"] . "</td>";
        echo "<td>" . $row["Call_Type"] . "</td>";
        echo "<td>" . $row["Type"] . "</td>";
        echo "<td>" . $row["Sub_Type"] . "</td>";
        echo "<td>" . $row["Query"] . "</td>";
        echo "<td>" . $row["Resolution"] . "</td>";
        echo "<td>" . $row["Feedback"] . "</td>";
        echo "<td>" . $row["Resolution_Status"] . "</td>";
        echo "<td>" . $row["Remark"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
} 
    $conn->close();
?>
