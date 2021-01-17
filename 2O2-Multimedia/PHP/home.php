<?php
    session_start();
    include('includes/dbh.inc.php');
    try{
        $sql1 = "SELECT thumbnail FROM category WHERE featured = 1 LIMIT 3;";
        $qq1 = $conn->query($sql1);
        $qq1->setFetchMode(PDO::FETCH_ASSOC);
        $sql2 = "SELECT * FROM products WHERE featured = 1 LIMIT 4";
        $qq2 = $conn->query($sql2);
        $qq2->setFetchMode(PDO::FETCH_ASSOC);
        $sql3 = "SELECT * FROM products ORDER BY Added_Date DESC";
        $qq3 = $conn->query($sql3);
        $qq3->setFetchMode(PDO::FETCH_ASSOC);
        $sql4 = "SELECT * FROM products WHERE offer = 1 LIMIT 1;";
        $qq4 = $conn->query($sql4);
        $qq4->setFetchMode(PDO::FETCH_ASSOC);
        
    } catch (PDOException $e){
        die("Could not connect to database :" . $e->getMessage());
    }
?>


<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2O2-Multimedia | Ecommerce Website Design</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <div class="header ">


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

            <div class=" row ">
                <div class="col-2 ">
                    <h1>Give Your Workout<br> A New Style!</h1>
                    <p>lala la</p>
                    <a href=" " class="buton ">Explore Now &#8594;</a>
                </div>

                <div class="col-2 ">
                    <img src="Photos\homepageImage.png ">
                </div>

            </div>

        </div>

    </div>


    <!------------ featured categories ----------->

    <div class="categories ">
        <div class="small-container ">
            <h2 class="title ">Featured Categories</h2>
            <div class="row ">
                <?php
                    while ($row = $qq1->fetch()):
                ?>
                    <div class="col-3 ">
                    <?php echo '<img src="data:thumbnail/jpeg;base64,'.base64_encode($row['thumbnail'] ).'"/>' ?>
                    </div>
                <?php
                    endwhile;
                ?>
            </div>
        </div>
    </div>


    <!------------ featured products ----------->
    <div class="small-container ">
        <h2 class="title ">Featured Products</h2>
        <div class="row ">
                <?php
                    while ($row = $qq2->fetch()):
                ?>
                    <div class="col-4 ">
                        <a href="product-details.php"><?php echo '<img src="data:image1/jpeg;base64,'.base64_encode($row['image1'] ).'"/>' ?></a>
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
                        <p>Rs <?php echo $row['P_Price']; ?></p>
                    </div>
                <?php
                    endwhile;
                ?>
        </div>
    </div>


    <!------------ latest products ----------->
    <div class="small-container ">
        <h2 class="title ">Latest Products</h2>
        
        <div class="row ">
        <?php
            $i = 0;
            while ($row = $qq3->fetch()):
                if ($i==0){
                    echo '<tr>';
                }
            ?>
            <div class="col-4 ">
                <a href="product-details.php"><?php echo '<img src="data:image1/jpeg;base64,'.base64_encode($row['image1'] ).'"/>' ?></a>
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
                <p>Rs <?php echo $row['P_Price']; ?></p>
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
    </div>


    <!----offer----->

    <div class="offer ">
        <div class="small-container ">
            <div class="row ">
            <?php
                while ($row = $qq4->fetch()):
            ?>
                <div class="col-2 ">
                    <?php echo '<img src="data:image1/jpeg;base64,'.base64_encode($row['image1'] ).'"/>' ?>
                </div>
                <div class="col-2 ">
                    <p>Exclusively Available at 2O2-Multimedia</p>
                    <h1><?php echo $row['P_Name']; ?></h1>
                    <small><?php echo $row['P_Desc']; ?></small>
                    <br>
                    <a href="product-details.php " class="buton ">Buy
                    Now &#8594</a>
                </div>
            </div>
            <?php
                endwhile;
            ?>
        </div>
    </div>



    <!------------testimonial------------>

    <div class="testimonial ">
        <div class="small-container ">
            <div class="row ">
                <div class="col-3 ">
                    <i class="fa fa-quote-left "></i>
                    <p>Very good site</p>
                    <div class="rating ">
                        <i class="fa fa-star "></i>
                        <i class="fa fa-star "></i>
                        <i class="fa fa-star "></i>
                        <i class="fa fa-star "></i>
                        <i class="fa fa-star "></i>
                    </div>
                    <img src="Photos/user-1.png ">
                    <h3>Seam Paul</h3>
                </div>

                <div class="col-3 ">
                    <i class="fa fa-quote-left "></i>
                    <p>Very good site</p>
                    <div class="rating ">
                        <i class="fa fa-star "></i>
                        <i class="fa fa-star "></i>
                        <i class="fa fa-star "></i>
                        <i class="fa fa-star "></i>
                        <i class="fa fa-star "></i>
                    </div>
                    <img src="Photos/user-1.png ">
                    <h3>Seam Paul</h3>
                </div>

                <div class="col-3 ">
                    <i class="fa fa-quote-left "></i>
                    <p>Very good site</p>
                    <div class="rating ">
                        <i class="fa fa-star "></i>
                        <i class="fa fa-star "></i>
                        <i class="fa fa-star "></i>
                        <i class="fa fa-star "></i>
                        <i class="fa fa-star "></i>
                    </div>
                    <img src="Photos/user-1.png ">
                    <h3>Seam Paul</h3>
                </div>
            </div>
        </div>
    </div>


    <div class="brands ">
        <div class="small-container ">
            <div class="row ">
                <div class="col-5 ">
                    <img src="Photos/Logitech-logo.png ">
                </div>
                <div class="col-5 ">
                    <img src="Photos/ViewSonic-logo.png ">
                </div>
                <div class="col-5 ">
                    <img src="Photos/OnePlus-logo.png ">
                </div>
                <div class="col-5 ">
                    <img src="Photos/BenQ-logo.png ">
                </div>
                <div class="col-5 ">
                    <img src="Photos/Canon-logo.png ">
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
</body>