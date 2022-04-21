<?php 
    include 'db_config.php';

    $Err = "";
    if(isset($_POST['btn_sub'])){
        // echo "Ni kuzuri. Thank you God.";
        $username = $_POST['username'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $insert_user = $pdo->prepare("INSERT INTO db_user (`username`, `password`, `email`, `mobile_number`, `created_at`) VALUES(?, ?, ?, ?, NOW())");
        $insert_user->execute([$username, $password, $email, $mobile]);

        if($insert_user->rowCount() > 0){
            // $Err = "<span class='alert alert-success d-flex justify-content-center mb-5'>Congratulations!! Your account has been successfully created.</span>";
            $Err = "<span class='alert d-flex justify-content-center mb-5' style='background-color:#2AAA00; color:#fff; border-radius:6px'>Your message has been sent successfully. Thank you, we'll be in touch.</span>";
        }else{
            // $Err = "<span class='alert alert-danger d-flex justify-content-center mb-5'>There was an error creating your account</span>";
            $Err = "<span class='alert d-flex justify-content-center mb-5' style='background-color:#c10717; color:#fff; border-radius:6px; padding-left:5rem; padding-right:5rem;'>This message has already been received. Try a new one</span>";
        }
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
    <link rel="stylesheet" href="./css/stylesheet.css?v=1.3">
    
    <!-- logo -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/ball_2.png">
    <title>Bet3ways | Tips</title>

    <style>
        .headers_min{
            font-size: 30px;
            letter-spacing: 2px;
            color: #8DC360; 
            border: 3px solid #8DC360; 
            padding: 10px 30px; 
            margin-bottom: 4rem;
        }
        .frames{
            display: none;
        }
        .myFooter{
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            text-align: center;
        }

       /* PROMO */
       .advert_promo{
            width: 70%;
            background-color:orange;
            border-radius:5px;
            margin: auto;
            /* margin-top: 1rem; */
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
        .smallCont{
            width: 80%;
            margin: auto;
        }
        #football{
            width:5%; height:5%;
        }
        #banner_1{
            overflow:hidden; width: 40%; margin: auto
        }
        @media only screen and (max-width: 1200px){
            #football{
                width:7%; height:7%;
            }
        }
        
        @media only screen and (max-width: 1024px){      
            #football{
                width:7%; height:7%;
            }
        }
        
        @media only screen and (max-width: 978px){            
            .advert_promo{
                width: 100%;
                /* min-height: 600px; */
            }
            #football{
                width:8%; height:8%;
            }
        }

        @media only screen and (max-width: 768px){
            #notShow{
                display: none;
            }
            .headers_min{
                font-size: 14px;
                /* color: white; */
            }
            .smallCont{
                width: 100%;
            }

            /*Bottom links */

            .bottomLink h1{
                font-size: 18px;
            }
            .bottomLink h2{
                font-size: 14px;
            }
            #football{
                width:7%; height:7%;
            }
        }

        @media only screen and (max-width: 567px){
            .frames{
                display: block;
                position: fixed;
                left: 0;
                bottom: 5px;
                width: 100%;
                text-align: center;
                z-index: 9999;
            }
            .container{
                width: 100% !important;
            }
            /* .bottomLink h1{
                font-size: 18px;
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
            #football{
                width:10%; height: 14%;
            }
            #banner_1{
                width: 100%;
            }
        }
    </style>
</head>
<body style="background-color: white; color: black;">
    <!-- header -->
    <header id='home'>
        <!-- Navigation -->
        <nav class="nav">
            <div class="navigation container">
                    <div class="logo">
                        <div class="d-flex">
                            <img src="./images/ball_2.png" alt="" id="football"><h1 style="font-size:32px; font-weight: bold;">Bet3<span style="color: brown; font-size: 29dp;">Ways</span></h1></img>
                        </div>
                    </div>
                <div class="menu">
                    <div class="top-nav">
                        <div class="logo">
                            <div class="d-flex">
                                <img src="./images/ball_2.png" alt="" id="football"><h1 style="font-size:32px; font-weight: bold;">Bet3<span style="color: brown; font-size: 29dp;">Ways</span></h1></img>
                            </div>
                        </div>
                        <div class="close">
                            <i class='bx bx-x' ></i>
                        </div>
                    </div>

                    <ul class="nav-list">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link scroll-link">Home</a>
                        </li>
                        <li class="nav-item active">
                            <a href="./tips.php" style="color:brown;" class="nav-link scroll-link">Tips</a>
                        </li>
                        <li class="nav-item">
                            <a href="./livescores/index.php" class="nav-link scroll-link">Livescore</a>
                        </li>
                        <li class="nav-item">
                            <a href="./about.php" class="nav-link scroll-link">About</a>
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

            // $APIkey='090ec463449a0632e9e54bd8a58f66bcf89cad3cb2d4144443dc59534f405c81';
            $APIkey= $row_api->api_key;
            $from = '2021-07-12';
            $to = '2021-07-12';
            $league_id = 300;

            $curl_options = array(
            // CURLOPT_URL => "https://jsonplaceholder.typicode.com/posts?userId=1",
            CURLOPT_URL => "https://apiv3.apifootball.com/?action=get_countries&APIkey=$APIkey",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_CONNECTTIMEOUT => 5
            );

            $curl = curl_init();
            curl_setopt_array( $curl, $curl_options );
            $result = curl_exec( $curl );

            $result = (array) json_decode($result);

            // var_dump($result[0]->country_name);
            
            // echo $all_users->rowCount();
            
            

            // $APIkey='090ec463449a0632e9e54bd8a58f66bcf89cad3cb2d4144443dc59534f405c81';
            $APIkey= $row_api->api_key;
            // $APIkey = "090ec463449a0632e9e54bd8a58f66bcf89cad3cb2d4144443dc59534f405c81";
            // $from = '2021-07-12';
            // $to = '2021-07-12';
            $league_id = 300;
            $today_date = date("Y-n-j");
            $today_day = date('j');
            // echo "today ".$today_date;
        
            $yester_day = $today_day - 1;
            $yester_date = date("Y-n")."-".($yester_day);
            // echo "Yesterday ".$yester_date;
        
            $today_day++;
            $tomorrow_date = date("Y-n")."-".($today_day);
            $curl_options = array(
            // CURLOPT_URL => "https://jsonplaceholder.typicode.com/posts?userId=1",
            // CURLOPT_URL => "https://apiv3.apifootball.com/?action=get_predictions&from=$today_date&to=$today_date&APIkey=$APIkey",
            CURLOPT_URL => "https://apiv3.apifootball.com/?action=get_predictions&from=$today_date&to=$tomorrow_date&APIkey=$APIkey",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_CONNECTTIMEOUT => 5
            );
            $curl = curl_init();
            curl_setopt_array( $curl, $curl_options );
            $prediction = curl_exec( $curl );
            $prediction = (array) json_decode($prediction);
            ?>

    </header>

    <div>
        <div class="container">
            <div class="advert_promo" style="padding-bottom: 20px;">
                <div class="row" style="padding:0;">
                    <!-- <div class="col-lg-2"></div> -->
                    <div class="col-lg-6 p-5">
                        <div class="d-flex justify-content-center">
                            <div>
                            <a href="https://lp.22betpartners.com/p/multisport-nigeria/index-ng.php?btag=439991_FE66D4BDCD2C4A8B94C91623BD4B3B07" target="_blank" style="cursor: pointer;"><img src="./images/22bet-logo.png" alt=""></a><br>
                            <!-- <a href="https://m.22bet.co.ke/?tag=d_723421m_32751c_" style="color: brown; font-weight: bold;text-align: center;margin: auto;">Full Review</a><br><hr style="margin: auto;background-color: brown; width: 10%; text-align: center;"> --></div>
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
                <div>
                    <button class="btn btn-block" id="get_bonus"><a href="https://lp.22betpartners.com/p/multisport-nigeria/index-ng.php?btag=439991_FE66D4BDCD2C4A8B94C91623BD4B3B07" target="_blank" style="text-decoration:none; color: white;">GET YOUR BONUS</a></button>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">                    
                    <div class="section sectionToMinBlack" id="mySection">

                        <div class="frames">
                        <a href="https://www.betway.com.ng/?btag=P77487-PR24626-CM74459-TS271152"; target="_blank" rel="nofollow"><img src="https://secure.betwaypartnersafrica.com/imagehandler/f301a368-7de9-4fcc-9f1e-29525b3ebdd3/" alt="" width="90%"/></a></div>

                        <div class="smallCont">

                            <div class="d-flex justify-content-center">
                                <span class="headers_min">LATEST TIPS</span><br><br>
                            </div>
                            <?php 
                                if (sizeof($prediction) < 3){?>
                                    <span class="d-flex justify-content-center"><h1>Sorry!! No tips are available at the moment</h1></span>
                                <?php }else{
                            ?>
                            <table class="table">
                                <thead>
                                    <th id="notShow" style="padding: 10px 20px;">Country</th>
                                    <th id="notShow" style="padding: 10px 20px;">League</th>
                                    <th style="padding: 10px 20px;">Match</th>
                                    <th style="padding: 10px 20px;">Time</th>
                                    <!-- <th style="padding: 10px 20px;">Odds</th> -->
                                    <th class="active" style="padding: 10px 20px;">Tip</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                <?php

                                //TRIAL FOR MID-TIP ADVERTS
                                    // $entry_num = sizeof($prediction);
                                    // $interval = 15;
                                    // $iterations = floor($entry_num/$interval);
                                    // $remainder = $entry_num%$interval;

                                    // // echo $iterations."<br>";
                                    // // echo "Remainder = ".$remainder."<br>";
                                    // for($a=0; $a<$iterations; $a++){
                                    //     $i = ($a*15);                   
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


                                        for($a=1; $a<15; $a++){
                                            if($prediction[$a]->match_status != "Finished"){
                                                // if($prediction[$a]->league_name == "FKF Premier League" || ($prediction[$a]->country_name == "England" && $prediction[$a]->league_name == "Premier League")){
                                            // echo $a;
                                            ?>
                                            <tr>
                                                <td id="notShow" style="padding-top: 20px;"><?php echo $prediction[$a]->country_name;?></td>
                                                <td id="notShow" style="padding-top: 20px;" class="text-left"><?php echo $prediction[$a]->league_name;?></td>
                                                <td style="padding: 10px 20px;" class="text-left"><?php echo $prediction[$a]->match_hometeam_name;?> <span id="notShow">  vs  </span><br class="toShow"> <?php echo $prediction[$a]->match_awayteam_name;?></td>
                                                <td style="padding: 10px 20px;" class="text-center"><?php echo $prediction[$a]->match_time;?></td>
                                                <!-- <td style="padding-top: 20px;">1.20 | 9.05 | 21.00</td> -->
                                                <td style="padding-top: 20px;" class="text-center"><?php 
                                                    if ($prediction[$a]->prob_HW > $prediction[$a]->prob_D && $prediction[$a]->prob_HW > $prediction[$a]->prob_AW){
                                                        // echo "<br>".$prediction[2]->prob_HW;
                                                        $predict = "<h1 style='text-align: center; font-weight: bold; color: green;'>1</h1>";
                                                    }else if($prediction[$a]->prob_AW > $prediction[$a]->prob_HW && $prediction[$a]->prob_AW > $prediction[$a]->prob_D){
                                                        // echo "<br>".$prediction[2]->prob_AW;
                                                        $predict = "<h1 style='text-align: center; font-weight: bold; color: black;'>2</h1>";
                                                    }else{
                                                        // echo $prediction[2]->prob_D;
                                                        $predict = "<h1 style='text-align: center; font-weight: bold; color: brown;'>X</h1>";
                                                    } ?><?php echo $predict;?></td>
                                                <td style="padding-top: 20px;"><a href="bet_view.php?matchID= <?php echo $prediction[$a]->match_id; ?>">More</a></td>
                                            </tr>
                                    <?php } 
                                    }
                                    ?> 
                                </tbody>
                            </table><br><br>
                            <div class="text-center" id="banner_1">
                            <iframe scrolling='no' frameBorder='0' style='padding:0px; margin:0px; border:0px; border-style:none; margin-bottom: 4rem;' width='728' height='90' src="https://refbanners.com/I?tag=d_1248161m_47149c_&site=1248161&ad=47149" ></iframe></div>

                                <!-- https://refbanners.com/I?tag=d_1248161m_47149c_&site=1248161&ad=47149 - small banner
                                https://refbanners.com/I?tag=d_1248161m_47153c_&site=1248161&ad=47153 - 1Xbet large banner -->
                            
                            <table class="table">
                                <tbody>
                                    <?php
                                        for($a=12; $a<30; $a++){
                                            if($prediction[$a]->match_status != "Finished"){
                                                // if($prediction[$a]->league_name == "FKF Premier League" || ($prediction[$a]->country_name == "England" && $prediction[$a]->league_name == "Premier League")){
                                            // echo $a;
                                            ?>
                                            <tr>
                                                <td id="notShow" style="padding-top: 20px;"><?php echo $prediction[$a]->country_name;?></td>
                                                <td id="notShow" style="padding-top: 20px;" class="text-left"><?php echo $prediction[$a]->league_name;?></td>
                                                <td style="padding: 10px 20px;" class="text-left"><?php echo $prediction[$a]->match_hometeam_name;?> <span id="notShow">  vs  </span><br class="toShow"> <?php echo $prediction[$a]->match_awayteam_name;?></td>
                                                <td style="padding: 10px 20px;" class="text-center"><?php echo $prediction[$a]->match_time;?></td>
                                                <!-- <td style="padding-top: 20px;">1.20 | 9.05 | 21.00</td> -->
                                                <td style="padding-top: 20px;" class="text-center"><?php 
                                                    if ($prediction[$a]->prob_HW > $prediction[$a]->prob_D && $prediction[$a]->prob_HW > $prediction[$a]->prob_AW){
                                                        // echo "<br>".$prediction[2]->prob_HW;
                                                        $predict = "<h1 style='text-align: center; font-weight: bold; color: green;'>1</h1>";
                                                    }else if($prediction[$a]->prob_AW > $prediction[$a]->prob_HW && $prediction[$a]->prob_AW > $prediction[$a]->prob_D){
                                                        // echo "<br>".$prediction[2]->prob_AW;
                                                        $predict = "<h1 style='text-align: center; font-weight: bold; color: black;'>2</h1>";
                                                    }else{
                                                        // echo $prediction[2]->prob_D;
                                                        $predict = "<h1 style='text-align: center; font-weight: bold; color: brown;'>X</h1>";
                                                    } ?><?php echo $predict;?></td>
                                                <td style="padding-top: 20px;"><a href="bet_view.php?matchID= <?php echo $prediction[$a]->match_id; ?>">More</a></td>
                                            </tr>
                                        <?php } 
                                    }
                                    ?> 
                                </tbody>
                            </table><br><br>
                            <div class="text-center" style="overflow: hidden;">
                            <iframe scrolling='no' frameBorder='0' style='padding:0px; margin:auto; border:0px;border-style:none;border-style:none; margin-bottom: 4rem;' width='700' height='90' src='https://refpasrasw.world/I?tag=d_723421m_47685c_&site=723421&ad=47685' ></iframe></div>
                            
                            <table class="table">
                                <tbody>
                                    <?php
                                        for($a=30; $a<45; $a++){
                                            if($prediction[$a]->match_status != "Finished"){
                                                // if($prediction[$a]->league_name == "FKF Premier League" || ($prediction[$a]->country_name == "England" && $prediction[$a]->league_name == "Premier League")){
                                            // echo $a;
                                            ?>
                                            <tr>
                                                <td id="notShow" style="padding-top: 20px;"><?php echo $prediction[$a]->country_name;?></td>
                                                <td id="notShow" style="padding-top: 20px;" class="text-left"><?php echo $prediction[$a]->league_name;?></td>
                                                <td style="padding-top: 20px;" class="text-left"><?php echo $prediction[$a]->match_hometeam_name;?> <span id="notShow">  vs  </span><br class="toShow"> <?php echo $prediction[$a]->match_awayteam_name;?></td>
                                                <td style="padding-top: 20px;" class="text-center"><?php echo $prediction[$a]->match_time;?></td>
                                                <!-- <td style="padding-top: 20px;">1.20 | 9.05 | 21.00</td> -->
                                                <td style="padding-top: 20px;" class="text-center"><?php 
                                                    if ($prediction[$a]->prob_HW > $prediction[$a]->prob_D && $prediction[$a]->prob_HW > $prediction[$a]->prob_AW){
                                                        // echo "<br>".$prediction[2]->prob_HW;
                                                        $predict = "<h1 style='text-align: center; font-weight: bold; color: green;'>1</h1>";
                                                    }else if($prediction[$a]->prob_AW > $prediction[$a]->prob_HW && $prediction[$a]->prob_AW > $prediction[$a]->prob_D){
                                                        // echo "<br>".$prediction[2]->prob_AW;
                                                        $predict = "<h1 style='text-align: center; font-weight: bold; color: black;'>2</h1>";
                                                    }else{
                                                        // echo $prediction[2]->prob_D;
                                                        $predict = "<h1 style='text-align: center; font-weight: bold; color: brown;'>X</h1>";
                                                    } ?><?php echo $predict;?></td>
                                                <td style="padding-top: 20px;"><a href="bet_view.php?matchID= <?php echo $prediction[$a]->match_id; ?>">More</a></td>
                                            </tr>
                                        <?php } 
                                    }
                                    ?> 
                                </tbody>
                            </table><br><br>
                            <div class="text-center" style="overflow: hidden; margin-bottom: 5rem;">
                            <a href="https://www.betway.com.ng/?btag=P77487-PR24626-CM74459-TS271152"; target="_blank" rel="nofollow"><img src="https://secure.betwaypartnersafrica.com/imagehandler/f301a368-7de9-4fcc-9f1e-29525b3ebdd3/" alt="" width="70%"/></a></div>
                            
                            <table class="table">
                                <tbody>
                                    <?php
                                        for($a=45; $a<60; $a++){
                                            if($prediction[$a]->match_status != "Finished"){
                                                // if($prediction[$a]->league_name == "FKF Premier League" || ($prediction[$a]->country_name == "England" && $prediction[$a]->league_name == "Premier League")){
                                            // echo $a;
                                            ?>
                                            <tr>
                                                <td id="notShow" style="padding-top: 20px;"><?php echo $prediction[$a]->country_name;?></td>
                                                <td id="notShow" style="padding-top: 20px;" class="text-left"><?php echo $prediction[$a]->league_name;?></td>
                                                <td style="padding: 10px 20px;" class="text-left"><?php echo $prediction[$a]->match_hometeam_name;?> <span id="notShow">  vs  </span><br class="toShow"> <?php echo $prediction[$a]->match_awayteam_name;?></td>
                                                <td style="padding-top: 20px;" class="text-center"><?php echo $prediction[$a]->match_time;?></td>
                                                <!-- <td style="padding-top: 20px;">1.20 | 9.05 | 21.00</td> -->
                                                <td style="padding-top: 20px;" class="text-center"><?php 
                                                    if ($prediction[$a]->prob_HW > $prediction[$a]->prob_D && $prediction[$a]->prob_HW > $prediction[$a]->prob_AW){
                                                        // echo "<br>".$prediction[2]->prob_HW;
                                                        $predict = "<h1 style='text-align: center; font-weight: bold; color: green;'>1</h1>";
                                                    }else if($prediction[$a]->prob_AW > $prediction[$a]->prob_HW && $prediction[$a]->prob_AW > $prediction[$a]->prob_D){
                                                        // echo "<br>".$prediction[2]->prob_AW;
                                                        $predict = "<h1 style='text-align: center; font-weight: bold; color: black;'>2</h1>";
                                                    }else{
                                                        // echo $prediction[2]->prob_D;
                                                        $predict = "<h1 style='text-align: center; font-weight: bold; color: brown;'>X</h1>";
                                                    } ?><?php echo $predict;?></td>
                                                <td style="padding-top: 20px;"><a href="bet_view.php?matchID= <?php echo $prediction[$a]->match_id; ?>">More</a></td>
                                            </tr>
                                        <?php } 
                                    }
                                    ?> 
                                </tbody>
                            </table><br><br>
                            <div class="text-center" style="overflow: hidden;">
                            <iframe scrolling='no' frameBorder='0' style='padding:0px; margin:auto; border:0px;border-style:none;border-style:none; margin-bottom: 4rem;' width='700' height='90' src='https://refpasrasw.world/I?tag=d_723421m_47685c_&site=723421&ad=47685' ></iframe></div>
                            
                            <table class="table">
                                <tbody>
                                    <?php
                                        for($a=60; $a<75; $a++){
                                            if($prediction[$a]->match_status != "Finished"){
                                                // if($prediction[$a]->league_name == "FKF Premier League" || ($prediction[$a]->country_name == "England" && $prediction[$a]->league_name == "Premier League")){
                                            // echo $a;
                                            ?>
                                            <tr>
                                                <td id="notShow" style="padding-top: 20px;"><?php echo $prediction[$a]->country_name;?></td>
                                                <td id="notShow" style="padding-top: 20px;" class="text-left"><?php echo $prediction[$a]->league_name;?></td>
                                                <td style="padding-top: 20px;" class="text-left"><?php echo $prediction[$a]->match_hometeam_name;?> <span id="notShow">  vs  </span><br class="toShow"> <?php echo $prediction[$a]->match_awayteam_name;?></td>
                                                <td style="padding-top: 20px;" class="text-center"><?php echo $prediction[$a]->match_time;?></td>
                                                <!-- <td style="padding-top: 20px;">1.20 | 9.05 | 21.00</td> -->
                                                <td style="padding-top: 20px;" class="text-center"><?php 
                                                    if ($prediction[$a]->prob_HW > $prediction[$a]->prob_D && $prediction[$a]->prob_HW > $prediction[$a]->prob_AW){
                                                        // echo "<br>".$prediction[2]->prob_HW;
                                                        $predict = "<h1 style='text-align: center; font-weight: bold; color: green;'>1</h1>";
                                                    }else if($prediction[$a]->prob_AW > $prediction[$a]->prob_HW && $prediction[$a]->prob_AW > $prediction[$a]->prob_D){
                                                        // echo "<br>".$prediction[2]->prob_AW;
                                                        $predict = "<h1 style='text-align: center; font-weight: bold; color: black;'>2</h1>";
                                                    }else{
                                                        // echo $prediction[2]->prob_D;
                                                        $predict = "<h1 style='text-align: center; font-weight: bold; color: brown;'>X</h1>";
                                                    } ?><?php echo $predict;?></td>
                                                <td style="padding-top: 20px;"><a href="bet_view.php?matchID= <?php echo $prediction[$a]->match_id; ?>">More</a></td>
                                            </tr>
                                        <?php } 
                                    }
                                    ?> 
                                </tbody>
                            </table><br><br>
                            <div class="text-center" style="overflow: hidden;margin-bottom: 4rem;">
                            <a href="https://www.betway.com.ng/?btag=P77487-PR24626-CM74459-TS271152"; target="_blank" rel="nofollow"><img src="https://secure.betwaypartnersafrica.com/imagehandler/f301a368-7de9-4fcc-9f1e-29525b3ebdd3/" alt="" /></a></div>
                            
                            <table class="table">
                                <tbody>
                                    <?php
                                        for($a=75; $a<90; $a++){
                                            if($prediction[$a]->match_status != "Finished"){
                                                // if($prediction[$a]->league_name == "FKF Premier League" || ($prediction[$a]->country_name == "England" && $prediction[$a]->league_name == "Premier League")){
                                            // echo $a;
                                            ?>
                                            <tr>
                                                <td id="notShow" style="padding-top: 20px;"><?php echo $prediction[$a]->country_name;?></td>
                                                <td id="notShow" style="padding-top: 20px;" class="text-left"><?php echo $prediction[$a]->league_name;?></td>
                                                <td style="padding-top: 20px;" class="text-left"><?php echo $prediction[$a]->match_hometeam_name;?> <span id="notShow">  vs  </span><br class="toShow"> <?php echo $prediction[$a]->match_awayteam_name;?></td>
                                                <td style="padding-top: 20px;" class="text-center"><?php echo $prediction[$a]->match_time;?></td>
                                                <!-- <td style="padding-top: 20px;">1.20 | 9.05 | 21.00</td> -->
                                                <td style="padding-top: 20px;" class="text-center"><?php 
                                                    if ($prediction[$a]->prob_HW > $prediction[$a]->prob_D && $prediction[$a]->prob_HW > $prediction[$a]->prob_AW){
                                                        // echo "<br>".$prediction[2]->prob_HW;
                                                        $predict = "<h1 style='text-align: center; font-weight: bold; color: green;'>1</h1>";
                                                    }else if($prediction[$a]->prob_AW > $prediction[$a]->prob_HW && $prediction[$a]->prob_AW > $prediction[$a]->prob_D){
                                                        // echo "<br>".$prediction[2]->prob_AW;
                                                        $predict = "<h1 style='text-align: center; font-weight: bold; color: black;'>2</h1>";
                                                    }else{
                                                        // echo $prediction[2]->prob_D;
                                                        $predict = "<h1 style='text-align: center; font-weight: bold; color: brown;'>X</h1>";
                                                    } ?><?php echo $predict;?></td>
                                                <td style="padding-top: 20px;"><a href="bet_view.php?matchID= <?php echo $prediction[$a]->match_id; ?>">More</a></td>
                                            </tr>
                                        <?php } 
                                    }
                                    ?> 
                                </tbody>
                            </table><br><br>
                            <div class="text-center" style="overflow: hidden;">
                            <iframe scrolling='no' frameBorder='0' style='padding:0px; margin:0px; border:0px;border-style:none;border-style:none; margin-bottom: 2rem;' width='728' height='90' src="https://refbanners.com/I?tag=d_1248161m_47153c_&site=1248161&ad=47153" ></iframe></div>
                            <table class="table">
                                <tbody>
                                    <?php
                                        for($a=90; $a<110; $a++){
                                            if($prediction[$a]->match_status != "Finished"){
                                                // if($prediction[$a]->league_name == "FKF Premier League" || ($prediction[$a]->country_name == "England" && $prediction[$a]->league_name == "Premier League")){
                                            // echo $a;
                                            ?>
                                            <tr>
                                                <td id="notShow" style="padding-top: 20px;"><?php echo $prediction[$a]->country_name;?></td>
                                                <td id="notShow" style="padding-top: 20px;" class="text-left"><?php echo $prediction[$a]->league_name;?></td>
                                                <td style="padding-top: 20px;" class="text-left"><?php echo $prediction[$a]->match_hometeam_name;?> <span id="notShow">  vs  </span><br class="toShow"> <?php echo $prediction[$a]->match_awayteam_name;?></td>
                                                <td style="padding-top: 20px;" class="text-center"><?php echo $prediction[$a]->match_time;?></td>
                                                <!-- <td style="padding-top: 20px;">1.20 | 9.05 | 21.00</td> -->
                                                <td style="padding-top: 20px;" class="text-center"><?php 
                                                    if ($prediction[$a]->prob_HW > $prediction[$a]->prob_D && $prediction[$a]->prob_HW > $prediction[$a]->prob_AW){
                                                        // echo "<br>".$prediction[2]->prob_HW;
                                                        $predict = "<h1 style='text-align: center; font-weight: bold; color: green;'>1</h1>";
                                                    }else if($prediction[$a]->prob_AW > $prediction[$a]->prob_HW && $prediction[$a]->prob_AW > $prediction[$a]->prob_D){
                                                        // echo "<br>".$prediction[2]->prob_AW;
                                                        $predict = "<h1 style='text-align: center; font-weight: bold; color: black;'>2</h1>";
                                                    }else{
                                                        // echo $prediction[2]->prob_D;
                                                        $predict = "<h1 style='text-align: center; font-weight: bold; color: brown;'>X</h1>";
                                                    } ?><?php echo $predict;?></td>
                                                <td style="padding-top: 20px;"><a href="bet_view.php?matchID= <?php echo $prediction[$a]->match_id; ?>">More</a></td>
                                            </tr>
                                        <?php } 
                                    }
                                    ?> 
                                </tbody>
                            </table><br><br>
                            <div class="text-center" style="overflow: hidden; margin-bottom: 5rem;">
                            <a href="https://www.betway.com.ng/?btag=P77487-PR24626-CM74459-TS271152"; target="_blank" rel="nofollow"><img src="https://secure.betwaypartnersafrica.com/imagehandler/f301a368-7de9-4fcc-9f1e-29525b3ebdd3/" alt="" width="70%"/></a></div>
                            <table class="table">
                                <tbody>
                                    <?php
                                        for($a=110; $a<125; $a++){
                                            if($prediction[$a]->match_status != "Finished"){
                                                // if($prediction[$a]->league_name == "FKF Premier League" || ($prediction[$a]->country_name == "England" && $prediction[$a]->league_name == "Premier League")){
                                            // echo $a;
                                            ?>
                                            <tr>
                                                <td id="notShow" style="padding-top: 20px;"><?php echo $prediction[$a]->country_name;?></td>
                                                <td id="notShow" style="padding-top: 20px;" class="text-left"><?php echo $prediction[$a]->league_name;?></td>
                                                <td style="padding-top: 20px;" class="text-left"><?php echo $prediction[$a]->match_hometeam_name;?> <span id="notShow">  vs  </span><br class="toShow"> <?php echo $prediction[$a]->match_awayteam_name;?></td>
                                                <td style="padding-top: 20px;" class="text-center"><?php echo $prediction[$a]->match_time;?></td>
                                                <!-- <td style="padding-top: 20px;">1.20 | 9.05 | 21.00</td> -->
                                                <td style="padding-top: 20px;" class="text-center"><?php 
                                                    if ($prediction[$a]->prob_HW > $prediction[$a]->prob_D && $prediction[$a]->prob_HW > $prediction[$a]->prob_AW){
                                                        // echo "<br>".$prediction[2]->prob_HW;
                                                        $predict = "<h1 style='text-align: center; font-weight: bold; color: green;'>1</h1>";
                                                    }else if($prediction[$a]->prob_AW > $prediction[$a]->prob_HW && $prediction[$a]->prob_AW > $prediction[$a]->prob_D){
                                                        // echo "<br>".$prediction[2]->prob_AW;
                                                        $predict = "<h1 style='text-align: center; font-weight: bold; color: black;'>2</h1>";
                                                    }else{
                                                        // echo $prediction[2]->prob_D;
                                                        $predict = "<h1 style='text-align: center; font-weight: bold; color: brown;'>X</h1>";
                                                    } ?><?php echo $predict;?></td>
                                                <td style="padding-top: 20px;"><a href="bet_view.php?matchID= <?php echo $prediction[$a]->match_id; ?>">More</a></td>
                                            </tr>
                                        <?php } 
                                    }
                                    ?> 
                                </tbody>
                            </table><br><br>
                            <div class="text-center" style="overflow: hidden; margin-bottom: 5rem;">
                            <iframe scrolling='no' frameBorder='0' style='padding:0px; margin:auto; border:0px;border-style:none;border-style:none; margin-bottom: 4rem;' width='700' height='90' src='https://refpasrasw.world/I?tag=d_723421m_47685c_&site=723421&ad=47685' ></iframe></div>

                                <?php } ?>                        
                        </div>       <!--Current odds preview section end --> 
                    </div>

                </div>
            </div>
        </div>
    </div>
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