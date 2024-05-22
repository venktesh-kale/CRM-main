<!-- fetch_bgl_review.php -->
<?php
// Connect to the database
require_once "./Database/dbConnection.php";

// Fetch data from BGL_Review table
$sql = "SELECT * FROM BGL_Review where customer_id = '8421279597'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<div class='BGL-div'>";
    echo "<table class='bgl-table'>";
    echo "<tr>";
    echo "<th>Sr No</th>";
    echo "<th>Customer ID</th>";
    echo "<th>Date</th>";
    echo "<th>Note / Remark</th>";
    echo "<th>Total BGL Amount</th>";
    echo "<th>Total Paid Amount</th>";
    echo "<th>Pay Amount</th>";
    echo "<th>Unpaid Amount</th>";
    echo "<th>Total Unpaid Amount</th>";
    echo "</tr>";
    echo "</div>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["Sr_No"] . "</td>";
    echo "<td>" . $row["customer_id"] . "</td>";
    echo "<td>" . $row["Date"] . "</td>";
    echo "<td>" . $row["Note_Remark"] . "</td>";
    echo "<td>" . $row["Total_BGL_Amount"] . "</td>";
    echo "<td>" . $row["Total_Paid_Amount"] . "</td>";
    echo "<td>" . $row["Pay_Amount"] . "</td>";
    echo "<td>" . $row["Unpaid_Amount"] . "</td>";
    echo "<td>" . $row["Total_Unpaid_Amount"] . "</td>";
    echo "</tr>";
}
echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
