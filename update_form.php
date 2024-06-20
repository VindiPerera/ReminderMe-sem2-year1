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
    $id = $_POST["id"];



        // Add reminder to the database
        $sql = "UPDATE  reminder SET date='".$date."',event_details='".$eventDetails."',time='".$time."',email2='".$email."' WHERE id='".$id."'";

        if ($con->query($sql) === TRUE) {
            echo "<script>alert('Reminder Updated Successfully');  window.location.href = \"retrieve_data.php\";</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            // Debugging: Output the values of variables
            var_dump($date, $eventDetails, $time, $email, $eventReminder, $billReminder);
        }
    
}

// Close the database connection
$con->close();
?>
