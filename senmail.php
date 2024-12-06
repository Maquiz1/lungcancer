<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form data
    $requesterName = $_POST["requester_name"];
    $requestDetails = $_POST["request_details"];
    $respondentEmail = $_POST["respondent_email"];

    // Save data to database (you need to implement this)
    // For example, using MySQL
    // $conn = new mysqli($servername, $username, $password, $dbname);
    // $sql = "INSERT INTO requests (requester_name, request_details, respondent_email) VALUES ('$requesterName', '$requestDetails', '$respondentEmail')";
    // $conn->query($sql);

    // Send email notification
    $to = $respondentEmail;
    $subject = "New Request";
    $message = "Hello, you have a new request. Please review it here: http://example.com/requests";
    $headers = "From: your_email@example.com";
    mail($to, $subject, $message, $headers);

    echo "Request submitted successfully.";
}
?>

<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    Requester Name: <input type="text" name="requester_name"><br>
    Request Details: <textarea name="request_details"></textarea><br>
    Respondent Email: <input type="email" name="respondent_email"><br>
    <input type="submit" value="Submit Request">
</form>