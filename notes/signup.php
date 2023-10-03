<?php include 'includes/connection.php';?>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
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

<?php
if (isset($_POST['signup'])) {
require "gump.class.php";
$gump = new GUMP();
$_POST = $gump->sanitize($_POST); 

$gump->validation_rules(array(
  'username'    => 'required|alpha_numeric|max_len,20|min_len,4',
  'name'        => 'required|alpha_space|max_len,30|min_len,3 ',
  'email'       => 'required|valid_email',
  'password'    => 'required|max_len,50|min_len,6',
));
$gump->filter_rules(array(
  'username' => 'trim|sanitize_string',
  'name'     => 'trim|sanitize_string',
  'password' => 'trim',
  'email'    => 'trim|sanitize_email',
  ));
$validated_data = $gump->run($_POST);

if($validated_data === false) {
  ?>
  <center><font color="red" > <?php echo $gump->get_readable_errors(true); ?> </font></center>
  <?php
}
else if ($_POST['password'] !== $_POST['repassword']) 
{
  echo  "<center><font color='red'>Passwords do not match </font></center>";
}
else {
      $username = $validated_data['username'];
      $checkusername = "SELECT * FROM users WHERE username = '$username'";
      $run_check = mysqli_query($conn , $checkusername) or die(mysqli_error($conn));
      $countusername = mysqli_num_rows($run_check); 
      if ($countusername > 0 ) {
    echo  "<center><font color='red'>Username is already taken! try a different one</font></center>";
}
$email = $validated_data['email'];
$checkemail = "SELECT * FROM users WHERE email = '$email'";
      $run_check = mysqli_query($conn , $checkemail) or die(mysqli_error($conn));
      $countemail = mysqli_num_rows($run_check); 
      if ($countemail > 0 ) {
    echo  "<center><font color='red'>Email is already taken! try a different one</font></center>";
}

  else {
      $name = $validated_data['name'];
      $email = $validated_data['email'];
      $pass = $validated_data['password'];
      $password = password_hash("$pass" , PASSWORD_DEFAULT);
      $role = $_POST['role'];
      $course = $_POST['course'];
      $gender = $_POST['gender'];
      $joindate = date("F j, Y");
      $query = "INSERT INTO users(username,name,email,password,role,course,gender,joindate,token) VALUES ('$username' , '$name' , '$email', '$password' , '$role', '$course', '$gender' , '$joindate' , '' )";
      $result = mysqli_query($conn , $query) or die(mysqli_error($conn));
      if (mysqli_affected_rows($conn) > 0) { 
        echo "<script>alert('SUCCESSFULLY REGISTERED');
        window.location.href='login.php';</script>";
}
else {
  echo "<script>alert('Error Occured');</script>";
}
}
}
}
?>
<section class="vh-100" style="background:url('./b2.jpg');">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
              <div class="card" style="border-radius: 1rem;">
                <div class="row g-0">
                  <div class="col-md-6 col-lg-5 d-none d-md-block">
                    <img src="./bb.jpg"
                      alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; height: 43rem" />
                  </div>
                  <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">
      
                      <form method="POST" id="contactform" >
      
                        <div class="d-flex align-items-center mb-3 pb-1">
                          <img src="./GuideFull.jpg" style="width:13rem;border-radius:25px"/>
                        </div>
      
                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Create your account</h5>
                      <div class="row">
                        <div class="col-md-6  mb-4">
                        <div class="form-outline">
                          <input type="text" name="name" id="name" required="" class="form-control form-control-lg" value="<?php if(isset($_POST['signup'])) { echo $_POST['name']; } ?>" />
                          <label class="form-label" for="name">Name</label>
                        </div>
                      </div>
                      <div class="col-md-6 ">
                        <div class="form-outline mb-4">
                          <input type="text" name="email" id="email" required="" class="form-control form-control-lg" value="<?php if(isset($_POST['signup'])) { echo $_POST['email']; } ?>" />
                          <label class="form-label" for="email">Email address</label>
                        </div>
                      </div>
                    </div>
                            <div class="form-outline mb-4">
                            <input type="text" name="username" id="username" required="" class="form-control form-control-lg" value="<?php if(isset($_POST['signup'])) { echo $_POST['username']; } ?>" />
                            <label class="form-label" for="username">Username</label>
                          </div>
                          <div class="row">
                            <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                              <input type="password" name="password" id="password" class="form-control form-control-lg" required />
                                              <label class="form-label" for="password">Password</label>
                                            </div>
                            </div>
                          <div class="col-md-6 ">
                                            <div class="form-outline mb-4">
                                              <input type="password" name="repassword" id="repassword" class="form-control form-control-lg" required/>
                                              <label class="form-label" for="repassword">Confirm Password</label>
                                            </div>
                                        </div>
                          </div><div class="row">
                            <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                              <label class="form-label" for="gender">Gender</label>
                                              <select class="select" name="gender">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                              </select>
                                             
                                            </div>
                            </div>
                          <div class="col-md-6 mb-4">
                                            <div class="form-outline ">
                                              <label class="form-label" for="role">Role</label>
                                              <select class="select" name="role">
                                                <option value="teacher">Teacher</option>
                                                <option value="student">Student</option>
                                              </select>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-outline mb-4">
                                          <label class="form-label" for="course">Field</label>
                                            <select class="select " name="course">
                                              <option value="Computer Science">Computer Science</option>
                                              <option value="Information Technology">Information Technology</option>
                                              <option value="Electronic Communication">Electronic Communication</option>
                                              <option value="Mechanical Engineering">Mechanical Engineering</option>
                                              <option value="AutoMobile Engineering">AutoMobile Engineering</option>
                                              <option value="Civil Engineering">Civil Engineering</option>
                                            </select>
                                        </div>

                          </div>

                        <div class="pt-1 mb-3">
                          <button class="btn btn-dark btn-lg btn-block" name="signup" type="submit" id="submit">Sign Up</button>
                        </div>
      
                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Allready have an account? <a href="login.php"
                            style="color: #393f81;">Login</a></p>
                        
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