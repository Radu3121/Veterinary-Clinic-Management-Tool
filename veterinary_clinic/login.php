<link rel = "stylesheet" href = "loginStyle.css">

<html>
    <title>
        Login Page
    </title>
    <body>
        <section>
            <div class = "login">
                <h2>Welcome!</h2>
                <h5>Enter your credentials to go further</h5>
                <p>
                    <!-- Formular de login -->
                    <form action = "includes/login.inc.php" method = "POST">
                        <label class = "label">Username:</label> <br>
                        <input class = "input" type = "text" name = "uid" id = "username" style = "width: 220px"> <br>
                        <label class = "label">Password:</label> <br>
                        <input class = "input" type = "password" name = "pwd" id = "passwrd" style = "width: 220px"> <br>
                        <div class = "loginButton">
                            <button  type = "submit" name = "submit" style = "width: 220px">Log In</button>
                        </div>    
                    </form>
                        <?php
                
                            if (isset($_GET["error"])) {
                                if($_GET["error"] == "emptyinput") {
                                    echo "<h4>FIll in all fields!</h4>";
                                }
                            } 
                            if (isset($_GET["error"])) {
                                if($_GET["error"] == "wronglogin") {
                                    echo "<h4>Wrong username or password!</h4>";
                                }
                            }
                            if (isset($_GET["signup"])) {
                                if($_GET["signup"] == "succesful") {
                                    echo "<h4>Sign up succesful,<br> you can login now!</h4>";
                                }
                            } 
                        ?>
                </p>
            </div>
        </section>
    </body>

</html>