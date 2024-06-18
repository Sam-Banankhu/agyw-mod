<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "agyw";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data into the child_visit table
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $meetingDates = $_POST["meeting_date"];
    $agesAtVisit = $_POST["age_at_visit"];

    // Prepare and execute SQL statements for each row of data
    for ($i = 0; $i < count($meetingDates); $i++) {
        $meetingDate = $meetingDates[$i];
        $ageAtVisit = $agesAtVisit[$i];

        $sql = "INSERT INTO child_visit (meeting_date, age_at_visit) VALUES ('$meetingDate', '$ageAtVisit')";
        if ($conn->query($sql) !== TRUE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    echo "Data saved successfully";
}

$conn->close();
?>
