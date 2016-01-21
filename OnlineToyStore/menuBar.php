<div id="sub" align="center">
    <nav>
        <ul style="alignment-adjust: middle">
            <li id="home">
                <a id="homePage" href="index.php" target="_top">Home</a>
            </li>
            <li id="searchtab">
                <form action="search.php" method="POST">
                <input type="text" id="toySearch" name="toySearch" placeholder="Search" class="search"/>
                </form>
            </li>
            

            
                <?php
                if (isset($_SESSION['userName'])) {
                    echo '<li id="login"><a href="Logout.php"><strong>Logout</strong></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                    echo '<a href="viewcart.php"><strong>ViewCart</strong></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                    echo '<a href="history.php"><strong>Order History</strong></a></li>';

                } else {
                    echo '<li id="signup">
                <a href="NewUser_Register.php">Sign up</a>
            </li>';
                    echo '<li id="login"><a id="login-trigger" href="#">
                    Log in <span>&#x25BC;</span>
                </a>
                <div id="login-content">
                    <form action="validate.php" method="post">
                        <fieldset id="inputs">
                            <input id="username" type="email" name="Email" placeholder="Your email address" required>   
                            <input id="password" type="password" name="Password" placeholder="Password" required>
                        </fieldset>
                        
                            <input type="submit" id="submit" value="Log in">
                        
                    </form></div></li> ';
                }
                ?>
        </ul>
    </nav>
</div>