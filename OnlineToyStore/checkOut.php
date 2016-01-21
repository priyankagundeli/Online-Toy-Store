<html><head><link href="css/info.css" type="text/css" rel="stylesheet" /></head>
    <body>
        <div id="sub">
        </div>
    </body></html>
<?php
session_start();
include "connectToMysql.php";
$username=$_SESSION["userName"];
$s="SELECT usertype from user_info WHERE username='".$username."'";
$type=$conn->query($s);
$row=  mysqli_fetch_array($type);

if(isset($_SESSION['cart1'])){
    $size=sizeof($_SESSION['cart1']);
    if($size==0){
        echo "<h2 align='center'>No items in cart!</h2>";
    }
    else{
foreach ($_SESSION['cart1'] as $id => $x) {
    
    $username=$_SESSION["userName"];
    $toyId=$x['id'];
    $toyName=$x['nm'];
    $toyPrice=$x['rate'];
    $sql = "INSERT INTO orders(username, toyId, toyName, toyPrice) VALUES ( '$username' ,'$toyId ','$toyName', '$toyPrice')";
    $conn->query($sql);
    $s="SELECT quantity FROM toys WHERE toyId='" .$toyId. "' ";
    $res=$conn->query($s);
    $row = mysqli_fetch_array($res);
    $quant=$row[0]-1;
    $updt="UPDATE toys SET quantity='" .$quant." ' WHERE toyId='" .$toyId. "'";
    $conn->query($updt);
    unset($_SESSION['cart1'][$x['id']]);

echo "<h2 align='center'>Thank you for shopping..!</h2>"
. "<div align='center'><a href='index.php'>Home Page</a>"
        . "<br><br><a href='index.php'>Continue Shopping.....</a></div>";
}
}
}
else{
    echo "<h3>No items in cart</h3>"
    . "<a href='index.php'>Home Page</a>";
}

?>
