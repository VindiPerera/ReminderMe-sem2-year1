<?php

include ('homepageDB/config.php');

$con=new mysqli($dbservername,$dbusername,$dbpassword,$dbname);
 /*// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "RemindMe";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);*/

// Check the connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $date = $_POST["date"];
    $eventDetails = $_POST["eventDetails"];
    $time = $_POST["time"];
    $email = $_POST["email2"];
    $eventReminder = isset($_POST["eventReminder"]) ? "Yes" : "No";
    $billReminder = isset($_POST["billReminder"]) ? "Yes" : "No";

    // Determine the button clicked
    if (isset($_POST["addReminder"])) {
        // Add reminder to the database
        $sql = "INSERT INTO reminder (date, event_details, time, email2, event_reminder, bill_reminder)
                VALUES ('$date', '$eventDetails', '$time', '$email', '$eventReminder', '$billReminder')";

        if ($con->query($sql) === TRUE) {
            echo "<script>alert('Reminder Added Successfully');  window.location.href = \"retrieve_data.php\";</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
            // Debugging: Output the values of variables
            var_dump($date, $eventDetails, $time, $email2, $eventReminder, $billReminder);
        }
    }
}

// Close the database connection
$con->close();
?>
