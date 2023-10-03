<?php
session_start();
error_reporting(0);
include('includes/config.php');
function getGrade($cgpa)
{
    if ($cgpa >= 9) {
        return 'A+';
    } elseif ($cgpa >= 8.0) {
        return 'A';
    } elseif ($cgpa >= 7.0) {
        return 'B+';
    } elseif ($cgpa >= 6.5) {
        return 'B';
    } elseif ($cgpa >= 6) {
        return 'C+';
    } elseif ($cgpa >= 5.5) {
        return 'C';
    } elseif ($cgpa >= 5.0) {
        return 'D+';
    } elseif ($cgpa >= 4.0) {
        return 'D';
    } else {
        return 'F';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GuideFull | Result Management System</title>
    <link rel="icon" href="../images/GuideFullLogo.jpg" type="image/x-icon" />
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
    <link rel="stylesheet" href="css/prism/prism.css" media="screen">
    <link rel="stylesheet" href="css/main.css" media="screen">
    <script src="js/modernizr/modernizr.min.js"></script>
</head>

<body>
    <div class="main-wrapper">

        <div class="content-wrapper">
            <div class="content-container">


                <!-- /.left-sidebar -->

                <div class="main-page">
                    <div class="container-fluid">
                        <div class="row page-title-div">
                            <div class="col-md-12">
                                <h1 align="center"><img src="../images/GuideFulllogo.jpg" style="border-radius: 10px;" height="50px">uideFull Result Management System</h1>
                            </div>
                        </div>
                        <!-- /.row -->

                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->

                    <section class="section">
                        <div class="container-fluid">

                            <div class="row">



                                <div class="col-md-8 col-md-offset-2">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                <?php
                                                // code Student Data
                                                $rollid = $_POST['rollid'];
                                                $classid = $_POST['class'];
                                                $_SESSION['rollid'] = $rollid;
                                                $_SESSION['classid'] = $classid;
                                                $qery = "SELECT   tblstudents.StudentName,tblstudents.RollId,tblstudents.RegDate,tblstudents.StudentId,tblstudents.Status,tblclasses.ClassName,tblclasses.Section from tblstudents join tblclasses on tblclasses.id=tblstudents.ClassId where tblstudents.RollId=:rollid and tblstudents.ClassId=:classid ";
                                                $stmt = $dbh->prepare($qery);
                                                $stmt->bindParam(':rollid', $rollid, PDO::PARAM_STR);
                                                $stmt->bindParam(':classid', $classid, PDO::PARAM_STR);
                                                $stmt->execute();
                                                $resultss = $stmt->fetchAll(PDO::FETCH_OBJ);
                                                $cnt = 1;
                                                if ($stmt->rowCount() > 0) {
                                                    foreach ($resultss as $row) {   ?>
                                                        <p><b>Student Name :</b> <?php echo htmlentities($row->StudentName); ?></p>
                                                        <p><b>Student Roll Id :</b> <?php echo htmlentities($row->RollId); ?>
                                                        <p><b>Student Class:</b> <?php echo htmlentities($row->ClassName); ?>(<?php echo htmlentities($row->Section); ?>)
                                                        <?php }

                                                        ?>
                                            </div>
                                            <div class="panel-body p-20">
                                                <table class="table table-hover table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Sr no</th>
                                                            <th>Subject</th>
                                                            <th>CGPA</th>
                                                            <th>Grade</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        // Code for result

                                                        $query = "select t.StudentName,t.RollId,t.ClassId,t.marks,SubjectId,tblsubjects.SubjectName from (select sts.StudentName,sts.RollId,sts.ClassId,tr.marks,SubjectId from tblstudents as sts join  tblresult as tr on tr.StudentId=sts.StudentId) as t join tblsubjects on tblsubjects.id=t.SubjectId where (t.RollId=:rollid and t.ClassId=:classid)";
                                                        $query = $dbh->prepare($query);
                                                        $query->bindParam(':rollid', $rollid, PDO::PARAM_STR);
                                                        $query->bindParam(':classid', $classid, PDO::PARAM_STR);
                                                        $query->execute();
                                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                        $cnt = 1;
                                                        if ($countrow = $query->rowCount() > 0) {

                                                            foreach ($results as $result) {

                                                        ?>
                                                                <?php
                                                                $Ecgpa = ($totalmarks = $result->marks) / 9.5;

                                                                ?>
                                                                <tr>
                                                                    <th scope="row"><?php echo htmlentities($cnt); ?></th>
                                                                    <td><?php echo htmlentities($result->SubjectName); ?></td>
                                                                    <td><?php echo htmlentities(number_format($Ecgpa, 2)); ?></td>
                                                                    <td><?php echo getGrade(htmlentities(number_format($Ecgpa, 2))); ?></td>

                                                                </tr>
                                                            <?php
                                                                $totlcount += $totalmarks;
                                                                $cnt++;
                                                            }
                                                            ?>
                                                            <tr>
                                                                <th scope="row" colspan="3">Total Marks</th>
                                                                <td><b><?php echo htmlentities($totlcount); ?></b> out of <b><?php echo htmlentities($outof = ($cnt - 1) * 100); ?></b></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row" colspan="3">Percntage</th>
                                                                <td><b><?php echo  htmlentities($totlcount * (100) / $outof); ?> %</b></td>
                                                            </tr>

                                                            <?php
                                                            // Assuming you have the percentage in a variable like $percentage
                                                            $percentage = $totlcount * (100) / $outof; // Replace with the actual percentage

                                                            // Calculate CGPA
                                                            $cgpa = $percentage / 9.5;
                                                            ?>

                                                            <!-- Display CGPA -->
                                                            <th scope="row" colspan="3">CGPA</th>
                                                            <td><b><?php echo number_format($cgpa, 2); ?></b></td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row" colspan="3">Grade</th>
                                                                <td><b><?php $grade = getGrade($cgpa);
                                                                        echo $grade; ?></b></td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row" colspan="3">Download Result</th>
                                                                <td><b><a href="download-result.php">Download </a> </b></td>
                                                            </tr>

                                                        <?php } else { ?>
                                                            <div class="alert alert-warning left-icon-alert" role="alert">
                                                                <strong>Notice!</strong> Your result not declare yet
                                                            <?php }
                                                            ?>
                                                            </div>
                                                        <?php
                                                    } else { ?>

                                                            <div class="alert alert-danger left-icon-alert" role="alert">
                                                                strong>Oh snap!</strong>
                                                            <?php
                                                            echo htmlentities("Invalid Roll Id");
                                                        }
                                                            ?>
                                                            </div>
                                                    </tbody>
                                                </table>

                                            </div>

                                        </div>
                                        <!-- /.panel -->

                                    </div>

                                    <!-- /.col-md-6 -->
<h6 style="padding-left: 370px;"><i class="fa fa-check-circle" style="color:green;"></i> Verified BY GuideFull</h6>
                                    <div class="form-group">

                                        <div class="col-sm-6">
                                            <a href="index.php">Back to Home</a>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.row -->

                            </div>
                            <!-- /.container-fluid -->
                    </section>
                    <!-- /.section -->

                </div>
                <!-- /.main-page -->


            </div>
            <!-- /.content-container -->
        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- /.main-wrapper -->

    <!-- ========== COMMON JS FILES ========== -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/pace/pace.min.js"></script>
    <script src="js/lobipanel/lobipanel.min.js"></script>
    <script src="js/iscroll/iscroll.js"></script>

    <!-- ========== PAGE JS FILES ========== -->
    <script src="js/prism/prism.js"></script>

    <!-- ========== THEME JS ========== -->
    <script src="js/main.js"></script>
    <script>
        $(function($) {

        });
    </script>

    <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->

</body>

</html>