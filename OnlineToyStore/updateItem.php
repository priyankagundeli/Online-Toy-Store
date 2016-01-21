<html><head><link href="css/info.css" type="text/css" rel="stylesheet" /></head>
    <body>
        <div id="sub">
        </div>
    </body>
</html>
<?php
include "connectToMysql.php";
$toyId=$_POST['toyId'];
$attr=$_POST['field'];
$value=$_POST['value'];
$search="SELECT * FROM toys WHERE toyId='$toyId'";
$res=$conn->query($search);
$row_cnt = $res->num_rows;
if($row_cnt>0){
$sql="UPDATE `toys` SET `$attr`='$value' WHERE toyId='$toyId'";
if($conn->query($sql))
{
    header('Refresh:3; url=admin.php');
    echo "<h3>Record updated successfully</h3>";
}
else{
    header('Refresh:3; url=admin.php');
    echo "<h3>Error!! Try again with correct data</h3>";
}
}
else{
    header('Refresh:3; url=admin.php');
    echo "<h3>Error!! Try again with correct data</h3>";
}
?>

