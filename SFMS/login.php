<div class="col-md-3" style="margin-left:550px;">
	<div class="panel panel-success" id="panel-margin">
		<div class="panel-heading">
			<center><h1 class="panel-title">Student Login</h1></center>
		</div>
		<div class="panel-body">
			<form method="POST">
				<div class="form-group">
					<label for="username">Enrollment no</label>
					<input class="form-control" name="stud_no" placeholder="Student no" type="number" required="required" >
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input class="form-control" name="password" placeholder="Password" type="password" required="required" >
				</div>
				<?php include 'login_query.php'?>
				
				<a href="" style="text-decoration:none;float:left;"><p>&nbsp;Forgot Password?</p></a>
				<a href="../index.html" style="text-decoration:none;float:right"><p>&nbsp;Back to home</p></a>
				
				<div class="form-group">
					<button class="btn btn-block btn-primary"  name="login"><span class="glyphicon glyphicon-log-in"></span> Login</button>
				</div>
			</form>
		</div>
	</div>
</divt