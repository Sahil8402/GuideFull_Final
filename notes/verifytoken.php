<link rel="icon" href="GuideFullLogo.jpg" type="image/x-icon" />
<link
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
rel="stylesheet"
/>
<!-- Google Fonts -->
<link
href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
rel="stylesheet"
/>
<!-- MDB -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css"
rel="stylesheet"
/>
<?php include ('includes/connection.php'); ?>
<?php
if (!empty($_GET['token'])) {	
$token = mysqli_real_escape_string($conn , $_GET['token']);
$query = "SELECT token FROM users WHERE token = '$token' ";
$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
if (mysqli_num_rows($run) > 0) {
	?>
	<section class="vh-100" style="background:url('./b2.jpg')">
     <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
              <div class="card" style="border-radius: 1rem;">
                <div class="row g-0">
                  <div class="col-md-6 col-lg-5 d-none d-md-block">
                    <img src="./bb.jpg"
                      alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                  </div>
                  <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">
      
                      <form action="" method="post">     
                        <div class="d-flex align-items-center mb-3 pb-1">
                         <img src="./GuideFull.jpg" style="width:15rem;border-radius:25px"/>
                        </div>
      
                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Change Password</h5>
      
                        <div class="form-outline mb-4">
						<input type="password" name="password" placeholder="Enter New Password"  class="form-control form-control-lg" required="">
                           <label class="form-label" >New Password</label>
                        </div>
						<div class="form-outline mb-4">
						<input type="password" name="repassword" placeholder="Confirm New Password" class="form-control form-control-lg" required="">
                           <label class="form-label" >Confirm New Password</label>
                        </div>
    
                        <div class="pt-1 mb-4">
                          <button class="btn btn-dark btn-lg btn-block" type="submit" name="change" >Submit</button>
                        </div>

                      </form>
      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section> 
      <!-- MDB -->
<script
type="text/javascript"
src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"
></script>
	<!-- <div class="login-card">
    <h1>Change Password</h1><br>
  <form action = "" method="POST">
    <input type="password" name="password" placeholder="Enter New Password" required="">
    <input type="password" name="repassword" placeholder="Confirm New Password" required="">
     <input type="submit" name="change" class="login login-submit" value="submit">
  </form> -->
   <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
<?php 
     if (isset($_POST['change'])) {
     	$password = mysqli_real_escape_string($conn , $_POST['password']);
     	$repassword = mysqli_real_escape_string($conn , $_POST['repassword']);
     	if (strlen($password) < 6 ) {
     		echo "<center> <font color = 'red' > Password should be atleast 6 characters long !</font><center> ";
     	} 
     	else if ($password == $repassword) {
     	$newpassword = password_hash("$password" , PASSWORD_DEFAULT);
	$query1 = "UPDATE users SET token = '' , password = '$newpassword' WHERE token = '$token' ";
	$run = mysqli_query($conn , $query1) or die(mysqli_error($conn));
	if (mysqli_affected_rows($conn) > 0) {
		echo "<center> <font color = 'green' > Password Changed Successfully </font><center> " . " " . "<a href='login.php'>login</a>" ;
	}
	else {
		echo "<center> <font color = 'red' > Error Occured !</font><center> " ;
	}
}
else {
	echo "<center> <font color = 'red' > Passwords do not match</font><center> " ;
	}
}
}
else {
	echo "something went wrong " . " <a href=recoverpassword.php> Try again </a> ";
}
}
else {
	header("location: index.php");
}
?>
