<?php
session_start();
include('connection.php');
if (isset($_SESSION['role'])) {
	
}
else {
    echo "<script>alert('you need to login first');
    window.location.href='../index.php';</script>";	
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Dashboard - <?php echo $_SESSION['username']; ?></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="../GuideFullLogo.jpg" type="image/x-icon" />
    <script src="js/tinymce/tinymce.min.js"></script>
    <script src="js/tinymce/script.js"></script>
    
    <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body>
