<script>
    function showData(str) {
        if (str == "") {
            document.getElementById("resultData").innerHTML = "";
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
                    document.getElementById("resultData").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "getList.php?q=" + str, true);
            xmlhttp.send();
        }
    }
</script>
</head>
<body>
    <form method="post">
        <table>
            <tr>
                <td><h4>Select a category from where you want to delete the item:</h4></td>
            </tr>
            <tr>
                <td>
                    <select onchange="showData(this.value + ',' + 'update')">
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
    <div id="resultData"><b>Toys will be listed here...</b></div>
</body>