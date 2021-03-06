<?php
    // Start the session
    //The session_start() function must be the very first thing in your document. Before any HTML tags.
    session_start();
    include_once 'includes/dbh.inc.php';
    try{
        $sQuery = "SELECT * FROM products;";
        $Result = $conn->query($sQuery);
        $Result->setFetchMode(PDO::FETCH_ASSOC);
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


    <div class="small-container ">

        <div class="row row-2">
            <h2>All Products</h2>
            <select>
                <option>Default Sorting</option>
                <option>Sort by price</option>
                <option>Sort by popularity</option>
                <option>Sort by rating</option>
                <option>Sort by sale</option>
            </select>
        </div>

        
        <div class="row ">
        <?php
            $i = 0; //first, i set a counter 
            while ($row = $Result->fetch()):
                if ($i==0){
                    echo '<tr>';
                }
        ?>
            <div class="col-4 ">
                <a href="product-details.php">
                    <?php echo '<img src="data:image1/jpeg;base64,'.base64_encode($row['image1'] ).'"/>' ?>
                </a>
                <a href="product-details.php">
                <h4><?php echo $row['P_Name']; ?></h4>
                </a>
                <div class="rating ">
                    <i class="fa fa-star "></i>
                    <i class="fa fa-star "></i>
                    <i class="fa fa-star "></i>
                    <i class="fa fa-star "></i>
                    <i class="fa fa-star-half-o "></i>
                </div>
                <p><?php echo $row['P_Price']; ?></p>
            </div>

            <?php 
                if ($i>4){
                $i=0;
                echo '</tr>';
                };
                $i++; //$i = $i + 1 - counter + 1
                endwhile;
            ?>


            
        </div>
        <div class="page-btn">
            <span>1</span>
            <span>2</span>
            <span>3</span>
            <span>4</span>
            <span>&#8594;</span>
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
</body>