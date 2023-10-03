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
<?php include 'includes/connection.php';?>
<?php
if (isset($_POST['recover'])) {
$email = mysqli_real_escape_string($conn , $_POST['email']);
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
$query = "SELECT email FROM users WHERE email = '$email'";
$run = mysqli_query($conn , $query) or die (mysqli_error($conn) );
if (mysqli_num_rows($run) > 0) {
	function generateRandomString($length = 5) {
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
}
 
$token_tmp = generateRandomString();
$token = md5($token_tmp);
$url = $_SERVER['REQUEST_URI'];
$parts = explode('/',$url);
$dir = $_SERVER['SERVER_NAME'];
for ($i = 0; $i < count($parts) - 1; $i++) {
 $dir .= $parts[$i] . "/";
}
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'sahilgandhi0810@gmail.com';          // SMTP username
$mail->Password = 'ppptasrssxdddjgi'; // SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                          // TCP port to connect to

$mail->setFrom('GuideFull@gmail.com', 'Admin');
$mail->addReplyTo('GuideFull@gmail.com', 'Admin');
$mail->addAddress($email);

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<h1>Recover Password Link: </h1>';
$bodyContent .= 'http://' . $dir . 'verifytoken.php?token='.$token;

$mail->Subject = 'Email from GuideFull ';
$mail->Body    = $bodyContent;


$query2 = "UPDATE users set token = '$token' WHERE email = '$email'";
$run = mysqli_query($conn , $query2) or die(mysqli_error($conn));
$count = mysqli_affected_rows($conn);
if($mail->send() && ($count > 0)) {
	echo "<h1><center> <font color = 'green' >Email with recover password link has been sent </font><center> </h1>" ;
} else {

    echo  "<center> <font color = 'red' >'Message could not be sent.'</font><center> ";
    echo  "<center> <font color = 'red' >'Mailer Error: ' . $mail->ErrorInfo </font><center> ";
}
}
else {
	echo "<center> <font color = 'red' > Entered email does not match to any record </font><center> ";
}
}
else {
	echo "<center> <font color = 'red' > Invalid email type </font><center> ";
}
}

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
      
                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Recover Password</h5>
      
                        <div class="form-outline mb-4">
                          <input type="text" name="email" class="form-control form-control-lg" required/>
                          <label class="form-label" >Email</label>
                        </div>
    
                        <div class="pt-1 mb-4">
                          <button class="btn btn-dark btn-lg btn-block" type="submit" name="recover" type="button">Recover Password</button>
                        </div>
      
                        <div class="login-help">
    <a href="signup.php">Register</a> • <a href="login.php">Login</a>
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
    <h1>Recover Password</h1><br>
  <form action = "" method="POST">
    <input type="text" name="email" placeholder="Enter your Email" required="">
     <input type="submit" name="recover" class="login login-submit" value="send">
  </form>
    
  <div class="login-help">
    <a href="signup.php">Register</a> • <a href="login.php">Login</a>
  </div>
</div> -->

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>

  
</body>
</html>
 
