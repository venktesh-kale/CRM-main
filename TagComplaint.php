<!DOCTYPE html>
<html>
<head>
    <title>Tag Complaint</title>
    <link rel="stylesheet" href="./css/tagComplaintCss.css">
</head>
<body>
    <div class="container">
        <h2>Tag Complaint</h2>
        <form action="" method="post">
            <div class="form-wrapper">
                <div class="form-section left-section">
                    <label for="customer_id">Mobile Number:</label>
                    <input type="text" id="customer_id" name="customer_id" required>

                    <label for="tag_date_time">Date & Time:</label>
                    <input type="datetime-local" id="tag_date_time" name="tag_date_time" required>

                    <label for="call_type">Call:</label>
                    <select id="call_type" name="call_type" required>
                        <option value="Inbound">Inbound</option>
                        <option value="Outbound">Outbound</option>
                    </select>

                    <label for="type">Type:</label>
                    <input type="text" id="type" name="type" placeholder="ex,. Support" required>

                    <label for="sub_type">Sub-Type:</label>
                    <input type="text" id="sub_type" name="sub_type" placeholder="ex,. Technical" required>

                    <label for="complaint_issue">Complaint Issue:</label>
                    <input type="text" id="complaint_issue" name="complaint_issue" required>

                    <label for="escalation_desk">Escalation Desk:</label>
                    <input type="text" id="escalation_desk" name="escalation_desk" required>
                </div>
                <div class="form-section right-section">
                    <label for="escalation_remark">Escalation Remark:</label>
                    <textarea id="escalation_remark" name="escalation_remark" required></textarea>

                    <label for="resolution_tat">Resolution TAT:</label>
                    <input type="text" id="resolution_tat" name="resolution_tat" required>

                    <label for="resolution_status">Resolution Status:</label>
                    <select id="resolution_status" name="resolution_status" required>
                        <option value="resolved">Resolved</option>
                        <option value="unresolved">Unresolved</option>
                    </select>

                    <label for="complaint_handle">Complaint Handle:</label>
                    <input type="text" id="complaint_handle" name="complaint_handle" required>

                    <label for="complaint_remark">Complaint Remark:</label>
                    <textarea id="complaint_remark" name="complaint_remark" required></textarea>
                </div>
            </div>
            <div class="bottom-section">
                <div class="button-wrapper">
                    <input type="submit" value="Submit">
                </div>
            </div>
        </form>
    </div>
    <?php
    // Database connection
    require_once "./Database/dbConnection.php";


    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Prepare and bind the SQL statement
        $stmt = $conn->prepare("INSERT INTO TagComplaint (mob_no, tag_date_time, call_type, type, sub_type, complaint_issue, escalation_desk, escalation_remark, resolution_tat, resolution_status, complaint_handle, complaint_remark) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssssss", $customer_id, $tag_date_time, $call_type, $type, $sub_type, $complaint_issue, $escalation_desk, $escalation_remark, $resolution_tat, $resolution_status, $complaint_handle, $complaint_remark);

        // Set parameters and execute
        $customer_id = $_POST['customer_id'];
        $tag_date_time = $_POST['tag_date_time'];
        $call_type = $_POST['call_type'];
        $type = $_POST['type'];
        $sub_type = $_POST['sub_type'];
        $complaint_issue = $_POST['complaint_issue'];
        $escalation_desk = $_POST['escalation_desk'];
        $escalation_remark = $_POST['escalation_remark'];
        $resolution_tat = $_POST['resolution_tat'];
        $resolution_status = $_POST['resolution_status'];
        $complaint_handle = $_POST['complaint_handle'];
        $complaint_remark = $_POST['complaint_remark'];

        if ($stmt->execute()) {
            echo "New record inserted successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    $conn->close();
    ?>
</body>
</html>
