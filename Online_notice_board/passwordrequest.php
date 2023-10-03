<?php
include('connection.php');
extract($_POST);

if (isset($forgot_password)) {
    if ($forgot_email == "") {
        $err = "<font color='red'>Please enter your email address</font>";
    } else {
        // Generate a unique token (e.g., a random string)
        $token = 'kajc oetx zbnq vwye';

        // Save the token and email in the database
        $sql = "UPDATE user SET reset_token='$token' WHERE email='$forgot_email'";
        $update_result = mysqli_query($conn, $sql);

        if ($update_result) {
            // Send a reset email with the token link
            $reset_link = "http://localhost/Guidefull/Online_notice_board/reset_password.php?token=$token"; // Replace with your website URL
            $to = $forgot_email;
            $subject = "Password Reset";
            $message = "Dear user,\n\n";
            $message .= "You have requested a password reset. Click the link below to reset your password:\n";
            $message .= $reset_link;
            $headers = "From: sahilgandhi0810@gmail.com"; // Replace with your email address
            
            // Send the reset email
            if (mail($to, $subject, $message, $headers)) {
                $err = "<font color='green'>Password reset link sent to your email. Please check your inbox.</font>";
            } else {
                $err = "<font color='red'>Error sending the reset email. Please try again later.</font>";
            }
        } else {
            $err = "<font color='red'>Invalid email address. Please enter a registered email.</font>";
        }
    }
}
?>
