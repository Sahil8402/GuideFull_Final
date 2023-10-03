<?php
require_once 'vendor/autoload.php'; // Include DOMPDF autoloader
session_start();
ob_start();
require_once('includes/configpdo.php');
error_reporting(0);
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
<html>
<style>
  body {
    padding: 4px;
    text-align: center;
  }

  table {
    width: 100%;
    margin: 10px auto;
    table-layout: auto;
  }

  .fixed {
    table-layout: fixed;
  }

  table,
  td,
  th {
    border-collapse: collapse;
  }

  th,
  td {
    padding: 1px;
    border: solid 1px;
    text-align: center;
  }
</style>
<?php $rollid = $_SESSION['rollid'];
$classid = $_SESSION['classid'];
$qery = "SELECT   tblstudents.StudentName,tblstudents.RollId,tblstudents.RegDate,tblstudents.StudentId,tblstudents.Status,tblclasses.ClassName,tblclasses.Section from tblstudents join tblclasses on tblclasses.id=tblstudents.ClassId where tblstudents.RollId=? and tblstudents.ClassId=?";
$stmt21 = $mysqli->prepare($qery);
$stmt21->bind_param("ss", $rollid, $classid);
$stmt21->execute();
$res1 = $stmt21->get_result();
$cnt = 1;
while ($result = $res1->fetch_object()) {  ?>
  <h1>Result Declared</h1>
  <p><b>Student Name :</b> <?php echo htmlentities($result->StudentName); ?></p>
  <p><b>Student Roll Id :</b> <?php echo htmlentities($result->RollId); ?>
  <p><b>Student Class:</b> <?php echo htmlentities($result->ClassName); ?>(<?php echo htmlentities($result->Section); ?>)
  <?php }

  ?>

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
      $query = "select t.StudentName,t.RollId,t.ClassId,t.marks,SubjectId,tblsubjects.SubjectName from (select sts.StudentName,sts.RollId,sts.ClassId,tr.marks,SubjectId from tblstudents as sts join  tblresult as tr on tr.StudentId=sts.StudentId) as t join tblsubjects on tblsubjects.id=t.SubjectId where (t.RollId=? and t.ClassId=?)";
      $stmt = $mysqli->prepare($query);
      $stmt->bind_param("ss", $rollid, $classid);
      $stmt->execute();
      $res = $stmt->get_result();
      $cnt = 1;
      while ($row = $res->fetch_object()) {
      ?>
        <?php
        $Ecgpa = ($totalmarks = $row->marks) / 9.5;
        ?>

        <tr>
          <td><?php echo htmlentities($cnt); ?></td>
          <td><?php echo htmlentities($row->SubjectName); ?></td>
          <<td><?php echo htmlentities(number_format($Ecgpa, 2)); ?></td>
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

      <th scope="row" colspan="3">CGPA</th>
      <td><b><?php echo number_format($cgpa, 2); ?></b></td>
      </tr>

      <tr>
        <th scope="row" colspan="3">Grade</th>
        <td><b><?php $grade = getGrade($cgpa);
                echo $grade; ?></b></td>
      </tr>

    </tbody>
  </table>
  </div>

</html>

<?php
$html = ob_get_clean();
// Initialize DOMPDF
$dompdf = new Dompdf\Dompdf();
$dompdf->setPaper('A4', 'portrait'); // Set paper size and orientation
$dompdf->loadHtml($html);

// Render the PDF (you can customize the filename)
$dompdf->render();

// Stream the PDF to the user for download
$dompdf->stream('result.pdf', array('Attachment' => true));

exit; // Exit the script
?>