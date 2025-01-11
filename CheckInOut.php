<?php
include 'config.php'; // Include your database connection

// Validate and sanitize input
if (!isset($_POST['studentID']) || empty(trim($_POST['studentID']))) {
    die("Error: Missing student ID in the request.");
}

$studentID = mysqli_real_escape_string($conn, $_POST['studentID']);
$logdate = date('Y-m-d'); // Current date
$current_time = date('H:i:s'); // Current time

// Check if student exists in the student table
$check_student = "SELECT * FROM student WHERE studentID = '$studentID'";
$student_result = $conn->query($check_student);

if ($student_result->num_rows == 0) {
    die("Error: Student ID does not exist in the system.");
}

// Check if an entry already exists for the current date in the attendance table
$query = "SELECT * FROM attendance WHERE STUDENTID = '$studentID' AND LOGDATE = '$logdate'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Update TIMEOUT if the record already exists
    $update_query = "UPDATE attendance SET TIMEOUT = '$current_time' 
                     WHERE STUDENTID = '$studentID' AND LOGDATE = '$logdate'";
    if ($conn->query($update_query)) {
        echo "Timeout recorded successfully!";
        $_SESSION['success'] = "Timeout recorded successfully!";
    } else {
        echo "Error updating timeout: " . $conn->error;
        $_SESSION['error'] = "Error updating timeout: " . $conn->error;
    }
} else {
    // Insert a new record for TIMEIN if no entry exists
    $insert_query = "INSERT INTO attendance (STUDENTID, LOGDATE, TIMEIN) 
                     VALUES ('$studentID', '$logdate', '$current_time')";
    if ($conn->query($insert_query)) {
        echo "Timein recorded successfully!";
        $_SESSION['success'] = "Timein recorded successfully!";
    } else {
        echo "Error inserting timein: " . $conn->error;
        $_SESSION['error'] = "Error inserting timein: " . $conn->error;
    }
}

$conn->close();
header("Location: login.php");
exit;
?>
