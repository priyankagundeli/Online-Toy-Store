<?php
$GLOBALS['conn'] = mysqli_connect("localhost", "root", "", "toystore");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>

