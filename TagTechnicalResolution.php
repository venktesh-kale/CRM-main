<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tag Technical Resolution</title>
    <link rel="stylesheet" href="./css/TagTechnicalResolutionCss.css">
</head>
<body>

    <div class="container">
    <h2>Tag Technical Resolution Form</h2>
    <form action="" method="post" class="form-container">
        <div class="left-div">
            <label for="customer_id">Customer ID (Mobile Number):</label>
            <input type="text" id="customer_id" name="customer_id" required><br><br>

            <label for="tag_date_time">Tag Date & Time:</label>
            <input type="datetime-local" id="tag_date_time" name="tag_date_time" required><br><br>

            <label for="call_type">Call Type (Inbound / Outbound):</label>
            <select id="call_type" name="call_type" required>
                <option value="inbound">Inbound</option>
                <option value="outbound">Outbound</option>
            </select><br><br>

            <label for="type">Type:</label>
            <input type="text" id="type" name="type" required><br><br>

            <label for="sub_type">Sub-Type:</label>
            <input type="text" id="sub_type" name="sub_type" required><br><br>
        </div>

        <div class="right-div">
            <label for="query">Query:</label>
            <input type="text" id="query" name="query" required><br><br>

            <label for="resolution">Resolution:</label>
            <input type="text" id="resolution" name="resolution" required><br><br>

            <label for="resolution_status">Resolution Status:</label>
            <select id="resolution_status" name="resolution_status" required>
                <option value="resolved">Resolved</option>
                <option value="not_resolved">Not Resolved</option>
            </select><br><br>

            <label for="feedback">Feedback:</label>
            <input type="text" id="feedback" name="feedback" required><br><br>

            <label for="remark">Remark:</label>
            <input type="text" id="remark" name="remark" required><br><br>
        </div>

        <div class="bottom-div"></div> <!-- Empty div for spacing -->
        <input type="submit" value="Submit" class="center-btn">
    </form>
</div>



    <?php
    require_once "./Database/dbConnection.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Set parameters
        $customer_id = $_POST['customer_id'];
        $tag_date_time = $_POST['tag_date_time'];
        $call_type = $_POST['call_type'];
        $type = $_POST['type'];
        $sub_type = $_POST['sub_type'];
        $query = $_POST['query'];
        $resolution = $_POST['resolution'];
        $resolution_status = $_POST['resolution_status'];
        $feedback = $_POST['feedback'];
        $remark = $_POST['remark'];

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO Tag_Technical_Resolution (customer_id, tag_date_time, call_type, type, sub_type, query, resolution, resolution_status, feedback, remark) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        if (!$stmt) {
            die("Error: " . $conn->error); // Output the specific error
        }

        // Bind parameters
        $stmt->bind_param("ssssssssss", $customer_id, $tag_date_time, $call_type, $type, $sub_type, $query, $resolution, $resolution_status, $feedback, $remark);

        // Execute statement
        if ($stmt->execute()) {
            echo "Record inserted successfully.";
        } else {
            echo "Error: " . $stmt->error; // Output the specific error
        }

        // Close statement
        $stmt->close();
    }

    $conn->close();
    ?>
</body>
</html>
