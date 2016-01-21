    <html>
    <head>
        <title>Administration</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/admin.css" type="text/css" rel="stylesheet" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="js/admin.js"></script>
        <script>
            function showUser(str) {
                if (str == "") {
                    document.getElementById("txtHint").innerHTML = "";
                    return;
                } else {
                    if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    } else {
                        // code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function () {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                        }
                    }
                    xmlhttp.open("GET", "getList.php?q=" + str, true);
                    xmlhttp.send();
                }
            }
        </script>
    </head>
    <body>
        <?php include_once("template_header.php"); ?>
        <div id="sub">
        </div>
        <div><h1>Admin</h1></div>
        <div class="tabs">
            <ul class="tab-links">
                <li class="active"><a href="#tab1">Add Item</a></li>
                <li><a href="#tab2">Delete Item</a></li>
                <li><a href="#tab3">Update Item</a></li>
                <li><a href="#tab4">Logout</a></li>
            </ul>

            <div class="tab-content">
                <div id="tab1" class="tab active">
                    <form action="upload.php" method="post" enctype="multipart/form-data">
                        <table>
                            <tr><td>Item name:</td>
                                <td><input type="text" name="name" required></td>
                            </tr>
                            <tr><td>Item Category:</td>
                                <td><select name="category" id="category">
                                        <option value="Select a category">Select one</option>
                                        <option value="Arts and Craft">Arts and Craft</option>
                                        <option value="Barbie">Barbie</option>
                                        <option value="Bikes">Bikes</option>
                                        <option value="Building blocks">Building blocks</option>
                                        <option value="Dolls">Dolls</option>
                                        <option value="Education">Education</option>
                                        <option value="Electronic">Electronic</option>
                                        <option value="Games and puzzles">Games and puzzles</option>
                                        <option value="Musical">Musical</option>
                                        <option value="Outdoor">Outdoor</option>
                                        <option value="Remote Control">Remote Control</option>
                                        <option value="Sports">Sports</option>
                                    </select></td>
                            </tr>
                            <tr><td>Item Category:</td>
                                <td><select name="genderCat" id="genderCat">
                                        <option value="Select a category">Select one</option>
                                        <option value="Girl">Girl</option>
                                        <option value="Boy">Boy</option>
                                        </select></td>
                            </tr>
                            <tr><td>Toy Price:</td>
                                <td><input type="number" name="price" required></td>
                            </tr>
                            <tr><td>Description:</td>
                                <td><textarea title="desc" name="desc" required></textarea></td>
                            </tr>
                            <tr><td>Quantity:</td>
                                <td><input type="number" name="qty" required></td>
                            </tr>
                            <tr><td>Image:</td>
                                <td><input type="file" name="fileToUpload" id="fileToUpload" required></td>
                            </tr>
                            <tr><td></td>
                                <td><button type="submit" name="submit">Submit</button></td></tr>
                        </table>
                    </form>
                </div>
                <div id="tab2" class="tab">
                    <form method="post">
                        <table>
                            <tr>
                                <td><h4>Select a category from where you want to delete the item:</h4></td>
                            </tr>
                            <tr>
                                <td>
                                    <select onchange="showUser(this.value+','+'delete')">
                                        <option value="Select a category">Select one</option>
                                        <option value="Arts and Craft">Arts and Craft</option>
                                        <option value="Barbie">Barbie</option>
                                        <option value="Bikes">Bikes</option>
                                        <option value="Building blocks">Building blocks</option>
                                        <option value="Dolls">Dolls</option>
                                        <option value="Education">Education</option>
                                        <option value="Electronic">Electronic</option>
                                        <option value="Games and puzzles">Games and puzzles</option>
                                        <option value="Musical">Musical</option>
                                        <option value="Outdoor">Outdoor</option>
                                        <option value="Remote Control">Remote Control</option>
                                        <option value="Sports">Sports</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </form>
                    <br>
                    <div id="txtHint"><b>Toys will be listed here...</b></div>

                </div>

                <div id="tab3" class="tab">
                    <?php include_once("update.php"); ?>
                </div>
                <div id="tab4" class="tab">
                    <a href="Logout.php">Click here to log out</a>
                </div>
            </div>
        </div>
    </body>
</html>
