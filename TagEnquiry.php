<!DOCTYPE html>
<html>
<head>
    <title>Tag Enquiry</title>
    <link rel="stylesheet" href="./css/tagEnquiryCss.css">
</head>
<body>
    <div class="container">
        <h2>Tag Enquiry</h2>
        <form action="" method="post">
            <div class="form-wrapper">
                <div class="form-section left-section">
                    <label for="tag_date_time">Date & Time:</label>
                    <input type="datetime-local" id="tag_date_time" name="tag_date_time">

                    <label for="call_type">Call:</label>
                    <select id="call_type" name="call_type">
                        <option value="Inbound">Inbound</option>
                        <option value="Outbound">Outbound</option>
                    </select>

                    <label for="type">Type:</label>
                    <input type="text" id="type" name="type" placeholder="ex,. Support">

                    <label for="sub_type">Sub-Type:</label>
                    <input type="text" id="sub_type" name="sub_type" placeholder="ex,. Technical">
                </div>
                <div class="form-section right-section">
                    <label for="query">Query:</label>
                    <textarea id="query" name="query"></textarea>

                    <label for="resolution">Resolution:</label>
                    <textarea id="resolution" name="resolution"></textarea>

                    <label for="feedback">Feedback:</label>
                    <input type="text" id="feedback" name="feedback">

                    <label for="resolution_status">Resolution Status:</label>
                    <select id="resolution_status" name="resolution_status">
                        <option value="resolved">Resolved</option>
                        <option value="unresolved">Unresolved</option>
                    </select>
                </div>
            </div>
            <div class="bottom-section">
                <label for="customer_id">Customer Id:</label>
                <input type="text" id="customer_id" name="customer_id">
                <label for="remark">Remark:</label>
                <textarea id="remark" name="remark"></textarea>

                <div class="button-wrapper">
                    <input type="submit" value="Submit">
                </div>
            </div>
        </form>
    </div>
    <?php
    // Database connection
    require_once "./Database/dbConnection.php";


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Escape user inputs for security
        $customer_id = $_POST['customer_id'];
        $Tag_Date_Time = $_POST['tag_date_time'];
        $Call_Type = $_POST['call_type'];
        $Type = $_POST['type'];
        $Sub_Type = $_POST['sub_type'];
        $Query = $_POST['query'];
        $Resolution = $_POST['resolution'];
        $Resolution_Status = $_POST['resolution_status'];
        $Remark = $_POST['remark'];
    
        // Prepare SQL statement to insert data into tag_enquiry table
        $sql = "INSERT INTO tag_enquiry (customer_id, Tag_Date_Time, Call_Type, Type, Sub_Type, Query, Resolution,  Resolution_Status, Remark)
                VALUES ('$customer_id', '$Tag_Date_Time', '$Call_Type', '$Type', '$Sub_Type', '$Query', '$Resolution',  '$Resolution_Status', '$Remark')";
    
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    

    $conn->close();
    ?>
</body>
</html>
