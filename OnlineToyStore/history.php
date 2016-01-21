<?php session_start(); ?>
<html>
    <head>
        <title>TinyWinyToyStore</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link href="css/index2.css" type="text/css" rel="stylesheet" />
        <link href="css/tab.css" type="text/css" rel="stylesheet" />
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
            <div id="content">
                <div><h2 class="title">Items Purchased</h2><br></div>
                <div class="entry" style="width: 80%; height: 20%">
                    <?php
                    include "connectToMysql.php";
                    $name=$_SESSION['userName'];
                    $sql="SELECT * FROM orders WHERE username='$name'";
                    $result = mysqli_query($conn,$sql);
                    $count=0;
                    echo '<table width="50%" border="0">
                                <tr>
                                    <td> <b>Product
                                    <td> <b>Rate
                                    </tr>
                                    <tr><td colspan="7"><hr style="border:1px Solid #a1a1a1;"></tr>';
                    while($row = mysqli_fetch_array($result)) {
                        $count++;
                        echo '<tr><td>' .$row['toyName']. '</td>'
                                . '<td>$ ' .$row['toyPrice']. '</td></tr>';
                    }
                    echo '<tr><td colspan="7"><hr style="border:1px Solid #a1a1a1;"></tr>
                                <tr>
                                <td colspan="6" align="right">
                                <h3>Total items purchased:</h3>
                                </td>
                                <td> <h3>' .$count. '</h3></td>
                                </tr>';
                    echo '</table>';
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>