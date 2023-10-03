<?php
include('connection.php');
session_start();
?>
<html>

<head>
	<title>GuideFull News</title>
	<link rel="stylesheet" href="css/bootstrap.css" />
	<link rel="icon" href="../images/GuideFullLogo.jpg" type="image/x-icon" />
	<script src="js/jquery_library.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>

<body>
	<nav class="navbar navbar-default navbar-fixed-top" style="background:#000">
		<div class="container">

			<ul class="nav navbar-nav navbar-left">
				<li><a href="index.php"><strong><img src="../images/GuideFull.jpg" style="height:29px;width:130px;border-radius:20px"> Notice Board</strong></a></li>

				<li><a href="index.php?option=contact"><span class="glyphicon glyphicon-phone" style="padding-top: 5px;"></span>Contact</a></li>

			</ul>


			<ul class="nav navbar-nav navbar-right">
				<li><a href="index.php?option=New_user"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
				<li><a href="index.php?option=login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
				<li><a href="../index.html">Back to Home</a></li>
			</ul>



		</div>
	</nav>

	<div class="container-fluid">
		<!-- slider -->
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				<li data-target="#carousel-example-generic" data-slide-to="1"></li>
				<li data-target="#carousel-example-generic" data-slide-to="2"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">

				<div class="item active">
					<img src="images/notice.jpg" alt="...">
					<div class="carousel-caption">
					</div>
				</div>

				<div class="item">
					<img src="images/notice2.jpg" alt="...">
					<div class="carousel-caption">
					</div>
				</div>
				...
			</div>

			<!-- Controls -->
			<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
		<!-- slider end-->
	</div>


	<div class="container">
		<div class="row">
			<!-- container -->
			<div class="col-sm-8">
				<?php
				@$opt = $_GET['option'];

				if ($opt != "") {
					if ($opt == "about") {
						include('about.php');
					} else if ($opt == "contact") {
						include('contact.php');
					} else if ($opt == "New_user") {
						include('registration.php');
					} else if ($opt == "login") {
						include('login.php');
					}
				} else {
					echo "<h2><b>'WELCOME USER TO OUR GUIDEFULL NOTICE BOARD'</b></h2>
		<i> <b> Join us today and get connected. Register now to get each and every updates of your college! </b></i>";
				}
				?>



			</div>
			<!-- container -->

			<div class="col-sm-4">
				<div class="panel panel-default">
					<div class="panel-heading"><b>About GuideFull News</b></div>
					<div class="panel-body">
						In an era where information flows ceaselessly and knowledge is paramount, staying informed about the latest developments in the field of education is essential. Whether you're a student, educator, parent, or simply someone passionate about the world of learning, GuideFull News is here to provide you with a comprehensive and reliable source of education-related news.We invite you to become a part of our growing community of educators, students, parents, and education enthusiasts. Subscribe to our newsletter, follow us on social media, and engage with our content to stay connected with the latest in education.We invite you to become a part of our growing community of educators, students, parents, and education enthusiasts. Subscribe to our newsletter, follow us on social media, and engage with our content to stay connected with the latest in education.
					</div>
				</div>

			</div>
		</div>

	</div>





</body>

</html>