<?php
    // Start the session
    //The session_start() function must be the very first thing in your document. Before any HTML tags.
    session_start();

    // define variables and set to empty string values

    $usernameErr = $emailErr = $passwordErr = "";
    $username = $email = $userpassword =  "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["txt_username"])) {
        $usernameErr = "User Name is required";
    } else {
        $username = $_POST["txt_username"];
    }//end else
    if (empty($_POST["txt_email"])) {
        $emailErr = "Email Address is required";
    } else {
        $email = $_POST["txt_email"];
    }//end else
    if (empty($_POST["txt_password"])) {
        $passwordErr = "Password is required";
    } else {
        $userpassword = $_POST["txt_password"];
    }//end else
    
    if($usernameErr == "" && $emailErr == "" && $passwordErr == "" )
    {
        
        $hashed_password = password_hash($userpassword,PASSWORD_DEFAULT);
        require_once "includes/dbh.inc.php";
        $sInsert = "INSERT INTO account (username, email, password) VALUES( '$username' , '$email' , '$hashed_password') ";
        #echo $sQuery;
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $Result = $conn->exec($sInsert) ;
    
        if($Result )
        {	
            $Msg = "!Success";
            echo $Msg;
        }else{
        $Msg = "ERROR: Your credentials could not be saved!";
        echo $Msg;
            
        }
    }//end if


    if($usernameErr == "" && $passwordErr == "" )
    {
        
        //We hashed passwords using   
        //$hashed_password = password_hash($password,PASSWORD_DEFAULT);
        //References http://php.net/manual/en/function.password-verify.php
        require_once "includes/dbh.inc.php";
        $sQuery = "SELECT * FROM account WHERE username = '$username'  ";
            
        #echo $sQuery;
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        $Result = $conn->query($sQuery) ;
        $userResults = $Result->fetch(PDO::FETCH_ASSOC);
        if($userResults['username'] )//the user exists
        {	
            $hashed_password = $userResults['password'];
            if(password_verify($userpassword,$hashed_password))
            {
                $_SESSION['username'] = $username;
                #echo $_SESSION['$username'];
                header("Location: home.php?referer=login");
            }
            else
            {
                $Msg = "Password ERROR: Your credentials seem to be wrong. Try again or make sure you are a registered user!";
                echo $Msg;
            }
                
        }
        else
        {
            $Msg = "User name ERROR: Your credentials seem to be wrong. Try again or make sure you are a registered user!";
            echo $Msg;
                
        }
    }//end if
}
?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products - 2O2-Multimedia</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <div class="container ">
        <div class="navbar ">
            <div class="logo ">
                <a href="home.php "><img src="Photos\logo.png " width="125px "></a>
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a href="home.php ">Home</a></li>
                    <li><a href="product.php ">Product</a></li>
                    <li><a href="about.php ">About</a></li>
                    <li><a href="contact.php ">Contact</a></li>
                    <li><a href="account.php ">Account</a></li>
                </ul>
            </nav>
            <a href="cart.php"><img src="Photos\cart.png " width="30px " height="30px "></a>
            <img src="https://img.icons8.com/material-two-tone/24/000000/menu--v2.png" class="menu-icon" onclick="menutoggle()">
        </div>
    </div>

    <!-------- account page-------->
    
        <div class="account-page">
            <div class="container">

                <div class="row">
                    <div class="col-2">
                        <img src="Photos/homepageImage.png" width="100%">
                    </div>
                        <?php
                            if(isset($_SESSION['username']))
                            { 
                                echo "<h3 text-align=\"center\" style=\"color:black\">You are already logged in</h3>";
                                ?>
                                <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                                    <a href="logout.php" class="buton">Logout</a>
                                </form>
                                <?php
                            }//end if
                            else
                            {	  
                        ?>
                        <div class="col-2">
                            <div class="form-container">
                                <div class="form-btn">
                                    <span onclick="register()">Register</span>
                                    <span onclick="login()">Login</span>
                                    <hr id="Indicator">
                                </div>


                                <form id="RegForm" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                                    <input type="text" name="txt_username" placeholder="Username" maxlength="30" size="50">
                                    <input type="email" name="txt_email" placeholder="Email Address">
                                    <input type="password" name="txt_password" placeholder="Password" maxlength="30" size="50">
                                    <button type="submit" class="buton">Register</button>
                                </form>

                                <form id="LoginForm" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                                    <input type="text" name="txt_username" placeholder="Username">
                                    <input type="password" name="txt_password" placeholder="Password">
                                    <button type="submit" class="buton">Login</button>
                                    <a href="">Forgot Password</a>
                                </form>

                                
                                
                            </div>
                        </div>
                        <?php
                            }//end else
                        ?>
                </div>
            </div>
        </div>
    


    <!---------footer----------->

    <div class="footer">
        <div class="container">

            <div class="row">
                <div class="footer-col-1">
                    <h3>Download Our App</h3>
                    <p>Download App for Android and ios mobile phone.</p>
                    <div class="app-logo ">
                        <img src="Photos/app-store-badge.png">
                        <img src="Photos/google-play-badge.png">
                    </div>
                </div>

                <div class="footer-col-2">
                    <img src="Photos/logo-white.png">
                    <p>Shop at 2O2-Multimedia</p>
                </div>

                <div class="footer-col-3">
                    <h3>Useful Links</h3>
                    <ul>
                        <li>Coupons</li>
                        <li>Blog Post</li>
                        <li>Return Policy</li>
                        <li>Join Affiliate</li>
                    </ul>
                </div>

                <div class="footer-col-4">
                    <h3>Follow Us</h3>
                    <ul>
                        <li>Facebook</li>
                        <li>Twitter</li>
                        <li>Instagram</li>
                        <li>YouTube</li>
                    </ul>
                </div>
            </div>
            <hr>
            <p class="copyright ">Copyright 2021 - 2O2-Multimedia</p>
        </div>
    </div>


    <!-------------js for toggle menu----------->

    <script>
        var MenuItems = document.getElementById("MenuItems");

        MenuItems.style.maxHeight = "0px";

        function menutoggle() {
            if (MenuItems.style.maxHeight == "0px") {
                MenuItems.style.maxHeight = "200px";
            } else {
                MenuItems.style.maxHeight = "0px";
            }
        }
    </script>

    <!-------------js for toggle form----------->

    <script>
        var LoginForm = document.getElementById("LoginForm");
        var RegForm = document.getElementById("RegForm");
        var Indicator = document.getElementById("Indicator");

        function login() {
            RegForm.style.transform = "translateX(0px)";
            LoginForm.style.transform = "translateX(0px)";
            Indicator.style.transform = "translateX(100px)";
        }

        function register() {
            RegForm.style.transform = "translateX(300px)";
            LoginForm.style.transform = "translateX(300px)";
            Indicator.style.transform = "translateX(0px)";
        }

        
    </script>

</body>