<!DOCTYPE html>
<html>
<head>
    <link href="css/getList.css" type="text/css" rel="stylesheet" />
</head>
<body>

<?php
include "connectToMysql.php"; 
$q = $_GET['q'];
$str=explode(',', $q);
$cname=$str[0];
$status=$str[1];
$cat="SELECT cid FROM category WHERE cname='$cname'";
if($conn->query($cat))
{
    $row = mysqli_fetch_array($conn->query($cat));
    $cid=$row['cid'];
}

$sql="SELECT * FROM toys WHERE cid = '".$cid."'";
$result = mysqli_query($conn,$sql);


echo "<table id='list'>
<tr id='list'>
<th id='list'>toyId</th>
<th id='list'>toyName</th>
<th id='list'>categoryId</th>
<th id='list'>toyDesc</th>
<th id='list'>toyPrice</th>

</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr id='list'>";
    echo "<td>" . $row['toyId'] . "</td>";
    echo "<td>" . $row['toyName'] . "</td>";
    echo "<td>" . $row['cid'] . "</td>";
    echo "<td>" . $row['toyDesc'] . "</td>";
    echo "<td>" . $row['toyPrice'] . "</td>";
    echo "</tr>";
}
if($status=="delete")
{
echo "</table>";
echo "<form action='deleteItem.php' method='POST'>";
echo "<table><tr><td>Enter the toy ID to delete:</td><td><input type='text' name='toyId'required></td><td><input type='submit' name='submit'></td></tr></table></form>";
}
if($status=='update')
{
    echo "</table>";
echo "<form action='updateItem.php' method='POST'>";
echo "<table><tr><td>Enter the toy ID to update:</td><td><input type='number' name='toyId' required></td></tr>";
echo "<tr><td>Enter the attribute name to update:</td><td><input type='text' name='field' required></td></tr>";
echo "<tr><td>Enter the new value to update:</td><td><input type='text' name='value' required></td></tr>";
echo "<tr><td></td><td><input type='submit' name='submit'</td></tr>";
}

?>
</body>
</html>

