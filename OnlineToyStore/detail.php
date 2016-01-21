<?php
session_start();
include "connectToMysql.php";
$toyName = $_GET['name'];

$sql = "SELECT * FROM toys WHERE toyName='$toyName'";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

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
                            <div class="post">
                                <div class="entry" style="width: 60%; align:center; padding-left: 20%">
                                    <h2 class="title"><?php echo $row['toyName']; ?></h2>

                                    <?php
                                    if($row['quantity']!=0){
                                    echo '	<table border="0" width="100%">
                                <tr>
                                    <td><hr color="purple"></td>
				</tr>
				<tr align="center" bgcolor="#EEE9F3">
                                     <td>Item Details</td>
				</tr>
				<tr>
                                    <td><hr color="purple"></td>
				</tr>
                		 </table>
				<table border="0"  width="100%" bgcolor="#ffffff">
				<tr> 
				<td width="25%" rowspan="3">
					<img src="' . $row['toyImage'] . '" width="150" height="150">
				</td>
				</tr>
				<tr> 
				<td width="50%" height="100%">
				<table border="0"  width="100%" height="100%">
                                <tr valign="top">
				<td align="right" width="10%">NAME</td>
				<td width="6%">: </td>
				<td align="left">' . $row['toyName'] . '</td>
				</tr>
                                <tr>
        			<td align="right"> ID</td>
				<td>: </td>
				<td align="left">' . $row['toyId'] . '</td>
				</tr>
                                <tr>
        			<td align="right"> PRICE</td>
				<td>: </td>
				<td align="left">$' . $row['toyPrice'] . '</td>
				</tr>
                        	</table>
				</td>
				</tr>
                                </table>
				<table border="0" width="100%">
				 <tr>
				<td><hr color="purple"></td>
				</tr>
				 <tr align="center" bgcolor="#EEE9F3">
				 <td>DESCRIPTION</td>
				</tr>
				<tr>
				<td><hr color="purple"></td>
				</tr>
				 </table>
				 ' . $row['toyDesc'] . '
				 <tr><td colspan=2><hr color="purple"></td></tr>
				<table border="0" width="100%">
				 <tr align="center" bgcolor="#EEE9F3">';

                                    if (isset($_SESSION['status'])) {
                                        echo ' <td><a href="shoppingCart.php?id=' . $row['toyId'] . '&name=' . $row['toyName'] . '&cat=' . $row['cid'] . '&rate=' . $row['toyPrice'] . '">
				<img src="images/addtocart.jpg" width="100px" height="50px">
					</a></td>';
                                    } else {
                                        echo '<td><img src="images/addtocart.jpg" width="100px" height="50px"><br><a href="index.php"> <h6>Please Login to continue shopping..</h6></a></td>';
                                    }
                                    echo '</tr>
				</table>';
                                    }
                                    else{
                                        echo '	<table border="0" width="100%">
                                <tr>
                                    <td><hr color="purple"></td>
				</tr>
				<tr align="center" bgcolor="#EEE9F3">
                                     <td>Item Details</td>
				</tr>
				<tr>
                                    <td><hr color="purple"></td>
				</tr>
                		 </table>
				<table border="0"  width="100%" bgcolor="#ffffff">
				<tr> 
				<td width="25%" rowspan="3">
					<img src="' . $row['toyImage'] . '" width="150" height="150">
				</td>
				</tr>
				<tr> 
				<td width="50%" height="100%">
				<table border="0"  width="100%" height="100%">
                                <tr valign="top">
				<td align="right" width="10%">NAME</td>
				<td width="6%">: </td>
				<td align="left">' . $row['toyName'] . '</td>
				</tr>
                                <tr>
        			<td align="right"> ID</td>
				<td>: </td>
				<td align="left">' . $row['toyId'] . '</td>
				</tr>
                                <tr>
        			<td align="right"> PRICE</td>
				<td>: </td>
				<td align="left">$' . $row['toyPrice'] . '</td>
				</tr>
                                <tr >
                                <td colspan="3" style="color:red"> This item has been sold out
                                </td></tr>
                        	</table>
				</td>
				</tr>
                                </table>
				<table border="0" width="100%">
				 <tr>
				<td><hr color="purple"></td>
				</tr>
				 <tr align="center" bgcolor="#EEE9F3">
				 <td>DESCRIPTION</td>
				</tr>
				<tr>
				<td><hr color="purple"></td>
				</tr>
				 </table>
				 ' . $row['toyDesc'] . '
				 <tr><td colspan=2><hr color="purple"></td></tr>
				<table border="0" width="100%">
				 <tr align="center" bgcolor="#EEE9F3">';
                                        echo '<td><img src="images/addtocart.jpg" width="100px" height="50px"><br><a href="index.php"> <h5 style="color:red">This item is out of stock</h6></a></td>';
                                    echo '</tr>
				</table>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </body>
                    </html>



