<h2><b>FORGOT PASSWORD</B></h2>
<form method="post" action="./passwordrequest.php">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4"><?php echo @$err;?></div>
    </div>
    <div class="row">
        <div class="col-sm-4">Email ID</div>
        <div class="col-sm-5">
            <input type="email" name="forgot_email" class="form-control"/>
        </div>
    </div>
    <div class="row" style="margin-top:10px">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <input type="submit" value="Submit" name="forgot_password" class="btn btn-success"/>
        </div>
    </div>
</form>
