<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="./css/profileCss.css">
    <title>Operator Profile</title>
    <script>
        function showPreview(imageUrl) {
        window.open(imageUrl, '_blank', 'width=400,height=400');
        }

    </script>

</head>
<body>
    <div id="customer-details" class="info-box">
        
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crm";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["customer_id"])) {
    $customer_id = $_GET["customer_id"];

    $sql = "SELECT * FROM operatormaininfo WHERE mob_no = '$customer_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='ui-box-container'>";
            echo "<div class='ui-box-sub1'>";
            echo "<div class='ui-box'>";
            echo "<h3>Operator's Details</h3>";
            echo "<p>Mobile No: " . $row["mob_no"] . "</p>";
            echo "<p>Operator Name: " . $row["Operator_Name"] . "</p>";
            echo "<p>Operator ID: " . $row["Operator_ID"] . "</p>";
            echo "<p>NSCIT Certificate No: " . $row["NSCIT_Certificate_No"] . "</p>";
            echo "<p>Aadhar Operator ID: " . $row["Aadhar_Operator_ID"] . "</p>";
            echo "<p>Project: " . $row["Project"] . "</p>";
            echo "<p>Important Notification: " . $row["Important_Notification"] . "</p>";
            echo "<p>Activation Status: " . $row["Activation_Status"] . "</p>";
            echo "</div>";
            

        }
    } else {
        echo "0 results";
    }

    $sql = "SELECT * FROM document_details WHERE mob_no = '$customer_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
           
            echo "<div class='ui-box'>";
            
           
            echo "<img  src=\"" . $row["Profile_Picture"] . "\" id = 'photo' style='width: 100px; height: 100px;' onclick='showPreview(\"" . $row["Profile_Picture"] . "\")'></p>";

            echo "<p id='photo-text'>Profile Picture";
            echo "<h3>Document Details</h3>";

            echo "<p>Aadhar Card No: " . $row["Aadhar_Card_No"] . "</p>";
            echo "<p>Aadhar Card Preview: <a href='#' onclick='showPreview(\"" . $row["AdPreview"] . "\")'>View Preview</a></p>";
            echo "<p>PAN Card No: " . $row["Pan_Card_No"] . "</p>";
            echo "<p>PAN Card Preview: <a href='#' onclick='showPreview(\"" . $row["PanPreview"] . "\")'>View Preview</a></p>";
            echo "<p>NSCIT Certificate No: " . $row["NSCIT_Certificate_No"] . "</p>";
            echo "<p>NSCIT Certificate Preview: <a href='#' onclick='showPreview(\"" . $row["NSPreview"] . "\")'>View Preview</a></p>";
            echo "<p>Highest Qualification Degree: " . $row["Highest_Qualification_Degree"] . "</p>";
            echo "<p>Certificate Preview: <a href='#' onclick='showPreview(\"" . $row["Certificate_Preview"] . "\")'>View Preview</a></p>";
            echo "</div>";
           


        
            echo "<div class='ui-box'>";
            echo "<h3>Bank Details</h3>";
            echo "<p>Bank Name: " . $row["Bank_Name"] . "</p>";
            echo "<p>Branch Name: " . $row["Branch_Name"] . "</p>";
            echo "<p>Branch Location: " . $row["Branch_Location"] . "</p>";
            echo "<p>Account Number: " . $row["Account_no"] . "</p>";
            echo "<p>IFSC Code: " . $row["IFSC_Code"] . "</p>";
            echo "</div>";
            echo "</div>";
           

        }
    } else {
        echo "0 results";
    }

    $sql = "SELECT * FROM bank_account_cancel_cheque_preview WHERE mob_no = '$customer_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='ui-box-sub2'>";
            echo "<div class='ui-box'>";
            echo "<h3>Bank Account Cancel Cheque Preview </h3>";
            echo "<p>Agreement Preview: <a href='" . $row["Agreement"] . "' target='_blank'>View Image</a></p>";
            echo "<p>Undertaking Preview: <a href='" . $row["Undertaking"] . "' target='_blank'>View Image</a></p>";
            echo "<p>Declaration Preview: <a href='" . $row["Declaration"] . "' target='_blank'>View Image</a></p>";
            echo "<p>Security Deposit Payment Slip Preview: <a href='" . $row["Security_Deposit_Payment_Slip"] . "' target='_blank'>View Image</a></p>";
            echo "</div>";
          
        }
    } else {
        echo "0 results";
    }

    $sql = "SELECT * FROM Contact_Details WHERE mob_no = '$customer_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
      
            echo "<div class='ui-box'>";
            echo "<h3>Contact Details</h3>";
            echo "<p>Mobile No: " . $row["mob_no"] . "</p>";
            echo "<p>Whatsapp No: " . $row["Whatsapp_No"] . "</p>";
            echo "<p>Alternate Contact No: " . $row["Alternate_Contact_No"] . "</p>";
            echo "<p>Personal Mail ID: " . $row["Personal_Mail_ID"] . "</p>";
            echo "<p>Official Mail ID: " . $row["Official_Mail_ID"] . "</p>";
            echo "<p>Communication Address: " . $row["Communication_Address"] . "</p>";
            echo "<p>Permanent Address: " . $row["Permanent_Address"] . "</p>";
            echo "</div>";
         
        }
    } else {
        echo "0 results";
    }

    $sql = "SELECT * FROM Personal_Information WHERE mob_no = '$customer_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
      
            echo "<div class='ui-box'>";
            echo "<h3>Personal Information</h3>";
            echo "<p>Mobile No: " . $row["mob_no"] . "</p>";
            echo "<p>Gender: " . $row["Gender"] . "</p>";
            echo "<p>Date Of Birth: " . $row["Date_Of_Birth"] . "</p>";
            echo "<p>Blood Group: " . $row["Blood_Group"] . "</p>";
            echo "<p>Emergency Contact Person Name: " . $row["Emergency_Contact_Person_Name"] . "</p>";
            echo "<p>Relationship: " . $row["Relationship"] . "</p>";
            echo "<p>Address: " . $row["Address"] . "</p>";
            echo "<p>In Case Emergency Contact No: " . $row["In_Case_Emergency_Contact_No"] . "</p>";
            echo "</div>";
            echo "</div>";
            echo "</div>";

        }
    } else {
        echo "0 results";
    }


}

$conn->close();
?>

    </div>

    
</body>
</html>
