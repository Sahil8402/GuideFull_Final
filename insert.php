<?php

$link = mysqli_connect("localhost:3308", "root", "", "notes");


if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$first_name =  $_REQUEST['sender'];
$email = $_REQUEST['email'];
$Subject =  $_REQUEST['subject'];
$message =  $_REQUEST['message'];

$sql = "INSERT INTO contact (Name,Email,Subject,Message) VALUES ('$first_name', '$email','$Subject' ,'$message')";
if (mysqli_query($link, $sql)) {
    header("location:done.html");
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($link);
