<?php
include('../connection.php');
$q=mysqli_query($conn,"select * from notice where user='".$_SESSION['user']."'order by notice_id Desc Limit 1");
$rr=mysqli_num_rows($q);
if(!$rr)
{
echo "<h2 style='color:red'>No any notice for You !!!</h2>";
}
else
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

while($row=mysqli_fetch_assoc($q))
{

echo '<b style:"color:black">Subject</b>:'.$row['subject'].'</br></br>';
echo '<b style:"color:black">Description</b>:'.$row['Description'];


echo "</Tr>";

}
?>
</body>
</html>
<?php
}?>