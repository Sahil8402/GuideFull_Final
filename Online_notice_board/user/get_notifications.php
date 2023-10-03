<?php
include('../connection.php');

// Query to get the count of notifications
$query = "SELECT COUNT(*) AS count FROM notice";
$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];
    echo json_encode(['count' => $count]);
} else {
    echo json_encode(['count' => 0]); // Handle database error
}
?>
