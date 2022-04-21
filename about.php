<?php 
    include 'db_config.php';

    $Err = "";

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
    
    <!-- logo -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/ball_2.png">
    <title>Bet3ways | About</title>

    <style>
        body{
            /* margin-left: 7px; */
            width: 100%;
            margin: auto;
            /* background-color: #fff; */
            /* padding-left: 5px; */
            overflow-x: hidden;
            background-color: white; color:black;
        }
        .small_container{
            width: 90%;
            margin: auto;
        }
        .my_H1{
            text-align: center; font-size: 35px; font-weight: 500px; margin-bottom: 4rem;
        }
        .my_about{
            text-align: center; font-size: 31px; font-weight: 500px; margin-top: 5rem;
        }
        .bet_sites{
            text-align: center; font-size: 25px; font-weight: 500px; margin-bottom: 1rem; margin-top: 3rem; color: brown;
        }
        .bet_sites_a{
            font-size: 23px; margin-top: 1rem;color: brown;
        }
        .btn-join{
            font-size:13px;
        }
        .frames{
            display: none;
        }
        .free_money_hr{
            width: 15%; background-color: #C13333; font-weight: bold; height: 0.2rem; margin-bottom: 4rem;
        }
        #football{
            width:5%; height:5%;
        }

        /* PROMO */
        /* .advert_promo{
            width: 100%;
            background-color:orange;
            border-radius:5px;
            margin: auto;
            margin-top: 1rem;
            padding: 10px;
        }
        .advert_promo img{
            width: 30rem;
            margin-top: -10px;
        }
        #promo_code{
            background-color: orange;
            border: 4px solid grey;
            color: grey;
            font-size: 16px;
        }
        #promo_code:hover{
            background-color: #f4f4f4;
            border: none;
            color: grey;
        }
        .bonus_amt{
            padding-top: 4rem;
            color: #C13333; 
            font-size: 31px; 
            font-weight: 500;
            letter-spacing: 1.5px;
        }
        #get_bonus{
            position:relative;
            bottom: -5px;
            width: 80%;
            margin-left:10%;
            margin-bottom: 5%;
            background-color:#C13333;
            border-radius: 30px;
            font-size: 18px;
            text-decoration: none; 
            font-family: 'Times New Roman', Times, serif;
        }
        #get_bonus:hover{
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        } *//* PROMO */
        .advert_promo{
            width: 70%;
            background-color:orange;
            border-radius:5px;
            margin: auto;
            margin-top: 3rem;
            padding: 5px;
            margin-bottom: 4rem;
        }
        .advert_promo img{
            width: 20rem;
            margin-top: 22px;
        }
        #promo_code{
            background-color: orange;
            border: 3px solid grey;
            color: grey;
            padding: 1rem 3rem !important;
            font-size: 13px;
        }
        #promo_code:hover{
            background-color: #f4f4f4;
            border: none;
            color: grey;
        }
        .bonus_amt{
            padding-top: 4rem;
            color: #C13333; 
            font-size: 23px; 
            font-weight: 550;
            letter-spacing: 1.5px;
        }
        #get_bonus{
            position:relative;
            bottom: -5px;
            width: 80%;
            margin-left:10%;
            margin-bottom: 5%;
            background-color:#C13333;
            border-radius: 30px;
            font-size: 16px;
            text-decoration: none; 
            font-family: 'Times New Roman', Times, serif;
        }
        #get_bonus:hover{
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        /*tables */
        .td_bonus{
            padding: 6px 17px;
        }
        table tbody tr td{
            vertical-align: center; text-align: center;
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
        .p_about{
            text-align:center; font-size: 17px; margin-bottom: 6rem
        }
        @media only screen and (max-width: 1200px){
            
            /*tables */
            .td_bonus{
                padding: 4px 14px;
                /* font-size: 40px; */
            }
            #football{
                width:7%; height:7%;
            }
        }
        @media only screen and (max-width: 1024px){            
            /*tables */
            .td_bonus{
                padding: 4px 14px;
                /* font-size: 40px; */
            }
            #football{
                width:%; height:7%;
            }
        }
        @media only screen and (max-width: 978px){            
            .advert_promo{
                width: 90%;
                min-height: 340px;
            }
            .advert_promo img{
                width: 20rem;
                margin-top: 5px;
                margin-bottom: 0px;
            }
            .bonus_amt{
                padding-top: 0.2rem;
            }
            
            /*tables */
            .td_bonus{
                padding: 10px 30px;;
                /* font-size: 40px; */
            }
            #football{
                width:8%; height:8%;
            }
        }
        @media only screen and (max-width: 768px){
            .headers_min{
                font-size: 14px;
                /* color: white; */
            }
            #notShow{
                display: none;
            }
            .small_container{
                width: 100%;
                margin: auto;
            }
            .myHr{
                display: none;
            }
            h1{
                font-size: 20px;
            }
            p{
                font-size: 15px !important;
            }
            li{
                font-size: 14px !important;
            }

            /*tables */
            .td_bonus{
                padding: 10px 20px;;
                /* font-size: 40px; */
            }
            #football{
                width:7%; height:7%;
            }

            /*Bottom links */

            .bottomLink h1{
                font-size: 18px;
            }
            .bottomLink h2{
                font-size: 14px;
            }
        }
        @media only screen and (max-width: 567px){   
            body{
                padding-left: 10px;
            }
            .frames{
                display: block;
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
                text-align: center;
                z-index: 9999;
            }
            .small_container{
                width: 100%;
                /* margin: auto; */
            }
            .my_H1{
                font-size: 22px;
            }
            .my_about{
                font-size: 30px;
            }
            .bet_sites{
                font-size: 22px;
            }
            .bet_sites_a{
                font-size: 20px;
            }
            .btn-join{
                font-size: 12px;
                padding: 7px 13px;
                border-radius: 6px;
                margin-top: opx;
            }
            .free_money_hr{
                height: 0.2rem; 
                width: 10%;
                margin-bottom: 4rem;
                margin-top: 0px;
            }

            /*Bottom Links */
            /* .bottomLink h1{
                font-size: 18px;
                margin-top: 2rem;
            }
            .bottomLink h2{
                font-size: 14px;
            } */

            /*Advert */
            .advert_promo img{
                width:20rem !important;
                /* margin-top: -20px; */
                /* margin:0; */
            }
            .bonus_amt{
                text-align: center;
                color: #C13333; 
                font-size: 25px; 
                padding: 0;
                margin-top: -30px;
                font-weight: 500;
                letter-spacing: 0px;
            }
            #get_bonus{
                font-size: 12px;
                border-radius: 40px;
                padding: 10px 10px;
            }
            #promo_code{
                background-color: orange;
                border: 2px solid grey;
                color: grey;
                font-size: 13px;
                text-align: center;
                padding: 5px 10px;
            }

            /*tables */
            table td span{
                vertical-align: center; 
                text-align: center;
            }
            .td_bonus{
                padding: 7px 17px;;
                /* font-size: 40px; */
            }
            table td img{
                width: 75px;
            }
            #football{
                width:14%; height: 14%;
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
                    <div class="d-flex">
                        <img src="./images/ball_2.png" alt="" id="football"><h1 style="font-size:32px; font-weight: bold;">Bet3<span style="color: brown; font-size: 29dp;">Ways</span></h1></img>
                    </div>
                    <!-- <img src="./images/Bet3ways_logo.jpg" alt="Bet3Ways.com" width="35%"> -->
                </div>
                <div class="menu">
                    <div class="top-nav">
                        <div class="logo">
                            <div class="d-flex">
                                <img src="./images/ball_2.png" alt="" id="football"><h1 style="font-size:32px; font-weight: bold;">Bet3<span style="color: brown; font-size: 29dp;">Ways</span></h1></img>
                            </div>
                    <!-- <img src="./images/Bet3ways_logo.jpg" alt="Bet3Ways.com"> -->
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
                            <a href="./livescores/index.php" class="nav-link scroll-link">Livescore</a>
                        </li>
                        <li class="nav-item active">
                            <a href="./about.php" style="color:brown;" class="nav-link scroll-link">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="./articles.php?articleID=<?php echo rand(1, 5);?>" class="nav-link scroll-link">Blogs</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="./login.php" class="nav-link scroll-link">Login</a>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a href="./index.php" class="nav-link scroll-link">Create Account</a>
                        </li> -->
                        <li class="nav-item">
                           <a href="./vipsite.php" class="nav-link scroll-link" style="color: white; font-size: 16px; padding: 0.5rem 2rem; background-color: brown;border-radius: 20px;">VVIP</a>
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
        <div class="frames">
            <iframe scrolling='no' frameBorder='0' style='padding:0px; margin:0px; border:0px;border-style:none;border-style:none;' width='320' height='80' src="https://refpasrasw.world/I?tag=d_723421m_32751c_&site=723421&ad=32751" ></iframe>
        </div>
        <div class="advert_promo" style="padding-bottom: 20px;">
            <div class="row" style="padding:0;">
                <div class="col-lg-6 p-5">
                    <div class="d-flex justify-content-center">
                        <div>
                        <a href="https://1xbet.co.ke/?tag=d_1248161m_47149c_" style="cursor: pointer;"><img src="./images/1x_bet.png" alt="" style=""></a><br></div>
                    </div>
                </div>
                <div class="col-lg-6 p-5">
                    <div class="d-flex justify-content-center">
                        <div>
                            <h1 class="bonus_amt">GET ₦ 100,000 BONUS</h1>
                            <div style="text-align: center;">
                                <button class="btn" style="" id="promo_code">PROMO CODE : &nbsp;&nbsp;&nbsp;</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-block" id="get_bonus"><a href="https://1xbet.co.ke/?tag=d_1248161m_47149c_" style="text-decoration:none; color: white;">GET YOUR BONUS</a></button>
        </div>
    </div>
        <?php
            // $entry_num = 101;
            // $interval = 15;
            // $iterations = floor($entry_num/$interval);
            // $remainder = $entry_num%$interval;

            // echo $iterations."<br>";
            // echo "Remainder = ".$remainder."<br>";
            // for($a=0; $a<$iterations; $a++){
            //     $i = ($a*15);
            //     // $i = 1;
            //     // echo $i."<br>";

            //     for($b=$i; $b<($i+15); $b++){
            //         echo " ".$b;
            //     }
            //     echo "<br>My name is Maxwel<br>";
            // }
            // $last_num = $interval*$iterations;
            // // echo $last_num;
            // for($c=$last_num; $c<$entry_num; $c++){
            //     echo "<br>".$c;
            // }
            ?>
    <div class="small_container">
        <h1 class="mb-4 my_about">About Us</h1>
        <p class="p_about" style="margin-top: 5rem;">At Bet3ways.com, We set a benchmark of making provision of safe and accurate football tips you can trust! Bet3ways.com predictions, tips & analysis are based on algorithms, detailed analysis, betting tips, forms and statistics. We have dedicated experts that are passionate in ensuring you make profits steadily!</p>

        <p class="p_about">We are dedicated to ensuring maximum gains and returns for you by providing valued bets on soccer predictions. We provide you with the most accurate and guaranteed football tips everyday of the week. We are relentless in our drive to assist many bettors make good use of the tips we provide to guarantee profits. Our strong presence in Kenya, Tanzania, South Africa, Uganda, Nigeria, Cyprus, Russia, United Kingdom, USA and other European countries makes us the number destination for all things related to soccer forecasts.</p>

        <p class="p_about">Our tipsters at Bet3ways.com offer predictions for over 50 leagues. We are thorough in our work and have the success of our users in mind. We promise to aid you in your bets!</p>
            
        <!-- Another Advert -->
        <div class="d-flex justify-content-center" style="margin:auto; margin-bottom: 5rem;"><a href="https://www.betway.co.ke/?btag=P77487-PR23747-CM67345-TS271152"; target="_blank" rel="nofollow"><img src="https://secure.betwaypartnersafrica.com/imagehandler/bf3af941-a798-4963-aea7-bb6c0e81f606/" alt="" /></a></div>

        <h1 class=" my_H1">WHAT IS THE BEST WAY OF MAKING MONEY WITH FOOTBALL BETTING?</h1>
        <p class="p_about">Betting is a popular trend in the world of football. Although, it could turn out to be a risky task but when done sensibly, it could be fun and intriguing. But how do you make the most of your bets? What’s the best way to smash the bookmakers? Bet3ways.com has proven strategies to ensure you always win more than you lose. No wonder, they are deemed as the best football prediction site of the year and one of the most accurate soccer prediction sites.</p>

        <p class="p_about">However, there is a need for proper guidance and adequate information when it comes to betting if you want to become a successful punter. Ranging from 50 odds to 10 odds to 3 odds, 2 odds, single bets, OVER 1.5, OVER 2.5, Double Chance to mention a few winning betting tips, Bet3ways.com will aid you predict a football match correctly. If you are looking for sites that predict football matches correctly, Bet3ways.com is the best football prediction site.</p>

        <p class="p_about">At Bet3ways.com, we offer football predictions/soccer tips and in-depth analysis for over 50 leagues (both major leagues - English Premier League Predictions, Serie A Predictions, La Liga Predictions, Bundesliga Predictions, French Ligue 1 Predictions etc... minor leagues- English Championship, Serie B, Segunda League and many others.) playing across the globe. Our unique system of categorizing football predictions and tips in different betting market (such as BTTS, OVER 2.5, UNDER 2.5, SINGLE BET, ACCUMULATORS, DOUBLE CHANCE, SURE 2 ODDS, SURE 3 ODDS and many others) makes it swift for punters with a specific/favorite betting tips in mind have an easy surfing experience and gives them the flexibility they deserve. Our analysis can delve even further and reveal the likelihood of specific outcomes, such as the probability of each teams actual score outcome (CORRECT SCORE tips/predictions), though some believe in fixed matches.</p>

        <div class="row">
            <div class="col-lg-9">
                <h1 class="my_H1">Best Betting Sites in Africa</h1>    
                <p class="p_about">One secret to becoming a professional sports bettor is to pick the best betting site in Africa for you – depending on your betting needs. The perfect betting site should provide a proper mix of high odds, good bonuses and promos, adequate features, fast payouts, and excellent customer service. We have analyzed all betting sites in Africa and we have selected the following as the best in the country as they are highly recommended by the experts here at Bet3ways.com.</p>            
                <table class="table table-striped table-bordered" style="margin-bottom: 6rem; width: 100%;">
                    <tbody>
                        <!-- 22bet link -- https://m.22bet.co.ke/?tag=d_723421m_32751c_ -->
                        <tr>
                            <td><a  href="https://lp.22betpartners.com/p/multisport-nigeria/index-ng.php?btag=439991_FE66D4BDCD2C4A8B94C91623BD4B3B07" target="_blank"><img width="90px" class="img-fluid" src="images/22Bet_1.JPG" alt="Image Here"/></a></td>
                            <td><div class="d-flex justify-content-center" style="align-self: center; padding-top: 40px;"><a href="https://lp.22betpartners.com/p/multisport-nigeria/index-ng.php?btag=439991_FE66D4BDCD2C4A8B94C91623BD4B3B07" target="_blank">22Bet</a></div></td>
                            <td><a href="https://lp.22betpartners.com/p/multisport-nigeria/index-ng.php?btag=439991_FE66D4BDCD2C4A8B94C91623BD4B3B07" class="text-center" target="_blank"><span style="margin-top: 1rem; margin-bottom: -10px; color: red; font-size: 15px;">₦ 50,000<br></span><span class="btn bg-warning td_bonus">Get Bonus</span></a></td>
                        </tr>
                        <tr>
                            <td><a class="d-flex justify-content-center align-items-center" href="https://www.betway.co.ke/?btag-P77487-PR23169-CM63192-TS271152" style="padding-top: 10px;"><img width="90px;" class="img-fluid" src="./images/betway.png" alt="Image Here"/></a></td>
                            <td><div class="d-flex justify-content-center" style="align-self: center; padding-top: 50px;"><a href="https://www.betway.co.ke/?btag-P77487-PR23169-CM63192-TS271152">BetWay</a></div></td>
                            <td style="padding: 2rem;"><a href="https://www.betway.co.ke/?btag-P77487-PR23169-CM63192-TS271152" class="text-center" target="_blank"><span style="margin-top: 1rem; margin-bottom: -10px; color: red; font-size: 15px;">₦ 100,000<br></span><span class="btn bg-warning td_bonus">Get Bonus</span></a></td>
                        </tr>
                        <tr>
                            <td><a class="d-flex justify-content-center align-items-center" href="https://melbet.ke/?tag=d_730661m_" target="_blank"><img width="90px;" class="img-fluid" src="images/melbet.jfif" alt="Image Here"/></a></td>
                            <td><div class="d-flex justify-content-center" style="align-self: center; padding-top: 25px;"><a href="https://melbet.ke/?tag=d_730661m_" target="_blank">Melbet</a></div></td>
                            <td><a href="https://melbet.ke/?tag=d_730661m_" class="text-center" target="_blank"><span style="margin-top: 1rem; margin-bottom: -10px; color: red; font-size: 15px;">₦ 2,000<br></span><span class="btn bg-warning td_bonus">Get Bonus</span></a></td>
                        </tr>
                        <tr>
                            <td><a class="d-flex justify-content-center align-items-center" href="https://1xbet.co.ke/?tag=d_1248161m_47149c_" target="_blank"><img width="100px;" class="img-fluid" src="images/1x_bet.png" alt="Image Here"/></a></td>
                            <td><div class="d-flex justify-content-center" style="align-self: center; padding-top: 25px;"><a href="https://1xbet.co.ke/?tag=d_1248161m_47149c_" target="_blank">1Xbet</a></div></td>
                            <td><a href="https://1xbet.co.ke/?tag=d_1248161m_47149c_" class="text-center" target="_blank"><span style="margin-top: 1rem; margin-bottom: -10px; color: red; font-size: 15px;">₦ 100,000<br></span><span class="btn bg-warning td_bonus">Get Bonus</span></a></td>
                        </tr>
                        <tr>
                            <td><a class="d-flex justify-content-center align-items-center" href="https://lp.22betpartners.com/p/multisport-nigeria/index-ng.php?btag=439991_FE66D4BDCD2C4A8B94C91623BD4B3B07" target="_blank"><img width="100px;" class="img-fluid" src="images/bet_winner.png" alt="Image Here"/></a></td>
                            <td><div class="d-flex justify-content-center" style="align-self: center; padding-top: 25px;"><a href="https://lp.22betpartners.com/p/multisport-nigeria/index-ng.php?btag=439991_FE66D4BDCD2C4A8B94C91623BD4B3B07" target="_blank">BetWinner</a></div></td>
                            <td><a href="https://lp.22betpartners.com/p/multisport-nigeria/index-ng.php?btag=439991_FE66D4BDCD2C4A8B94C91623BD4B3B07" class="text-center" target="_blank"><span style="margin-top: 1rem; margin-bottom: -10px; color: red; font-size: 15px;">₦ 100,000<br></span><span class="btn bg-warning td_bonus">Get Bonus</span></a></td>
                        </tr>
                        <tr>
                            <td><a class="d-flex justify-content-center align-items-center" href="https://lp.22betpartners.com/p/multisport-nigeria/index-ng.php?btag=439991_FE66D4BDCD2C4A8B94C91623BD4B3B07" target="_blank"><img width="100px;" class="img-fluid" src="images/22Bet_1.JPG" alt="Image Here"/></a></td>
                            <td><div class="d-flex justify-content-center" style="align-self: center; padding-top: 25px;"><a href="https://lp.22betpartners.com/p/multisport-nigeria/index-ng.php?btag=439991_FE66D4BDCD2C4A8B94C91623BD4B3B07" target="_blank">22Bet</a></div></td>
                            <td><a href="https://lp.22betpartners.com/p/multisport-nigeria/index-ng.php?btag=439991_FE66D4BDCD2C4A8B94C91623BD4B3B07" class="text-center" target="_blank"><span style="margin-top: 1rem; margin-bottom: -10px; color: red; font-size: 15px;">₦ 100,000<br></span><span class="btn bg-warning td_bonus">Get Bonus</span></a></td>
                        </tr>
                        <tr>
                            <td><a class="d-flex justify-content-center align-items-center" href="https://lp.22betpartners.com/p/multisport-nigeria/index-ng.php?btag=439991_FE66D4BDCD2C4A8B94C91623BD4B3B07" target="_blank"><img width="100px;" class="img-fluid" src="images/22Bet_1.JPG" alt="Image Here"/></a></td>
                            <td><div class="d-flex justify-content-center" style="align-self: center; padding-top: 25px;"><a href="https://lp.22betpartners.com/p/multisport-nigeria/index-ng.php?btag=439991_FE66D4BDCD2C4A8B94C91623BD4B3B07" target="_blank">Bet3ways</a></div></td>
                            <td><a href="https://lp.22betpartners.com/p/multisport-nigeria/index-ng.php?btag=439991_FE66D4BDCD2C4A8B94C91623BD4B3B07" class="text-center" target="_blank"><span style="margin-top: 1rem; margin-bottom: -10px; color: red; font-size: 15px;">₦ 100,000<br></span><span class="btn bg-warning td_bonus">Get Bonus</span></a></td>
                        </tr>
                    </tbody>
                </table>
                <h1 class="my_H1">How we Rank the Top Betting Sites in Africa</h1>
                <p class="p_about">Although there are very many registered bookies in the country, very few have all the features that make a betting site stand out. As pro-bettors, the team at Betmoran has had the opportunity to use all the top bookies from around the world, including in Nigeria. This has given us the unique ability to easily discern which is a proper betting site and which is not. You are spending your money and you deserve to get the best experience possible. To make judgement easier, we have come up with a simple formula based on five key criteria that we use to rank all sites that we come across.</p>

                <div style="margin-bottom: 4rem">
                    <h1 class="bet_sites">1xbet</h1>
                    <p class="p_about">1xBet is a new entrant to the Nigerian gaming industry. Regarded as a market leader coming from the European continent where the betting industry is highly mature, it offers a 300 per cent sign-on bonus for new customers. Another unique characteristic about the new kid on the block is that it allows for direct deposit to gaming wallets as a result of a partnership between the company and several Nigerian banks. As with most of the competitors, it also provides for cash out and instant payout for winnings. However it has a cap of maximum winnings at 200,000 Euros or 73,000,000 Naira.</p>

                    <h3 class="bet_sites_a">Pros</h3>
                    <ul>
                        <li style="font-size: 17px;">Good range of sports</li>
                        <li style="font-size: 17px;">Virtual markets</li>
                        <li style="font-size: 17px;">Free deposits and withdrawals</li>
                        <li style="font-size: 17px;">Excellent round the clock customer service</li>
                    </ul>
                    

                    <h3 class="bet_sites_a">Cons</h3>
                    <ul>
                        <li style="font-size: 17px;">Cluttered desktop website</li>
                        <li style="font-size: 17px;">Limited live streaming capabilities</li>
                    </ul>
                    <div class="d-flex justify-content-center">
                    <a href="https://1xbet.co.ke/?tag=d_1248161m_47149c_" style="text-decoration: none;" target="_blank"><div class="btn bg-warning btn-smtext-center btn-join">Join 1XBET</div></a>
                    </div>
                </div>

                <div style="margin-bottom: 4rem">
                    <h1 class="bet_sites">22bet</h1>
                    <p style="font-size: 17px;">Another site that has quickly become the favourite for sports bettors in the country. This is one of the few bookies that offers a genuinely international sports betting experience here in Nigeria. What makes 22bet is great website is their high odds, numerous bonuses and promos, exceptional customer support, well-built mobile and desktop site, markets covered and features.<br><br>

                    First of all when you join 22bet using our invite link here, you receive a deposit bonus of up ₦ 50 000 when you maker your first deposit. This is free betting money that you can use to learn you way around the site. The best part is this is not the only bonus and promo offered by this bookmaker. There are many other weekly and monthly promos.<br><br>

                    Also, pro bettors will feel right at home while using 22bet. The site has all the important betting features expected of an international bookie such as cash out, wide markets, proper live betting, casino, virtual sports etc. 22bet covers a very wide variety of markets across the world and most sporting events. If you have ever had an issue finding certain football matches from lesser known leagues, then you will more than likely find it at this bookmaker.</p>

                    <h3 class="bet_sites_a">Pros</h3>
                    <ul>
                        <li style="font-size: 17px;">Very high odds on football and basketball</li>
                        <li style="font-size: 17px;">1000s of markets covered every day</li>
                        <li style="font-size: 17px;">Weekly and monthly bonuses and promos</li>
                        <li style="font-size: 17px;">World class mobile site and app</li>
                    </ul>
                    

                    <h3 class="bet_sites_a">Cons</h3>
                    <ul>
                        <li style="font-size: 17px;">Limited virtual sports</li>
                    </ul>
                    <div class="d-flex justify-content-center">
                    <a href="https://lp.22betpartners.com/p/multisport-nigeria/index-ng.php?btag=439991_FE66D4BDCD2C4A8B94C91623BD4B3B07" style="text-decoration: none;" target="_blank"><div class="btn btn-sm bg-warning text-center btn-join">Join 22BET</div></a>
                    </div>
                </div>

                <div style="margin-bottom: 4rem">
                    <h1 class="bet_sites">Betway</h1>
                    <p style="font-size: 17px;">A well established bookmaker, the betting site welcomes new Nigerian punters to its casino, sports and poker rooms, each with a welcome bonus for newly registered gamers. It also offers live streaming, live betting and cash out features. It provides a wide range of sports markets with excellent 24/7 support.</p>

                    <h3 class="bet_sites_a">Pros</h3>
                    <ul style="list-style-type: circle;">
                        <li style="font-size: 17px;">Excellent bonuses for bets and casino</li>
                        <li style="font-size: 17px;">Great mobile application</li>
                        <li style="font-size: 17px;">Easy and user friendly betting platform experience</li>
                    </ul>


                    <h3 class="bet_sites_a">Cons</h3>
                    <ul class="list-style-type-circle">
                        <li style="font-size: 17px;">Complicated registration verification process compared to other bookies</li>
                        <li style="font-size: 17px;">Difficult to reach customer support</li>
                    </ul>
                    <div class="d-flex justify-content-center">
                    <a href="https://www.betway.co.ke/?btag=P77487-PR23747-CM67345-TS271152" style="text-decoration: none;" target="_blank"><div class="btn btn-sm bg-warning text-center btn-join">Join BetWay</div></a>
                    </div>
                </div>

                <div style="margin-bottom: 4rem">
                    <h1 class="bet_sites">Melbet</h1>
                    <p style="font-size: 17px;">1xBet is a new entrant to the Nigerian gaming industry. Regarded as a market leader coming from the European continent where the betting industry is highly mature, it offers a 300 per cent sign-on bonus for new customers. Another unique characteristic about the new kid on the block is that it allows for direct deposit to gaming wallets as a result of a partnership between the company and several Nigerian banks. As with most of the competitors, it also provides for cash out and instant payout for winnings. However it has a cap of maximum winnings at 200,000 Euros or 73,000,000 Naira.</p>

                    <h3 class="bet_sites_a">Pros</h3>
                    <ul>
                        <li style="font-size: 17px;">Good range of sports</li>
                        <li style="font-size: 17px;">Virtual markets</li>
                        <li style="font-size: 17px;">Free deposits and withdrawals</li>
                        <li style="font-size: 17px;">Excellent round the clock customer service</li>
                    </ul>


                    <h3 class="bet_sites_a">Cons</h3>
                    <ul>
                        <li style="font-size: 17px;">Cluttered desktop website</li>
                        <li style="font-size: 17px;">Limited live streaming capabilities</li>
                    </ul>
                    <div class="d-flex justify-content-center">
                    <a href="https://melbet.ke/?tag=d_730661m_" style="text-decoration: none;" target="_blank"><div class="btn btn-sm bg-warning text-center btn-join">Join Melbet</div></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3"><h2>GET FREE BETTING MONEY</h2><hr class="free_money_hr"/>
                <div class="table table-bordered">
                    <table width="100%">
                        <tbody>
                            <!-- <tr>
                                <td><a class="d-flex justify-content-center align-items-center" href="https://m.22bet.co.ke/?tag=d_723421m_32751c_"><img style="width: 100%; height: auto;" src="images/22Bet_1.JPG" alt="Image Here"/></a></td>
                                <td class="d-flex justify-content-center" style="text-align: center;">
                                    <div class="inner">
                                        <a href="22bet.com">22Bet</a><br>
                                        <span class="btn bg-warning">Get Bonus</span>
                                    </div>
                                </td>
                            </tr> -->
                            <tr>
                                <td><a href="https://lp.22betpartners.com/p/multisport-nigeria/index-ng.php?btag=439991_FE66D4BDCD2C4A8B94C91623BD4B3B07" target="_blank"><img width="90px" class="img-fluid" style="border-radius: 100%;" src="images/22Bet_1.JPG" alt="Image Here"/></a></td>
                                <td style="padding-top: 10px;"><a href="https://lp.22betpartners.com/p/multisport-nigeria/index-ng.php?btag=439991_FE66D4BDCD2C4A8B94C91623BD4B3B07" class="text-center" target="_blank"><span style="margin-top: 1rem; margin-bottom: -10px; color: red; font-size: 15px;">₦ 50,000<br></span><span class="btn bg-warning td_bonus">Get Bonus</span></a></td>
                            </tr>
                            <tr>
                                <td><a href="https://www.betway.co.ke/?btag-P77487-PR23169-CM63192-TS271152" target="_blank"><img width="90px;" class="img-fluid" src="./images/betway.png" alt="Image Here"/></a></td>
                                <td style="padding: 10px;"><a href="https://www.betway.co.ke/?btag-P77487-PR23169-CM63192-TS271152_" class="text-center" target="_blank"><span style="margin-top: 1rem; margin-bottom: -10px; color: red; font-size: 15px;">₦ 100,000<br></span><span class="btn bg-warning td_bonus">Get Bonus</span></a></td>
                            </tr>
                            <tr>
                                <td><a href="https://melbet.ke/?tag=d_730661m_" target="_blank"><img width="90px;" style="border-radius: 100%;" class="img-fluid" style="border-radius: 100%;" src="images/melbet.jfif" alt="Image Here"/></a></td>
                                <td><a href="https://melbet.ke/?tag=d_730661m_" class="text-center" target="_blank"><span style="margin-top: 1rem; margin-bottom: -10px; color: red; font-size: 15px;">₦ 2,000<br></span><span class="btn bg-warning td_bonus">Get Bonus</span></a></td>
                            </tr>
                            <tr>
                                <td style="padding-top: 30px;"><a href="https://1xbet.co.ke/?tag=d_1248161m_47149c_" target="_blank"><img width="90px;" style="border-radius: 100%;" class="img-fluid" src="images/1x_bet.png" alt="Image Here"/></a></td>
                                <td style="padding-top: 10px;"><a href="https://1xbet.co.ke/?tag=d_1248161m_47149c_" class="text-center" target="_blank"><span style="margin-top: 1rem; margin-bottom: -10px; color: red; font-size: 15px;">₦ 100,000<br></span><span class="btn bg-warning td_bonus">Get Bonus</span></a></td>
                            </tr>
                            <tr>
                                <td><a href="https://1xbet.co.ke/?tag=d_1248161m_47149c_"><img width="90px;" style="border-radius: 100%;" class="img-fluid" src="images/bet_winner.png" alt="Image Here"/></a></td>
                                <td style="padding: 10px;"><a href="https://1xbet.co.ke/?tag=d_1248161m_47149c_" class="text-center"><span style="margin-top: 1rem; margin-bottom: -10px; color: red; font-size: 15px;">₦ 100,000<br></span><span class="btn bg-warning td_bonus">Get Bonus</span></a></td>
                            </tr>
                            <tr>
                                <td style="width: 50%;"><a href="https://lp.22betpartners.com/p/multisport-nigeria/index-ng.php?btag=439991_FE66D4BDCD2C4A8B94C91623BD4B3B07" target="_blank"><img width="90px;" style="border-radius: 100%;" class="img-fluid" src="images/22Bet_1.JPG" alt="Image Here"/></a></td>
                                <td><a href="https://lp.22betpartners.com/p/multisport-nigeria/index-ng.php?btag=439991_FE66D4BDCD2C4A8B94C91623BD4B3B07" class="text-center" target="_blank"><span style="margin-top: 1rem; margin-bottom: -10px; color: red; font-size: 15px;">₦ 50,000<br></span><span class="btn bg-warning td_bonus">Get Bonus</span></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- end of small container -->
    <hr class="myHr" style="width: 70%; margin: auto; margin-bottom: 4rem; background-color: #fff; font-weight: bold;"/>
        
    <div class="container" style="min-height: 200px;">
        <div class="row bottomLink">
            <div class="col-md-6" style="margin-bottom: 7rem;">
                <h1>USEFUL LINKS</h1><hr style="width:10%; background-color: #C13333; margin-bottom: 2rem;">
                <?php 
                    // foreach($row_articles as $article){
                    //     print_r($article->title);
                    // }
                ?>
                <a href=""><h2>HOW TO WORK AND EARN ONLINE</h2></a><hr>
                <a href=""><h2>BEST WAY OF MAKING MONEY WITH FOOTBALL BETTING</h2></a><hr>
                <a href=""><h2>BEST FOOTBALL PREDICTION SITES?</h2></a><hr>
                <a href=""><h2>BEST SOCCER PREDICTION SITE FOR FIXED MATCHES?</h2></a><hr>
                <a href=""><h2>FOOTBALL BETTING GUIDE</h2></a><hr>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5" style="margin-bottom: 7rem;">
                <h1>USEFUL ATRICLES</h1><hr style="width:10%; font-weight: bold; background-color: #C13333; margin-bottom: 2rem;">
                <?php
                    foreach($row_articles as $article){
                        echo "<a href='./articles.php?articleID=$article->id'><h2>$article->title</h2></a><hr>";
                    }?>
                <!-- <a href=""><h2>HOW TO STOP LOSING IN SPORT BETTING</h2></a><hr>
                <a href="policy.php"><h2>PRIVACY POLICY</h2></a><hr> -->
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php
        echo $footer;
    ?>
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