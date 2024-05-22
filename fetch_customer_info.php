<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crm";

function dashboard_info() {
    global $servername, $username, $password, $dbname;

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $customer_id = $_POST["customer_id"];

        $sql = "SELECT * FROM operators WHERE 'CSC ID' = '$customer_id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<h3>Operator's Details</h3>";
                echo "<p>Mobile No: " . $row["mob_no"] . "</p>";
                echo "<p>Mr. " . $row["name"] . "</p>";
                echo "<p>Gender: " . $row["gender"] . "</p>";
                echo "<p>Email: " . $row["email"] . "</p>";
                echo "<p>Address: " . $row["address"] . "</p>";
                echo "</div>";
              
            }
        } else {
            echo "0 results";
        }
    }
    $conn->close();
}
if (isset($_POST["customer_id"])) {
    dashboard_info();}

function fetchCallHistory() {
    global $servername, $username, $password, $dbname;

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $customer_id = $_POST["customer_id"];

        $sql = "SELECT * FROM call_history WHERE Mob_no = '$customer_id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='ui-box'>";
                echo "<h3>Operator's Details</h3>";
                echo "<p>Mobile No: " . $row["Mob_no"] . "</p>";
                echo "<p>Call In/Out: " . $row["Call_InOut"] . "</p>";
                echo "<p>Call Date: " . $row["Call_Date"] . "</p>";
                echo "<p>Call Time: " . $row["Call_Time"] . "</p>";
                echo "<p>Enquiry/Complaint: " . $row["Enquiry_Complaint"] . "</p>";
                echo "<p>Call Reason/Query: " . $row["Call_Reason_Query"] . "</p>";
                echo "<p>Project: " . $row["Project"] . "</p>";
                echo "<p>Type: " . $row["Type"] . "</p>";
                echo "<p>Subtype: " . $row["Subtype"] . "</p>";
                echo "<p>Resolution: " . $row["Resolution"] . "</p>";
                echo "<p>Interaction Type: " . $row["Interaction_Type"] . "</p>";
                echo "<p>Remark: " . $row["Remark"] . "</p>";
                echo "</div>";
            }
        } else {
            echo "0 results";
        }
    }
    $conn->close();
}

// if (isset($_POST["customer_id"]) && isset($_POST["CH"])) {
//     $customer_id = $_POST["customer_id"];
//     $ch = $_POST["CH"];
    
//     // Call your function with additional variables
    // fetchCallHistory($customer_id, $ch);
// }

?>
