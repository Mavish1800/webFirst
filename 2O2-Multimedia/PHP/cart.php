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
    <!---------cart item details------->

    <div class="small-container cart-page">
        <table>

            <tr>
                <th> Product</th>
                <th> Quantity</th>
                <th> Subtotal</th>
            </tr>
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="Photos/monitor.jpg">
                        <div>
                            <p>HP Monitor</p>
                            <small>Price: Rs6500</small>
                            <br>
                            <a href="">Remove</a>
                        </div>
                    </div>
                </td>
                <td><input type="number" value="1"></td>
                <td>Rs6500</td>
            </tr>
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="Photos/keyboard.jpg">
                        <div>
                            <p>Lgitech Keyboard</p>
                            <small>Price: Rs4100</small>
                            <br>
                            <a href="">Remove</a>
                        </div>
                    </div>
                </td>
                <td><input type="number" value="1"></td>
                <td>Rs4100</td>
            </tr>
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="Photos/mouse.jpg">
                        <div>
                            <p>Logitech Mouse</p>
                            <small>Price: Rs3200</small>
                            <br>
                            <a href="">Remove</a>
                        </div>
                    </div>
                </td>
                <td><input type="number" value="1"></td>
                <td>Rs3200</td>
            </tr>
        </table>


        <div class="total-price">
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td>Rs13800</td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>Rs1380</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>Rs15180</td>
                </tr>
            </table>
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