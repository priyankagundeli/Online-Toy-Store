<html><head><link href="css/info.css" type="text/css" rel="stylesheet" /></head>
    <body>
        <div id="sub">
        </div>
    </body>
</html>
<?php

session_start();
include "connectToMysql.php";
$username = $_POST['Email'];
$password = $_POST['Password'];

$sql = "SELECT * FROM user_info WHERE username='$username' AND password='$password'";
$info = $conn->query($sql);
$row_cnt = $info->num_rows;
if($row_cnt==0){
    header('Refresh:4; url=index.php');
    echo "<h4>Wrong username or password!<br> Please create an account if newUser</h4>";
}

if (mysqli_num_rows($info) > 0) {
    while ($row = mysqli_fetch_assoc($info)) {
        $id = $row['id'];
        $type = $row['usertype'];
    }
    $_SESSION = array();
    $_SESSION["userName"] = $_POST["Email"];
    $_SESSION["uid"] = $_POST["password"];
    $_SESSION["status"] = true;

if ($type == "admin") {
    header("location: admin.php");
} else {
    header("location: index.php");
}
}
?>

