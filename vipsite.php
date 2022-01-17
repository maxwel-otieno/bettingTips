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
    <title>Bet3ways | VVIP</title>

    <style>
        body{
            background-color: white; color:black;
        }

        /* VIP section */
        .viphead{
            font-weight: bold;
        }
        .viphead-center{
            text-align: center;
            /* margin-bottom: 1rem; */
        }
        .viphead-mini{
            text-align: center; font-size: 26px;
        }
        .vip_hr{
            width: 10%;background-color: gold; font-weight: 800; height: 0.3rem;
        }
        .vip-nav{
            background-color: gold; border-radius: 5px;padding;5px 20px;font-size:18px;
        }
        .vip_h1{
            text-align: center; font-size: 30px;
        }
        .card-vip{
            padding: 40px; margin: 1rem 0; box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.6), 0 10px 40px 0 rgba(0, 0, 0, 0.22);
        }
        .card-vip: p{
            font-size: 20px;
        }
        .card-vip p span.span_1{
            font-size: 22px; font-weight: bold;
        }
        .card-vip p span.mySpan{
            font-size: 20px;
        }
        .ul_li li{
            font-size: 18px; list-style-type: circle;
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
        @media only screen and (max-width: 567px){
            .small_container{
                width: 100%;
            }
            .hr-yangu{
                margin-bottom: 1rem;
            }
            .viphead{
                font-size: 18px;
                font-weight: bold;
                /* margin-bottom: 5px; */
            }
            .viphead-mini{
                font-size: 18px;
                margin-top: 0;
            }
            .vip_h1{
                font-size: 22px;
            }
            .ul_li li{
                font-size: 15px;
            }
            .card-vip{
                padding: 0.8rem;
                box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.6), 0 0 0 0 rgba(0, 0, 0, 0.22);
                margin: 1rem 0;
            }
            .card-vip p{
                font-size: 15px !important;
            }
            .card-vip p span.span_1{
                font-size: 18px;
                padding-bottom: 2rem;
            }
            .card-vip p span.mySpan{
                font-size: 16px;
                padding-bottom: 2rem;
            }
            .vip-contact img{
                width: 15% !important;
            }
        }
    </style>
</head>
<body>
    <!-- header -->
    <header id='home'>
        <!-- Navigation -->
        <nav class="nav">
            <div class="navigation container">
                <div class="logo">
                    <h1>Bet3ways<span style="color: brown; font-size: 25dp;">.com</span></h1>
                </div>
                <div class="menu">
                    <div class="top-nav">
                        <div class="logo">
                            <h1>Bet3ways<span style="color: brown; font-size: 25dp;">.com</span></h1>
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
                            <a href="./about.php" class="nav-link scroll-link">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="./login.php" class="nav-link scroll-link">Login</a>
                        </li>
                        <li class="nav-item">
                            <a href="./index.php" class="nav-link scroll-link">Create Account</a>
                        </li>
                        <li class="nav-item active">
                            <a href="./vipsite.php" class="nav-link scroll-link" style="color: brown; padding: 0.3rem 1.8rem; background-color: gold; border: 1px solid #f4f4f4; font-weight: bold;">VVIP</a>
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

    <div>
        <div class="small_container">
            <!-- ********************************************* -->
            <div class="container vip-nav">                
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

            <div class="container section sectionToMinBlack">
                <div class="card-vip">
                    <h1 class="viphead">Welcome to the VIP section</h1><br>
                    <?php
                        if ($ID == '1'){?>                            
                            <p><span class="span_1">Name :</span> <span class="mySpan"> Maxwel Oduor Otieno</span></p>
                            <p><span class="span_1">Email Address :</span> <span class="mySpan"> admin@gmail.com</span></p>
                            <p><span class="span_1">User ID :</span> <span class="mySpan"> <?php echo rand(100000000, 1000000000);?></span></p>
                            <p><span class="span_1">Plan :</span> <span class="mySpan"> Regular</span></p>

                            <br><br>
                            <h1 class="vip_h1">Subscription Details</h1>
                            <p><span class="span_1">Name :</span> <span class="mySpan"> Maxwel Oduor Otieno</span></p>
                            <p><span class="span_1">Email Address :</span> <span class="mySpan"> admin@gmail.com</span></p>
                            <p><span class="span_1">User ID :</span> <span class="mySpan"> <?php echo rand(100000000, 1000000000);?></span></p>
                            <p><span class="span_1">Plan :</span> <span class="mySpan"> Regular</span></p>
                        <?php }else if($ID == '2'){ ?>

                        <?php }else if($ID == '3') {?>
                            <h1 class="mt-5 mb-4 viphead-mini">Benefits of payed membership</h1>
                            <ul class="ul_li">
                                <li>Access to over 45 league tips forecast by renowned experts</li>
                                <li>Acces to over 20 winning stores (single bets, Sure 2 odds, 3 sure odds)</li>
                                <li>Access to expert prediction/Analysis on jackpot tips</li>
                                <li>Over 92% accuracy rate!!</li>
                                <li>Access to Punter's guide on Risk Management Theory</li>
                            </ul>
                            <h1 class="mt-5 mb-4 viphead viphead-center">Pricing plans</h1><hr class="hr-yangu"/>                          
                            <h3 class="mb-4 viphead">Key Plan Membership</h3>
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th style="text-align:center;">Duration</th>
                                    <th></th>
                                    <th style="text-align:center;">Amount</th>
                                    <th></th>
                                </thead>
                                <tbody style="font-size: 18px;">
                                    <tr>
                                        <td></td>
                                        <td>NGN</td>
                                        <td>Ksh</td>
                                        <td>$</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" style="font-weight: 500;">1 week</td>
                                        <td>500</td>
                                        <td>500</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">1 month</td>
                                        <td>1000</td>
                                        <td>1000</td>
                                        <td>10</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">3 months</td>
                                        <td>2500</td>
                                        <td>2500</td>
                                        <td>25</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">6 months</td>
                                        <td>5500</td>
                                        <td>5500</td>
                                        <td>55</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">1 year</td>
                                        <td>10500</td>
                                        <td>10500</td>
                                        <td>105</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div style="margin: 5rem auto;">
                                <h1 class="viphead">VVIP Ticket Price: Contact us on e-mail or Whatsapp</h1><br>
                                <div class="row vip-contact">
                                    <div class="col-md-6 text-center">
                                        <p style="font-size: 18px;"><img src="./images/whatsapp.png" alt="whatsapp" style="border-radius: 100%;" width="60px">  <strong>+254733366363</strong></p>
                                        <p style="font-size: 18px;">Email : <b>bet3ways@outlook.com</b></p>
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <p style="font-size: 18px;"><img src="./images/telegram.png" alt="telegram" width="60px">  <strong>@nondiz</strong></p>
                                        <p style="font-size: 18px;">Email : <strong>bet3ways@gmail.com</strong></p>
                                    </div>
                                </div>
                            </div>
                            <!-- <span>VVIP Ticket Price: Contact us on e-mail or Whatsapp</span> -->
                            
                            <h1 class="mt-5 mb-4 viphead-mini">Benefits of key plan membership</h1>
                            <ul class="ul_li">
                                <li >Access to one set of Experts ACCA.</li>
                                <li>Punters Guide on Risk Management Theory.</li>
                                <li>Access to Winning Stores (Over/Under 2.5, BTS, Accumulator, Single</li>
                                <li>Combo, Handicap, Draws, Weekend Tips).!</li>
                                <li>Over 80% Accuracy</li>
                            </ul>
                            <button class="btn bg-dark btn-block">Make Payment</button>       <br><br><br>                 

                            <!-- Premium Bet -->
                            <h3 class="mb-4 viphead">Premium Plan Membership</h3>
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th style="text-align:center;">Duration</th>
                                    <th></th>
                                    <th style="text-align:center;">Amount</th>
                                    <th></th>
                                </thead>
                                <tbody style="font-size: 18px;">
                                    <tr>
                                        <td></td>
                                        <td>NGN</td>
                                        <td>Ksh</td>
                                        <td>$</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" style="font-weight: 500;">1 week</td>
                                        <td>1200</td>
                                        <td>1200</td>
                                        <td>12</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">1 month</td>
                                        <td>2000</td>
                                        <td>2000</td>
                                        <td>20</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">3 months</td>
                                        <td>5000</td>
                                        <td>5000</td>
                                        <td>50</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">6 months</td>
                                        <td>10000</td>
                                        <td>10000</td>
                                        <td>100</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">1 year</td>
                                        <td>20000</td>
                                        <td>20000</td>
                                        <td>200</td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            <h1 class="mt-5 mb-4 viphead-mini">Benefits of Premium plan membership</h1>
                            <ul class="ul_li">
                                <li>Access to Experts Prediction/Analysis on Jackpot Tips.</li>
                                <li>Access to two sets of Experts ACCA.</li>
                                <li>Punters Guide on Risk Management Theory.</li>
                                <li>Access to over 45 Leagues Tips forecast by top notch experts.</li>
                                <li>Access to ALL Winning Stores (Sure 2, Sure 3, Single Bet, HT/FT and so on).</li>
                                <li>Over 85% Accuracy</li>
                            </ul>
                            <button class="btn bg-dark btn-block">Make Payment</button>       <br><br><br>     <br><br><br>       
                            
                            <!-- Rollover Bet -->
                            <h3 class="mb-4 viphead">Rollover Bet Membership</h3>
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th style="text-align:center;">Duration</th>
                                    <th></th>
                                    <th style="text-align:center;">Amount</th>
                                    <th></th>
                                </thead>
                                <tbody style="font-size: 18px;">
                                    <tr>
                                        <td></td>
                                        <td>NGN</td>
                                        <td>Ksh</td>
                                        <td>$</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">10 Days</td>
                                        <td>3500</td>
                                        <td>2400</td>
                                        <td>35</td>
                                    </tr>
                                </tbody>
                            </table>
                            <button class="btn bg-dark btn-block">Make Payment</button>       <br><br><br>  <br><br><br>       
                            
                            <!-- smart Bet -->
                            <h3 class="mb-4 viphead">Smart Bet Membership</h3>
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th style="text-align:center;">Duration</th>
                                    <th></th>
                                    <th style="text-align:center;">Amount</th>
                                    <th></th>
                                </thead>
                                <tbody style="font-size: 18px;">
                                    <tr>
                                        <td></td>
                                        <td>NGN</td>
                                        <td>Ksh</td>
                                        <td>$</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" style="font-weight: 500;">5 Days</td>
                                        <td>3000</td>
                                        <td>2500</td>
                                        <td>25</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">1 month</td>
                                        <td>4500</td>
                                        <td>4000</td>
                                        <td>40</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">6 months</td>
                                        <td>6500</td>
                                        <td>6000</td>
                                        <td>60</td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            <h1 class="mt-5 mb-4 viphead-mini">Benefits of Smart Bet membership</h1>
                            <ul class="ul_li">
                                <li>Over 92% Accuracy.</li>
                                <li>Access to Investment Strategy.</li>
                                <li>Steady winning ratio.</li>
                            </ul>
                            <button class="btn bg-dark btn-block">Make Payment</button>       <br><br><br> 

                            <!-- VVIP -->
                            <h3 class="mb-4 viphead">VVIP Plan</h3>
                            <h1 class="viphead-mini">For VVIP payment options contact</h1><br>
                            <div class="row vip-contact">
                                <div class="col-sm-6 text-center">
                                    <p style="font-size: 18px;"><img src="./images/whatsapp.png" alt="whatsapp" style="border-radius: 100%;" width="60px">  <strong>+254733366363</strong></p>
                                    <p style="font-size: 18px;">Email : <b>bet3ways@outlook.com</b></p><br>
                                </div>
                                <div class="col-sm-6 text-center">
                                    <p style="font-size: 18px;"><img src="./images/telegram.png" alt="telegram" width="60px">  <strong>@nondiz</strong></p>
                                    <p style="font-size: 18px;">Email : <strong>bet3ways@gmail.com</strong></p><br>
                                </div>
                            </div>
                            
                            <h1 class="mt-5 mb-4" style="text-align: center; font-size: 21px; font-weight: 500px;">Benefits of VVIP plan</h1>
                            <ul class="ul_li">
                                <li><b>100% winning rate daily</b></li>
                                <li><b>50.00 odds daily</b></li>
                                <li><b>Correct score predictions</b></li>
                                <li><b>Jackpot predictions</b></li>
                                <li><b>100% safe fixed matches</b></li>
                                <li><b>The most accurate tips for high stakers.</b></li>
                                <li><b>Professional expert tips.</b></li>
                            </ul>
                        <?php } ?>
                </div>
            </div>
        </div><hr style="width: 70%; margin: auto; background-color: #fff; font-weight: bold;"/>
    </div>
        <div class="container" style="margin: 5rem auto;">
            <!-- ********************************************* -->
            <div class="d-flex justify-content-center" style="margin-bottom: 5rem;">
                <h2 style="text-decoration: underline; color: brown;">Payment Options</h2>
            </div>
            <div class="row mb-5">
                <div class="col-6 col-lg-2" style="text-align: center; margin-bottom: 3rem;"><img src="./images/bitcoin_1.png" alt="img here"></div>
                <div class="col-6 col-lg-2" style="text-align: center; margin-bottom: 3rem;"><img src="./images/skrill.png"></div>
                <div class="col-6 col-lg-2" style="text-align: center; margin-bottom: 3rem;"><img src="./images/M-pesa.jpg"></div>
                <div class="col-6 col-lg-2" style="text-align: center; margin-bottom: 3rem;"><img src="./images/W_union.jpg"></div>
                <div class="col-6 col-lg-2" style="text-align: center; margin-bottom: 3rem;"><img src="./images/paypal.jpg"></div>
                <div class="col-6 col-lg-2" style="text-align: center; margin-bottom: 3rem;"><img src="./images/master_card.png"></div>
            </div>
            <div style="margin-bottom: 5rem;">
                <h1 class="viphead-mini">For more payment options contact</h1><br>
                <div class="row vip-contact">
                    <div class="col-md-6 text-center">
                        <p style="font-size: 18px;"><img src="./images/whatsapp.png" alt="whatsapp" style="border-radius: 100%;" width="60px">  <strong>+254733366363</strong></p>
                        <p style="font-size: 18px;">Email : <b>bet3ways@outlook.com</b></p><br>
                    </div>
                    <div class="col-md-6 text-center">
                        <p style="font-size: 18px;"><img src="./images/telegram.png" alt="telegram" width="60px">  <strong>@nondiz</strong></p>
                        <p style="font-size: 18px;">Email : <strong>bet3ways@gmail.com</strong></p><br>
                    </div>
                </div>
            </div>
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
                    <a href="./about.php">About Us</a>
                    <a href="policy.php">Privacy Policy</a>
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