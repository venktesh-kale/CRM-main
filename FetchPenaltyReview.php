<?php

require_once "./Database/dbConnection.php";


        $sql = "SELECT * FROM Penalty_Review where customer_id = '8421279597'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            
            echo "<div class='table-container'>";
            echo "<table class='data-table'>";
            echo "<tr><th>Sr No.</th><th>Customer ID</th><th>Date</th><th>Note / Remark</th><th>Penalty Amount</th><th>Total Paid Amount</th><th>Unpaid Amount</th><th>Total Penalty Amount</th></tr>";
            
            
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["Sr_No"] . "</td>";
                echo "<td>" . $row["customer_id"] . "</td>";
                echo "<td>" . $row["Date"] . "</td>";
                echo "<td>" . $row["Note_Remark"] . "</td>";
                echo "<td>" . $row["Penalty_Amount"] . "</td>";
                echo "<td>" . $row["Total_Paid_Amount"] . "</td>";
                echo "<td>" . $row["Unpaid_Amount"] . "</td>";
                echo "<td>" . $row["Total_Penalty_Amount"] . "</td>";
                echo "</tr>";
            }
            
            echo "</table>";
            echo "</div>";
        } else {
            echo "0 results";
        }
    
    $stmt->close();


?>
