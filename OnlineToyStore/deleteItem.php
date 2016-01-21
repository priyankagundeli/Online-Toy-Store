<html><head><link href="css/info.css" type="text/css" rel="stylesheet" /></head>
    <body>
        <div id="sub">
        </div>
    </body>
</html>
<?php
include "connectToMysql.php"; 
$toyId=$_POST['toyId'];

$search="SELECT * FROM toys WHERE toyId='$toyId'";
$res=$conn->query($search);
$row_cnt = $res->num_rows;
if($row_cnt>0){
$sql="DELETE FROM `toys` WHERE toyId='$toyId'";
if($conn->query($sql)){
    header('Refresh:3; url=admin.php');
echo "<h3>Toy deleted successfully</h3>";
}
}
else{
    header('Refresh:3; url=admin.php');
    echo "<h3>Error!!! Entered record does not exist</h3>";
}
?>

