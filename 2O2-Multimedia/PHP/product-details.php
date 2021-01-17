<?php
    // Start the session
    //The session_start() function must be the very first thing in your document. Before any HTML tags.
    session_start();
    include('includes/dbh.inc.php');
    try{
        $sql1 = "SELECT * FROM products WHERE Prod_ID = 1;";
        $qq1 = $conn->query($sql1);
        $qq1->setFetchMode(PDO::FETCH_ASSOC);
    } catch (PDOException $e){
        die("Could not connect to database :" . $e->getMessage());
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

    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="home.php"><img src=" Photos\logo.png " width="125px "></a>
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
            <img src="https://img.icons8.com/material-two-tone/24/000000/menu--v2.png " class="menu-icon " onclick="menutoggle() ">
        </div>
    </div>



    <!------single product details------------>


    <div class="small-container single-product ">
        <div class="row ">
            <div class="col-2 ">
                <img src="Photos/monitor.jpg " width="100% " id="ProductImg ">
                <div class="small-img-row ">
                    <div class="small-img-col ">
                        <img src="Photos/monitor.jpg " class="small-img ">
                    </div>

                    <div class="small-img-col ">
                        <img src="Photos/mouse.jpg " class="small-img ">
                    </div>

                    <div class="small-img-col ">
                        <img src="Photos/monitor.jpg " class="small-img ">
                    </div>

                    <div class="small-img-col ">
                        <img src="Photos/monitor.jpg " class="small-img ">
                    </div>
                </div>
            </div>

            <div class="col-2 ">
                <p>Home / Monitor</p>
                <h1>HP Monitor 23.8 inch</h1>
                <h4>Rs6500</h4>
                <select>
                    <option>Select Colour</option>
                    <option>Black</option>
                    <option>Silver</option>
                </select>
                <input type="number " value="1 ">
                <a href=" " class="buton ">Add to Cart</a>

                <h3>Product Details <i class="fa fa-indent "></i></h3>
                <br>
                <p>See more of your work onscreen with less window toggling on the HP P24 G4 FHD Monitor. It has business-class presentation features, and advanced connectivity to complement today’s workspaces.</p>
            </div>
        </div>
    </div>


    <!------title------->

    <div class="small-container ">
        <div class="row row-2 ">
            <h2>Related Products</h2>
            <p>View More</p>
        </div>
    </div>
    <div class="small-container ">
        <div class="row ">
            <div class="col-4 ">
                <img src="Photos\keyboard.jpg ">
                <h4>Logitech Keyboard MK130</h4>
                <div class="rating ">
                    <i class="fa fa-star "></i>
                    <i class="fa fa-star "></i>
                    <i class="fa fa-star "></i>
                    <i class="fa fa-star "></i>
                    <i class="fa fa-star-half-o "></i>
                </div>
                <p>Rs 4100</p>
            </div>

            <div class="col-4 ">
                <img src="Photos\monitor.jpg ">
                <h4>HP monitor</h4>
                <div class="rating ">
                    <i class="fa fa-star "></i>
                    <i class="fa fa-star "></i>
                    <i class="fa fa-star "></i>
                    <i class="fa fa-star "></i>
                    <i class="fa fa-star-half-o "></i>
                </div>
                <p>Rs 6500</p>
            </div>

            <div class="col-4 ">
                <img src="Photos\mouse.jpg ">
                <h4>Logitech Mouse</h4>
                <div class="rating ">
                    <i class="fa fa-star "></i>
                    <i class="fa fa-star "></i>
                    <i class="fa fa-star "></i>
                    <i class="fa fa-star "></i>
                    <i class="fa fa-star-half-o "></i>
                </div>
                <p>Rs 3200</p>
            </div>

            <div class="col-4 ">
                <img src="Photos\monitor.jpg ">
                <h4>Viewsonic Monitor</h4>
                <div class="rating ">
                    <i class="fa fa-star "></i>
                    <i class="fa fa-star "></i>
                    <i class="fa fa-star "></i>
                    <i class="fa fa-star "></i>
                    <i class="fa fa-star-half-o "></i>
                </div>
                <p>Rs 7300</p>
            </div>
        </div>
    </div>
    </div>



    <!---------footer----------->

    <div class="footer ">
        <div class="container ">

            <div class="row ">
                <div class="footer-col-1 ">
                    <h3>Download Our App</h3>
                    <p>Download App for Android and ios mobile phone.</p>
                    <div class="app-logo ">
                        <img src="Photos/app-store-badge.png ">
                        <img src="Photos/google-play-badge.png ">
                    </div>
                </div>

                <div class="footer-col-2 ">
                    <img src="Photos/logo-white.png ">
                    <p>Shop at 2O2-Multimedia</p>
                </div>

                <div class="footer-col-3 ">
                    <h3>Useful Links</h3>
                    <ul>
                        <li>Coupons</li>
                        <li>Blog Post</li>
                        <li>Return Policy</li>
                        <li>Join Affiliate</li>
                    </ul>
                </div>

                <div class="footer-col-4 ">
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


    <!------js for product gallery------>
    <script>
        var ProductImg = document.getElementById("ProductImg")
        var SmallImg = document.getElementsByClassName("small-img")

        SmallImg[0].onclick = function() {
            ProductImg.src = SmallImg[0].src;
        }
        SmallImg[1].onclick = function() {
            ProductImg.src = SmallImg[1].src;
        }
        SmallImg[2].onclick = function() {
            ProductImg.src = SmallImg[2].src;
        }
        SmallImg[3].onclick = function() {
            ProductImg.src = SmallImg[3].src;
        }
    </script>

</body>