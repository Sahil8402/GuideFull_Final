<?php
include('connection.php');

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $sql = "SELECT email FROM user WHERE reset_token='$token'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $reset_email = $row['email'];
    } else {
        echo "Invalid token.";
        exit();
    }
} else {
    echo "Token not provided.";
    exit();
}

if (isset($_POST['reset_password'])) {
    $new_password = $_POST['new_password'];
    // Add password validation and hashing as necessary
    
    // Update the user's password and clear the reset token
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    $update_sql = "UPDATE user SET password='$hashed_password', reset_token=NULL WHERE email='$reset_email'";
    $update_result = mysqli_query($conn, $update_sql);

    if ($update_result) {
        echo "Password reset successfully. You can now <a href='login.php'>login</a> with your new password.";
        exit();
    } else {
        echo "Password reset failed. Please try again.";
    }
}
?>

<h2><b>RESET PASSWORD</B></h2>
<form method="post">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4"><?php echo @$err;?></div>
    </div>
    <div class="row">
        <div class="col-sm-4">New Password</div>
        <div class="col-sm-5">
            <input type="password" name="new_password" class="form-control"/>
        </div>
    </div>
    <div class="row" style="margin-top:10px">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <input type="submit" value="Reset Password" name="reset_password" class="btn btn-success"/>
        </div>
    </div>
</form>
