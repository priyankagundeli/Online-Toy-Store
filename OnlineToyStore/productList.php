<html>
    <head>
        <link rel="stylesheet" href="css/productList.css">
    </head>
</html>
<?php

include "connectToMysql.php";
$sql = "SELECT * FROM toys";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)) {
    //for ($i = mysqli_num_rows($result) - 1; $i >= 0; $i-2) {
        echo '<div id="products">
                 <figure class="thumb">
                 <a href="detail.php?name='.$row['toyName'].'"><img src="' .$row['toyImage']. '"alt="productImage" width="150px" height="150px"/></a>
                     <figcaption><a href="detail.php?name='.$row['toyName'].'">' .$row['toyName']. '</a><br> $' .$row['toyPrice']. '</figcaption>
                 </figure>
                </div>';
}

?>