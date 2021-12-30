<?php 
    include 'db_config.php';

    $Err = "";

    if ($_SERVER['REQUEST_METHOD'] == 'GET'){
        $ID = $_GET['id'];
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- favicon -->
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
    <!-- Box icons -->
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,500;0,900;1,600&display=swap" rel="stylesheet">
    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="./css/stylesheet.css">
    <title>Tips</title>

    <style>
        body{
            /* background-color: #fff; */
        }
        .small_container{
            width: 90%;
            margin: auto;
        }
        .advert_promo{
            width:70%;
            background-color:orange;
            border-radius:5px;
            min-height: 300px;
            margin-bottom: 50px;
            padding: 20px;
        }
        #promo_code{
            background-color: #969696;
            color: black;
        }
        #promo_code:hover{
            background-color: black;
            color: orange;
        }
        #get_bonus{
            position:relative; bottom: -50px;width: 80%; margin-left:10%; margin-bottom: 5%; background-color:#C13333; border-radius: 30px;
        }
        #get_bonus:hover{
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
        .hr-yangu{
            width: 5%;
            margin: auto;
            margin-top:-1rem;
            background-color: gold;
            font-weight: 800;
            height: 0.3rem;
        }
        .hr-yangu:hover{
            width: 10%;
            background-color: #f4f4f4;
        }
        @media only screen and (max-width: 768px){
            #notShow{
                display: none;
            }
            img{
                width: 40%;
            }
            .small_container{
                width: 70%;
                margin: auto;
            }
            .advert_promo{
                width: 100%;
                min-height: 600px;
            }
        }
    </style>
</head>
<body style="background-color: white; color:black;">
    <!-- header -->
    <header id='home'>
        <!-- Navigation -->
        <nav class="nav">
            <div class="navigation container">
                <div class="logo">
                    <h1>Betting <span style="color: brown; font-size: 25dp;">Tips</span></h1>
                </div>
                <div class="menu">
                    <div class="top-nav">
                        <div class="logo">
                            <h1>Betting <span style="color: brown; font-size: 25dp;">Tips</span></h1>
                        </div>
                        <div class="close">
                            <i class='bx bx-x' ></i>
                        </div>
                    </div>

                    <ul class="nav-list">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link scroll-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="./tips.php" class="nav-link scroll-link">Tips</a>
                        </li>
                        <li class="nav-item">
                            <a href="./livescore.php" class="nav-link scroll-link">Livescore</a>
                        </li>
                        <li class="nav-item">
                            <a href="#about" class="nav-link scroll-link">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="./login.php" class="nav-link scroll-link">Login</a>
                        </li>
                        <li class="nav-item">
                            <a href="./index.php" class="nav-link scroll-link">Create Account</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="cart.html" class="nav-link icon"><i class="bx bx-shopping-bag"></i></a>
                        </li> -->
                    </ul>
                </div>

                <div class="hamburger">
                    <i class="bx bx-menu"></i>
                </div>
            </div>
        </nav>
            <?php
                if(!empty($Err)){
                    echo $Err;
            }
            ?>

    </header>

    <div style="min-height: 400px; margin-bottom: 100px;" class="mt-5">
        <div class="small_container">
            <!-- ********************************************* -->
            <div class="container" style="background-color: gold; border-radius: 5px;padding;5px 20px;font-size:18px;">                
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="vipsite.php?id=1" class="nav-link scroll-link">Account details</a>
                    </li>
                    <li class="nav-item">
                        <a href="./vipsite.php?id=2" class="nav-link scroll-link">How to subscribe</a>
                    </li>
                    <li class="nav-item">
                        <a href="./vipsite.php?id=3" class="nav-link scroll-link">Make payment</a>
                    </li>
                    <li class="nav-item">
                        <a href="#about" class="nav-link scroll-link">Upgrade Plan</a>
                    </li>
                    <li class="nav-item">
                        <a href="./login.php" class="nav-link scroll-link">Banker's Tip of the Day</a>
                    </li>
                    <li class="nav-item">
                        <a href="./index.php" class="nav-link scroll-link">Betting Glossary</a>
                    </li>
                </ul>
            </div>

            <div class="container">
                <div style="padding: 40px; margin: 6rem 0; box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.6), 0 10px 40px 0 rgba(0, 0, 0, 0.22);">
                    <h1 style="font-weight: bold;">Welcome to the VIP section</h1><hr style="width: 10%;background-color: gold; font-weight: 800; height: 0.3rem;"/><br>
                    <?php
                        if ($ID == '1'){?>                            
                            <p><span style="font-size: 25px; font-weight: bold;">Name :</span> <span style="font-size: 22px;"> Maxwel Oduor Otieno</span></p><br>
                            <p><span style="font-size: 25px; font-weight: bold;">Email Address :</span> <span style="font-size: 22px;"> admin@gmail.com</span></p><br>
                            <p><span style="font-size: 25px; font-weight: bold;">User ID :</span> <span style="font-size: 22px;"> <?php echo rand(100000000, 1000000000);?></span></p><br>
                            <p><span style="font-size: 25px; font-weight: bold;">Plan :</span> <span style="font-size: 22px;"> Regular</span></p>

                            <br><br><br>
                            <h1 style="text-align: center; font-size: 30px;">Subscription Details</h1>
                            <br><br>
                            <p><span style="font-size: 25px; font-weight: bold;">Name :</span> <span style="font-size: 22px;"> Maxwel Oduor Otieno</span></p><br>
                            <p><span style="font-size: 25px; font-weight: bold;">Email Address :</span> <span style="font-size: 22px;"> admin@gmail.com</span></p><br>
                            <p><span style="font-size: 25px; font-weight: bold;">User ID :</span> <span style="font-size: 22px;"> <?php echo rand(100000000, 1000000000);?></span></p><br>
                            <p><span style="font-size: 25px; font-weight: bold;">Plan :</span> <span style="font-size: 22px;"> Regular</span></p>
                        <?php }else if($ID == '2'){ ?>

                        <?php }else if($ID == '3') {?>
                            <h1 class="mt-5 mb-4" style="text-align: center; font-size: 26px; font-weight: 500px;">Benefits of payed membership</h1>
                            <ul>
                                <li style="font-size: 17px;">Access to over 45 league tips forecast by renowned experts</li>
                                <li>Acces to over 20 winning stores (single bets, Sure 2 odds, 3 sure odds)</li>
                                <li>Access to expert prediction/Analysis on jackpot tips</li>
                                <li>Over 92% accuracy rate!!</li>
                                <li>Access to Punter's guide on Risk Management Theory</li>
                            </ul>
                            <h1 class="mt-5 mb-4" style="text-align: center; font-size: 26px; font-weight: 500px;">Pricing plans</h1><hr class="hr-yangu"/>                          
                            <h3 class="mb-4" style="font-size: 21px; font-weight: 300px; font-weight: 600;">Key Plan Membership</h3>
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th style="text-align:center;">Duration</th>
                                    <th></th>
                                    <th style="text-align:center;">Amount</th>
                                    <th></th>
                                </thead>
                                <tbody style="font-size: 18px;">
                                    <tr>
                                        <td class="text-center" style="font-weight: 500;">1 week</td>
                                        <td>200</td>
                                        <td>300</td>
                                        <td>2000</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">1 month</td>
                                        <td>200</td>
                                        <td>300</td>
                                        <td>2000</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">3 months</td>
                                        <td>200</td>
                                        <td>300</td>
                                        <td>2000</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">6 months</td>
                                        <td>200</td>
                                        <td>300</td>
                                        <td>2000</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">1 year</td>
                                        <td>200</td>
                                        <td>300</td>
                                        <td>2000</td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            <h1 class="mt-5 mb-4" style="text-align: center; font-size: 21px; font-weight: 500px;">Benefits of key plan membership</h1>
                            <ul>
                                <li style="font-size: 17px;">Access to one set of Experts ACCA.</li>
                                <li>Punters Guide on Risk Management Theory.</li>
                                <li>Access to Winning Stores (Over/Under 2.5, BTS, Accumulator, Single</li>
                                <li>Combo, Handicap, Draws, Weekend Tips).!</li>
                                <li>Over 80% Accuracy</li>
                            </ul>
                            <button class="btn bg-dark btn-block">Make Payment</button>       <br><br><br>                 

                            <!-- Premium Bet -->
                            <h3 class="mb-4" style="font-size: 21px; font-weight: 300px; font-weight: 600;">Premium Plan Membership</h3>
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th style="text-align:center;">Duration</th>
                                    <th></th>
                                    <th style="text-align:center;">Amount</th>
                                    <th></th>
                                </thead>
                                <tbody style="font-size: 18px;">
                                    <tr>
                                        <td class="text-center" style="font-weight: 500;">1 week</td>
                                        <td>200</td>
                                        <td>300</td>
                                        <td>2000</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">1 month</td>
                                        <td>200</td>
                                        <td>300</td>
                                        <td>2000</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">3 months</td>
                                        <td>200</td>
                                        <td>300</td>
                                        <td>2000</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">6 months</td>
                                        <td>200</td>
                                        <td>300</td>
                                        <td>2000</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">1 year</td>
                                        <td>200</td>
                                        <td>300</td>
                                        <td>2000</td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            <h1 class="mt-5 mb-4" style="text-align: center; font-size: 21px; font-weight: 500px;">Benefits of Premium plan membership</h1>
                            <ul>
                                <li style="font-size: 17px;">Access to Experts Prediction/Analysis on Jackpot Tips.</li>
                                <li style="font-size: 17px;">Access to two sets of Experts ACCA.</li>
                                <li>Punters Guide on Risk Management Theory.</li>
                                <li>Access to over 45 Leagues Tips forecast by top notch experts.</li>
                                <li>Access to ALL Winning Stores (Sure 2, Sure 3, Single Bet, HT/FT and so on).</li>
                                <li>Over 85% Accuracy</li>
                            </ul>
                            <button class="btn bg-dark btn-block">Make Payment</button>       <br><br><br>     <br><br><br>       
                            
                            <!-- Rollover Bet -->
                            <h3 class="mb-4" style="font-size: 21px; font-weight: 300px; font-weight: 600;">Rollover Bet Membership</h3>
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th style="text-align:center;">Duration</th>
                                    <th></th>
                                    <th style="text-align:center;">Amount</th>
                                    <th></th>
                                </thead>
                                <tbody style="font-size: 18px;">
                                    <tr>
                                        <td class="text-center" style="font-weight: 500;">1 week</td>
                                        <td>200</td>
                                        <td>300</td>
                                        <td>2000</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">1 month</td>
                                        <td>200</td>
                                        <td>300</td>
                                        <td>2000</td>
                                    </tr>
                                </tbody>
                            </table>
                            <button class="btn bg-dark btn-block">Make Payment</button>       <br><br><br>  <br><br><br>       
                            
                            <!-- smart Bet -->
                            <h3 class="mb-4" style="font-size: 21px; font-weight: 300px; font-weight: 600;">Smart Bet Membership</h3>
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th style="text-align:center;">Duration</th>
                                    <th></th>
                                    <th style="text-align:center;">Amount</th>
                                    <th></th>
                                </thead>
                                <tbody style="font-size: 18px;">
                                    <tr>
                                        <td class="text-center" style="font-weight: 500;">1 week</td>
                                        <td>200</td>
                                        <td>300</td>
                                        <td>2000</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">1 month</td>
                                        <td>200</td>
                                        <td>300</td>
                                        <td>2000</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">6 months</td>
                                        <td>200</td>
                                        <td>300</td>
                                        <td>2000</td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            <h1 class="mt-5 mb-4" style="text-align: center; font-size: 21px; font-weight: 500px;">Benefits of Smart Bet membership</h1>
                            <ul>
                                <li style="font-size: 17px;">Over 92% Accuracy.</li>
                                <li style="font-size: 17px;">Access to Investment Strategy.</li>
                                <li>Steady winning ratio.</li>
                            </ul>
                            <button class="btn bg-dark btn-block">Make Payment</button>       <br><br><br> 
                        <?php } ?>
                </div>
            </div>
        </div><hr style="width: 70%; margin: auto; background-color: #fff; font-weight: bold;"/>
    </div>
        <div class="container" style="min-height: 200px;">
            <!-- ********************************************* -->
        </div>

    <!-- Footer -->
    <footer id="footer" class="section footer">
        <div class="container">
            <div class="footer-container">
                <div class="footer-center">
                    <h3>EXTRAS</h3>
                    <a href="#">Brands</a>
                    <a href="#">Gift Certificates</a>
                    <a href="#">Affiliate</a>
                    <a href="#">Specials</a>
                    <a href="#">Site Map</a>
                </div>
                <div class="footer-center">
                    <h3>INFORMATION</h3>
                    <a href="#">About Us</a>
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms & Conditions</a>
                    <a href="#">Contact Us</a>
                    <a href="#">Site Map</a>
                </div>
                <div class="footer-center">
                    <h3>MY ACCOUNT</h3>
                    <a href="#">My Account</a>
                    <a href="#">Order History</a>
                    <a href="#">Wish List</a>
                    <a href="#">Newsletter</a>
                    <a href="#">Returns</a>
                </div>
                <div class="footer-center">
                    <h3>CONTACT US</h3>
                <div>
                    <span>
                    <i class="fas fa-map-marker-alt"></i>
                    </span>
                    42 Dream House, Dreammy street, 7131 Dreamville, USA
                </div>
                <div>
                    <span>
                    <i class="far fa-envelope"></i>
                    </span>
                    company@gmail.com
                </div>
                <div>
                    <span>
                    <i class="fas fa-phone"></i>
                    </span>
                    456-456-4512
                </div>
                <div>
                    <span>
                    <i class="far fa-paper-plane"></i>
                    </span>
                    Dream City, USA
                </div>
            </div>
        </div>
    </footer>
    <script>
        function myFunction(){
            console.log("Clicked");
        }
    </script>

    <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js"></script>
    <!-- Custom Script -->
    <script src="./js/index.js"></script>
</body>
</html>