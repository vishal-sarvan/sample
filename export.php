<?php
session_start();

// Database connection
$server = "localhost:3307";
$username = "root";
$password = "";
$dbname = "stirlingrak";

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Filename for the exported CSV
$filename = 'AttendanceRecord-' . date('Y-m-d') . '.csv';

// Query to fetch attendance records
$query = "SELECT id, STUDENTID, TIMEIN, TIMEOUT, LOGDATE FROM attendance";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Error executing query: " . mysqli_error($conn));
}

// Open file in write mode
$file = fopen($filename, "w");

// Header row for the CSV file
$headers = array("ID", "STUDENT ID", "TIME IN", "TIME OUT", "LOG DATE");
fputcsv($file, $headers);

// Fetch and write each row to the CSV file
while ($row = mysqli_fetch_assoc($result)) {
    $ID = $row['id'] ?? '';          // Use column name 'id'
    $STUDENTID = $row['STUDENTID'] ?? '';
    $TIMEIN = $row['TIMEIN'] ?? '';
    $TIMEOUT = $row['TIMEOUT'] ?? '';
    $LOGDATE = $row['LOGDATE'] ?? '';

    // Add row to CSV
    $data = array($ID, $STUDENTID, $TIMEIN, $TIMEOUT, $LOGDATE);
    fputcsv($file, $data);
}

// Close the file
fclose($file);

// Set headers for file download
header("Content-Description: File Transfer");
header("Content-Disposition: Attachment; filename=$filename");
header("Content-Type: application/vnd.ms-excel;");

// Output file for download
readfile($filename);

// Delete file after download
unlink($filename);

// Exit script
exit();
?>
