<?php 
session_start();
include('../connection.php');
$user= $_SESSION['user'];
$sql=mysqli_query($conn,"select * from user where email='$user' ");
$users=mysqli_fetch_assoc($sql);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="../../images/GuideFullLogo.jpg" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>GuideFull Notice Board User Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<style>

#notification-icon {
    position: relative;
    display: inline-block;
    font-size: 23px;
    padding: 8px 8px;

}

#notification-counter {
    position: absolute;
    top: 0;
    right: 0;
    color: red;
    border-radius: 50%;  
    font-size: 20px; 
}

  </style>
  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <img src="../../images/GuideFull.jpg" style="height:29px;width:130px;border-radius:20px;margin-top:10px;float:left"> 
          <a class="navbar-brand" href="#"> &nbsp;Hello <?php echo $users['name'];?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          
          <ul class="nav navbar-nav navbar-right">
        
          <div id="notification-icon" >
    <a href="./notify.php" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"><i class="fa fa-bell"></i>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#"><?php include('./notify.php');?></a>
  </div>
  </a>
    <span id="notification-counter"><?php
// Query to count the total number of notifications
$Myemail=$users['email'];
$countQuery = mysqli_query($conn, "SELECT COUNT(*) AS total FROM notice Where user='$Myemail'");
$countData = mysqli_fetch_assoc($countQuery);
$rr = $countData['total'];?>
<?php
echo $rr;?>

</span>
</div>


            <li><a href="logout.php">Logout</a></li>
          </ul>
          <!--<form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>-->
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="index.php">Dashboard <span class="sr-only">(current)</span></a></li>
			<!-- find users' image if image not found then show dummy image -->
			
			<!-- check users profile image -->
			<?php 
			$q=mysqli_query($conn,"select image from user where email='".$_SESSION['user']."'");
			$row=mysqli_fetch_assoc($q);
			if($row['image']=="")
			{
			?>
            <li><a href="index.php?page=update_profile_pic"><img title="Update Your profile pic Click here" style="border-radius:50px" src="../images/person.jpg" width="100" height="100" alt="not found"/></a></li>
			<?php 
			}
			else
			{
			?>
			<li><a href="index.php?page=update_profile_pic"><img title="Update Your profile pic Click here"  style="border-radius:50px" src="../images/<?php echo $_SESSION['user'];?>/<?php echo $row['image'];?>" width="100" height="100" alt="not found"/></a></li>
			<?php 
			}
			?>
			
			
			
			<li><a href="index.php?page=update_password"><span class="glyphicon glyphicon-user"></span> Update Password</a></li>
            <li><a href="index.php?page=update_profile"><span class="glyphicon glyphicon-user"></span> Update Profile</a></li>
			 <li><a href="index.php?page=notification"><span class="glyphicon glyphicon-envelope"></span> Notification</a></li>
            
          </ul>
         
         
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <!-- container-->
		  <?php 
		@$page=  $_GET['page'];
		  if($page!="")
		  {
		  	if($page=="update_password")
			{
				include('update_password.php');
			
			}
			if($page=="notification")
			{
				include('notification.php');
			
			}
			if($page=="update_profile")
			{
				include('update_profile.php');
			
			}
			if($page=="update_profile_pic")
			{
				include('update_profile_pic.php');
			
			}
		  }
		  else

		  {?>
       <h1 class="page-header">Dashboard</h1>
        <div class="col-12">
				<div class="panel panel-default">
					<div class="panel-heading"><b>About GuideFull News</b></div>
					<div class="panel-body">
						In an era where information flows ceaselessly and knowledge is paramount, staying informed about the latest developments in the field of education is essential. Whether you're a student, educator, parent, or simply someone passionate about the world of learning, GuideFull News is here to provide you with a comprehensive and reliable source of education-related news.We invite you to become a part of our growing community of educators, students, parents, and education enthusiasts. Subscribe to our newsletter, follow us on social media, and engage with our content to stay connected with the latest in education.We invite you to become a part of our growing community of educators, students, parents, and education enthusiasts. Subscribe to our newsletter, follow us on social media, and engage with our content to stay connected with the latest in education.
					</div>
				</div>

			</div>
		  
		  <!-- container end-->
		   
		  
		 
		  
		  
<?php } ?>
          
         
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../js/ie10-viewport-bug-workaround.js"></script>
    <script>
    // Function to update the notification counter dynamically
    function updateNotificationCounter() {
        // Use AJAX to fetch the updated notification count
        $.ajax({
            url: 'get_notification_count.php', // PHP script to get the notification count
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                var newNotificationCount = response.count;
                $('#notification-counter').text(newNotificationCount);
            },
            error: function(error) {
                console.error('Error fetching notification count: ' + error.statusText);
            }
        });
    }

    // Call the function initially to set the counter
    updateNotificationCounter();

    // Periodically update the notification counter (e.g., every 30 seconds)
    setInterval(updateNotificationCounter, 30000); // Adjust the interval as needed
</script>

  </body>
</html>
