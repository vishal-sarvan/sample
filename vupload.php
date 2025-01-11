<?php
include_once 'config.php';

if (isset($_POST['submit'])) {
    // Allowed MIME types
    $fileMimes = array(
        'text/x-comma-separated-values',
        'text/comma-separated-values',
        'application/octet-stream',
        'application/vnd.ms-excel',
        'application/x-csv',
        'text/x-csv',
        'text/csv',
        'application/csv',
        'application/excel',
        'application/vnd.msexcel',
        'text/plain'
    );

    // Validate whether the selected file is a CSV file
    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $fileMimes)) {
        // Open uploaded CSV file with read-only mode
        $csvFile = fopen($_FILES['file']['tmp_name'], 'r');

        // Skip the first line (CSV headers)
        fgetcsv($csvFile);

        // Parse data from CSV file line by line
        while (($row = fgetcsv($csvFile, 10000, ",")) !== FALSE) {
            // Map CSV data to variables
            $unique_id = $row[0] ?? null;
            $student_id = $row[1] ?? null;
            $first_name = $row[2] ?? null;
            $middle_name = $row[3] ?? null;
            $last_name = $row[4] ?? null;

            // Check if the student already exists in the database
            $query = "SELECT * FROM student WHERE STUDENTID = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $student_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Update the existing record
                $update_query = "UPDATE student SET 
                    Unique_ID = ?, FIRSTNAME = ?, MNAME = ?, LASTNAME = ?
                    WHERE STUDENTID = ?";
                $update_stmt = $conn->prepare($update_query);
                $update_stmt->bind_param("sssss", $unique_id, $first_name, $middle_name, $last_name, $student_id);
                $update_stmt->execute();
            } else {
                // Insert a new record
                $insert_query = "INSERT INTO student (Unique_ID, STUDENTID, FIRSTNAME, MNAME, LASTNAME) 
                    VALUES (?, ?, ?, ?, ?)";
                $insert_stmt = $conn->prepare($insert_query);
                $insert_stmt->bind_param("sssss", $unique_id, $student_id, $first_name, $middle_name, $last_name);
                $insert_stmt->execute();
            }
        }

        // Close the CSV file
        fclose($csvFile);

        echo "File data successfully processed!";
        header("Location: vupload.php");
        exit;
    } else {
        echo "Please select a valid CSV file.";
    }
}
?>
