<?php
    // Start the session
    //The session_start() function must be the very first thing in your document. Before any HTML tags.
    session_start();
    
    // define variables and set to empty string values

    $nameErr = $emailErr = $messageErr = "";
    $name = $email = $message =  "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        if (empty($_POST["txt_name"])) {
            $nameErr = "Name is required";
        } else {
            $name = $_POST["txt_name"];
        }//end else
        if (empty($_POST["txt_email"])) {
            $emailErr = "Email Address is required";
        } else {
            $email = $_POST["txt_email"];
        }//end else
        if (empty($_POST["txt_message"])) {
            $messageErr = "Message is required";
        } else {
            $message = $_POST["txt_message"];
        }//end else
        
        if($nameErr == "" && $emailErr == "" && $messageErr == "" )
        {
            require_once "includes/dbh.inc.php";
            $sInsert = "INSERT INTO contact (name, email, message) VALUES( '$name' , '$email' , '$message') ";
            #echo $sQuery;
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $Result = $conn->exec($sInsert);
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

    <!-------- contact page-------->

    <div class="contact-page">
        <div class="container">

            <div class="row">
                <div class="contact-col-1">
                    <div class="container">
                        <div class="contactInfo">
                            <div class="box">
                                <div class="icon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <div class="text">
                                    <p>Port Louis</p>
                                </div>
                            </div>
                            <div class="box">
                                <div class="icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="text">
                                    <p>(+230) 54907882</p>
                                </div>
                            </div>
                            <div class="box">
                                <div class="icon">
                                    <i class="fa fa-envelope-o"></i>
                                </div>
                                <div class="text">
                                    <p>202-multimedia@gmail.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="contact-col-2">
                    <div class="contact-form-container">
                        <div class="form-btn">
                            <span>Contact Us</span>
                            <hr id="underline">
                        </div>


                        <form id="ContactForm" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                            <input type="text" name="txt_name" placeholder="Name">
                            <input type="email" name="txt_email" placeholder="Email">
                            <textarea name="txt_message" id="message" placeholder="Enter your message..."></textarea>
                            <button type="submit" class="buton">Send</button>
                        </form>

                        

                    </div>
                </div>
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



</body>