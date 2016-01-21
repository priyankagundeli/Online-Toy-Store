<html><head><link href="css/info.css" type="text/css" rel="stylesheet" /></head>
    <body>
        <div id="sub">
        </div>
    </body></html>
<?php
$target_dir = "C:/wamp/www/OnlineToyStore/images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "<br>";
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        header('Refresh:3; url=admin.php');
        echo "<br>";
        echo "<h3>File is not an image</h3>";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    header('Refresh:3; url=admin.php');
    echo "<br>";
    echo "<h3>Sorry, file already exists</h3>";
   $uploadOk = 0;
}

//}

//echo $_FILES["fileToUpload"]["tmp_name"].'<br>';
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    header('Refresh:3; url=admin.php');
    echo "<br>";
    echo "<h3>Sorry, your file was not uploaded! <b4> Try again later</h3>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "<br>";
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded to the images folder.";
    } else {
        header('Refresh:3; url=admin.php');
        echo "<br>";
        echo "<h3>Sorry, there was an error uploading your file</h3>";
    }
}

include "connectToMysql.php"; 
$ToyName=$_POST['name'];
$categoryName=$_POST['category'];
$genderCat=$_POST['genderCat'];
$toyDesc=$_POST['desc'];
$toyPrice=$_POST['price'];
$toyImage=basename( $_FILES["fileToUpload"]["name"]);
$quantity=$_POST['qty'];

$cat="SELECT cid FROM category WHERE cname='$categoryName'";
if($conn->query($cat))
{
    $row = mysqli_fetch_array($conn->query($cat));
    $cid=$row['cid'];
}
else{
    echo "<br> No such category exists";
}
$sql="INSERT INTO `toys` (`toyName`, `cid`, `toyDesc`, `toyPrice`, `toyImage`,`Gender`, `quantity`) VALUES
('$ToyName','$cid', '$toyDesc', '$toyPrice', 'images/$toyImage', '$genderCat', '$quantity')";
//$conn->query($sql);
if($conn->query($sql))
{
    header('Refresh:3; url=admin.php');
    echo '<h3><br>Record inserted successfully</h3>';
}

else{
    header('Refresh:3; url=admin.php');
    echo "<h3><br>Error</h3>";
}

?>