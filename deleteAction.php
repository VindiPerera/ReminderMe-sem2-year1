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

    $id = $_GET['id'];

    $sql = "DELETE FROM reminder WHERE id=". $id;

    if ($con->query($sql) === TRUE) {
        echo "<script>
            alert('Record Deleted.');
            window.location.href = \"retrieve_data.php\";
        </script>";
    } else {
        echo "Error deleting record: " . $con->error;
    }
?>