<?php session_start(); ?>
<html>
    <head>
        <title>TinyWinyToyStore</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link href="css/index2.css" type="text/css" rel="stylesheet" />
        <link href="css/tab.css" type="text/css" rel="stylesheet" />
        <link href="css/productList.css" type="text/css" rel="stylesheet" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="js/tab.js"></script>
    </head>
    <body>
        <?php include_once("template_header.php"); ?>
        <div id="menu">
            <div id="submain" align="center">
                <?php include 'menuBar.php'; ?>
            </div>
        </div>
        <?php include_once("categories_template.php"); ?>
        <div id="data">

            <?php
            if (isset($_SESSION['userName'])) {
                include "connectToMysql.php";
                $catId = $_GET['cat'];
                if ($catId == 'Girl') {
                    $sql = "SELECT * FROM toys WHERE Gender='$catId'";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                        echo '<div id="products">
                 <figure class="thumb">
                 <a href="detail.php?name=' . $row['toyName'] . '"><img src="' . $row['toyImage'] . '"alt="productImage" width="150px" height="150px"/></a>
                     <figcaption><a href="detail.php?name=' . $row['toyName'] . '">' . $row['toyName'] . '</a><br> $' . $row['toyPrice'] . '</figcaption>
                 </figure>
                </div>';
                    }
                } else if ($catId == 'Boy') {
                    $sql = "SELECT * FROM toys WHERE Gender='$catId'";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                        echo '<div id="products">
                 <figure class="thumb">
                 <a href="detail.php?name=' . $row['toyName'] . '"><img src="' . $row['toyImage'] . '"alt="productImage" width="150px" height="150px"/></a>
                     <figcaption><a href="detail.php?name=' . $row['toyName'] . '">' . $row['toyName'] . '</a><br> $' . $row['toyPrice'] . '</figcaption>
                 </figure>
                </div>';
                    }
                } else {
                    $sql = "SELECT * FROM toys WHERE cid='$catId'";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                        echo '<div id="products">
                 <figure class="thumb">
                 <a href="detail.php?name=' . $row['toyName'] . '"><img src="' . $row['toyImage'] . '"alt="productImage" width="150px" height="150px"/></a>
                     <figcaption><a href="detail.php?name=' . $row['toyName'] . '">' . $row['toyName'] . '</a><br> $' . $row['toyPrice'] . '</figcaption>
                 </figure>
                </div>';
                    }
                }
            } else {
                include 'content.php';
                echo '<br><br><br><br><br><br><br><br><br><h4>Login to browse more!! </h4>';
            }
            ?>
        </div>
    </body>
</html>

