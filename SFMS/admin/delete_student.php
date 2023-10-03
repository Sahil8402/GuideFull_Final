<?php
require_once 'conn.php';

if (isset($_POST['stud_id'])) {
    $stud_id = $_POST['stud_id'];

    // Check if the student ID exists in the database
    $query = mysqli_query($conn, "SELECT * FROM `student` WHERE `stud_id` = '$stud_id'");
    if (mysqli_num_rows($query) > 0) {
        $fetch = mysqli_fetch_array($query);
        $stud_no = $fetch['stud_no'];

        // Define the directory path for student files
        $studentFilesDir = "../files/$stud_no";

        // Check if the directory exists before attempting to delete
        if (is_dir($studentFilesDir)) {
            // Remove all files and subdirectories inside the student's directory
            removeDir($studentFilesDir);

            // Delete the student record from the database
            $deleteQuery = "DELETE FROM `student` WHERE `stud_id` = '$stud_id'";
            if (mysqli_query($conn, $deleteQuery)) {
                echo "Student record and associated files have been deleted successfully.";
            } else {
                echo "Error deleting student record: " . mysqli_error($conn);
            }
        } else {
            echo "Student files directory not found.";
        }
    } else {
        echo "Student record not found with ID: $stud_id";
    }
}

function removeDir($dir) {
    $items = scandir($dir);
    foreach ($items as $item) {
        if ($item === '.' || $item === '..') {
            continue;
        }
        $path = $dir . '/' . $item;
        if (is_dir($path)) {
            removeDir($path); // Recursively remove subdirectories and files
        } else {
            unlink($path); // Delete individual files
        }
    }
    rmdir($dir); // Remove the empty directory
}
?>
