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
    <link rel="stylesheet" href="./css/stylesheet.css">
    <title>Tips</title>

    <style>
        @media only screen and (max-width: 768px){
            #notShow{
                display: none;
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
                            <a href="./tips.php" style="color:brown;" class="nav-link scroll-link">Tips</a>
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
<!-- 
                <a href="cart.html" class="cart-icon">
                    <i class="bx bx-shopping-bag"></i>
                </a> -->

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
            // var_dump($prediction);
            // var_dump($prediction[2]);

            // echo "<br>".sizeof($prediction);

            // if ($prediction[2]->prob_HW > $prediction[2]->prob_D && $prediction[2]->prob_HW > $prediction[2]->prob_AW){
            //     echo "<br>".$prediction[2]->prob_HW;
            // }else if($prediction[2]->prob_AW > $prediction[2]->prob_HW && $prediction[2]->prob_AW > $prediction[2]->prob_D){
            //     echo "<br>".$prediction[2]->prob_AW;
            // }else{
            //     echo $prediction[2]->prob_D;
            // }


            // echo "<div class='container'><br><h1 style='color: red;'> EPL Standings</h1><table class='table table-responsive-sm'><thead style='color:white;'><th>Team</th><th>P</th><th>MP</th><th style='min=width:100px;'>Stats( W D L )</thead><tbody>";
            // for($a = 0; $a<sizeof($country_result); $a++){
            //     echo "<tr style='color:white;'><td class='text-white'>".($a+1)." . ".$country_result[$a]->team_name."</td>   <td class='text-red'>".$country_result[$a]->overall_league_PTS."</td> <td>".$country_result[$a]->overall_league_payed."</td> <td style='min-width:30vh;'><span class='p-2 px-2 text-white'>".$country_result[$a]->overall_league_W."</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class='p-3 text-white'>".$country_result[$a]->overall_league_D."</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <span class='p-2 text-white'>".$country_result[$a]->overall_league_L."</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
            // };
            // echo "</table></div>";


            // echo $all_users->rowCount();?>

    </header>

    <div style="min-height: 200px; margin-bottom: 100px;" class="mt-1">
        <div class="container">
            <!-- <div class="d-flex justify-content-center" style="margin:auto;"><a href="https://www.betway.co.ke/?btag=P77487-PR23747-CM67345-TS271152"; target="_blank" rel="nofollow"><img src="https://secure.betwaypartnersafrica.com/imagehandler/bf3af941-a798-4963-aea7-bb6c0e81f606/" alt="" /></a></div> -->
            <div class="row">
                <div class="col-md-3 pt-5">
                    <div id="imgNoDisp" style="height: 200px; margin-top: 50px;"><img src="./images/messi_bt2.jpg" alt="bettingtips.com"></div>
                    <div id="imgNoDisp" style="height: 300px; margin-bottom: 50px;"><img src="./images/sky_sports_1.jpg" alt="bettingtips.com"></div>
                    <div id="imgNoDisp" style="height: 300px; margin-bottom: 50px;"><img src="./images/psg_play.jpg" alt="bettingtips.com"></div>
                </div>
                <div class="col-md-9">                    
                    <div class="section sectionToMinBlack" id="mySection">
                    <!-- <iframe scrolling='no' frameBorder='0' style='padding:0px; margin:0px; border:0px;border-style:none;border-style:none;' width='620' height='200' src="https://m.22bet.co.ke/?tag=d_723421m_32751c_" ><img src="images/22Bet_1.JPG" alt="22Bet Image"></iframe> -->
                        <iframe scrolling='no' frameBorder='0' style='padding:0px; margin:0px; border:0px;border-style:none;border-style:none;' width='700' height='90' src="https://refpasrasw.world/I?tag=d_723421m_47685c_&site=723421&ad=47685" ></iframe>
                        <!-- <iframe scrolling='no' frameBorder='0' style='padding:0px; margin:0px; border:0px;border-style:none;border-style:none;' width='495' height='130' src="https://melbanusd.top/I?tag=d_730661m_43501c_&site=730661&ad=43501" ><img src="images/22Bet_1.JPG" alt="22Bet Image"></iframe> -->
                        <div class="d-flex justify-content-center">
                            <h1 style="font-size: 30px; letter-spacing: 2px; color: #8DC360; border: 3px solid #8DC360; padding: 10px 30px; margin-bottom: 4rem;">LATEST TIPS</h1><br>
                        </div>
                        <?php 
                            if (sizeof($prediction) < 3){?>
                                <span class="d-flex justify-content-center"><h1>Sorry!! No tips are available at the moment</h1></span>
                            <?php }else{
                        ?>
                        <table class="table">
                            <thead>
                                <th style="padding: 10px 20px;">Country</th>
                                <th style="padding: 10px 20px;">League</th>
                                <th style="padding: 10px 20px;">Match</th>
                                <th style="padding: 10px 20px;">Time</th>
                                <!-- <th style="padding: 10px 20px;">Odds</th> -->
                                <th class="active" style="padding: 10px 20px;">Tip</th>
                                <!-- <th></th> -->
                            </thead>

                            <tbody>
                                <?php
                                    for($a=0; $a<11;$a++){
                                        if($prediction[$a]->match_status != "Finished"){
                                            // if($prediction[$a]->league_name == "FKF Premier League" || ($prediction[$a]->country_name == "England" && $prediction[$a]->league_name == "Premier League")){
                                        // echo $a;
                                        ?>
                                        <tr>
                                            <td style="padding-top: 20px;"><?php echo $prediction[$a]->country_name;?></td>
                                            <td style="padding-top: 20px;"><?php echo $prediction[$a]->league_name;?></td>
                                            <td style="padding-top: 20px;"><?php echo $prediction[$a]->match_hometeam_name;?> - <?php echo $prediction[$a]->match_awayteam_name;?></td>
                                            <td style="padding-top: 20px;"><?php echo $prediction[$a]->match_time;?></td>
                                            <!-- <td style="padding-top: 20px;">
                                                2.00 | 3.15 | 2.80</td> -->
                                            <td style="padding-top: 20px;"><?php 
                                                if ($prediction[$a]->prob_HW > $prediction[$a]->prob_D && $prediction[$a]->prob_HW > $prediction[$a]->prob_AW){
                                                    // echo "<br>".$prediction[2]->prob_HW;
                                                    $predict = "<h1 style='border:4px solid green; border-radius: 7px; text-align: center;'>1</h1>";
                                                }else if($prediction[$a]->prob_AW > $prediction[$a]->prob_HW && $prediction[$a]->prob_AW > $prediction[$a]->prob_D){
                                                    // echo "<br>".$prediction[2]->prob_AW;
                                                    $predict = "<h1 style='border:4px solid black; border-radius: 7px; text-align: center;'>2</h1>";
                                                }else{
                                                    // echo $prediction[2]->prob_D;
                                                    $predict = "<h1 style='border:4px solid brown; border-radius: 7px; text-align: center;'>X</h1>";
                                                } ?><h1><?php echo $predict;?></h1></td>
                                            <!-- <td style="padding-top: 20px;"><a href="#">More</a></td> -->
                                        </tr>
                                   <?php } } }
                                ?> 
                            </tbody>
                        </table>
                    </div>       <!--Current odds preview section end --> 

                    <!-- Another Advert -->
                    <div class="d-flex justify-content-center" style="margin:auto;"><a href="https://www.betway.co.ke/?btag=P77487-PR23747-CM67345-TS271152"; target="_blank" rel="nofollow"><img src="https://secure.betwaypartnersafrica.com/imagehandler/bf3af941-a798-4963-aea7-bb6c0e81f606/" alt="" /></a></div>         

                    <!-- Another Advert -->
                    <!-- <div class="d-flex justify-content-center" style="margin:auto;"><a href="https://www.betway.co.ke/?btag=P77487-PR23747-CM67345-TS271152"; target="_blank" rel="nofollow"><img src="https://secure.betwaypartnersafrica.com/imagehandler/bf3af941-a798-4963-aea7-bb6c0e81f606/" alt="" /></a></div> -->

                    <!-- Premium Odds -->
                    <div class="section sectionToMinBlack">
                        <div class="d-flex justify-content-center">
                            <span style="font-size: 30px; letter-spacing: 2px; color: #8DC360; border: 3px solid #8DC360; padding: 10px 30px; margin-bottom: 4rem;">PREMIUM TIPS</span><br><br>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <th id="toClose" style="padding: 10px 0px;">League</th>
                                <th style="padding: 10px 0px;">Match</th>
                                <th style="padding: 10px 0px;">Time</th>
                                <th style="padding: 10px 0px;">Odds</th>
                                <th style="padding: 10px 0px;">Tip</th>
                                <!-- <th></th> -->
                            </thead>

                            <tbody>
                                <tr>
                                    <td id="toClose" style="padding-top: 20px;">English Premier League</td>
                                    <td style="padding-top: 20px;">Juventus - Chelsea</td>
                                    <td style="padding-top: 20px;">20:00</td>
                                    <td style="padding-top: 20px;">2.00 | 3.15 | 2.80</td>
                                    <td style="padding-top: 20px;"><h1>H</h1></td>
                                    <!-- <td style="padding-top: 20px;"><a style=" background-color: grey; padding: 5px 10px; border-radius: 5px; color: white; text-decoration: none;" href="#">View</a></td> -->
                                </tr>
                                <tr>
                                    <td id="toClose" style="padding-top: 20px;">Othaya Youth League</td>
                                    <td style="padding-top: 20px;">Cumbaya FC - Chacaritas FC</td>
                                    <td style="padding-top: 20px;">17:30</td>
                                    <td style="padding-top: 20px;">1.20 | 9.05 | 21.00</td>
                                    <td style="padding-top: 20px;"><h1>D</h1></td>
                                    <!-- <td style="padding-top: 20px;"><a style=" background-color: grey; padding: 5px 10px; border-radius: 5px; color: white; text-decoration: none;" href="#">View</a></td> -->
                                </tr>
                                <tr>
                                    <td id="toClose" style="padding-top: 20px;">UEFA Champions League</td>
                                    <td style="padding-top: 20px;">Bayern Munich - Dynamo Kyiv</td>
                                    <td style="padding-top: 20px;">17:30</td>
                                    <td style="padding-top: 20px;">1.20 | 9.05 | 21.00</td>
                                    <td style="padding-top: 20px;"><h1>H</h1></td>
                                    <!-- <td style="padding-top: 20px;"><a style=" background-color: grey; padding: 5px 10px; border-radius: 5px; color: white; text-decoration: none;" href="#">View</a></td> -->
                                </tr>
                                <tr>
                                    <td id="toClose" style="padding-top: 20px;">Champions League</td>
                                    <td style="padding-top: 20px;">Benfica - Barcelona</td>
                                    <td style="padding-top: 20px;">17:30</td>
                                    <td style="padding-top: 20px;">1.20 | 9.05 | 21.00</td>
                                    <td style="padding-top: 20px;"><h1>A</h1></td>
                                    <!-- <td style="padding-top: 20px;"><a style=" background-color: grey; padding: 5px 10px; border-radius: 5px; color: white; text-decoration: none;" href="#">View</a></td> -->
                                </tr>
                                <tr>
                                    <td id="toClose" style="padding-top: 20px;">English Premier League</td>
                                    <td style="padding-top: 20px;">Juventus - Chelsea</td>
                                    <td style="padding-top: 20px;">20:00</td>
                                    <td style="padding-top: 20px;">2.00 | 3.15 | 2.80</td>
                                    <td style="padding-top: 20px;"><h1>H</h1></td>
                                    <!-- <td style="padding-top: 20px;"><a style=" background-color: grey; padding: 5px 10px; border-radius: 5px; color: white; text-decoration: none;" href="#">View</a></td> -->
                                </tr>
                                <tr>
                                    <td id="toClose" style="padding-top: 20px;">Othaya Youth League</td>
                                    <td style="padding-top: 20px;">Cumbaya FC - Chacaritas FC</td>
                                    <td style="padding-top: 20px;">17:30</td>
                                    <td style="padding-top: 20px;">1.20 | 9.05 | 21.00</td>
                                    <td style="padding-top: 20px;"><h1>D</h1></td>
                                    <!-- <td style="padding-top: 20px;"><a style=" background-color: grey; padding: 5px 10px; border-radius: 5px; color: white; text-decoration: none;" href="#">View</a></td> -->
                                </tr>
                                <tr>
                                    <td id="toClose" style="padding-top: 20px;">UEFA Champions League</td>
                                    <td style="padding-top: 20px;">Bayern Munich - Dynamo Kyiv</td>
                                    <td style="padding-top: 20px;">17:30</td>
                                    <td style="padding-top: 20px;">1.20 | 9.05 | 21.00</td>
                                    <td style="padding-top: 20px;"><h1>H</h1></td>
                                    <!-- <td style="padding-top: 20px;"><a style=" background-color: grey; padding: 5px 10px; border-radius: 5px; color: white; text-decoration: none;" href="#">View</a></td> -->
                                </tr>
                                <tr>
                                    <td id="toClose" style="padding-top: 20px;">Champions League</td>
                                    <td style="padding-top: 20px;">Benfica - Barcelona</td>
                                    <td style="padding-top: 20px;">17:30</td>
                                    <td style="padding-top: 20px;">1.20 | 9.05 | 21.00</td>
                                    <td style="padding-top: 20px;"><h1>A</h1></td>
                                    <!-- <td style="padding-top: 20px;"><a style=" background-color: grey; padding: 5px 10px; border-radius: 5px; color: white; text-decoration: none;" href="#">View</a></td> -->
                                </tr>
                                <tr>
                                    <td id="toClose" style="padding-top: 20px;">English Premier League</td>
                                    <td style="padding-top: 20px;">Juventus - Chelsea</td>
                                    <td style="padding-top: 20px;">20:00</td>
                                    <td style="padding-top: 20px;">2.00 | 3.15 | 2.80</td>
                                    <td style="padding-top: 20px;"><h1>H</h1></td>
                                    <!-- <td style="padding-top: 20px;"><a style=" background-color: grey; padding: 5px 10px; border-radius: 5px; color: white; text-decoration: none;" href="#">View</a></td> -->
                                </tr>
                                <tr>
                                    <td id="toClose" style="padding-top: 20px;">Othaya Youth League</td>
                                    <td style="padding-top: 20px;">Cumbaya FC - Chacaritas FC</td>
                                    <td style="padding-top: 20px;">17:30</td>
                                    <td style="padding-top: 20px;">1.20 | 9.05 | 21.00</td>
                                    <td style="padding-top: 20px;"><h1>D</h1></td>
                                    <!-- <td style="padding-top: 20px;"><a style=" background-color: grey; padding: 5px 10px; border-radius: 5px; color: white; text-decoration: none;" href="#">View</a></td> -->
                                </tr>
                                <tr>
                                    <td id="toClose" style="padding-top: 20px;">UEFA Champions League</td>
                                    <td style="padding-top: 20px;">Bayern Munich - Dynamo Kyiv</td>
                                    <td style="padding-top: 20px;">17:30</td>
                                    <td style="padding-top: 20px;">1.20 | 9.05 | 21.00</td>
                                    <td style="padding-top: 20px;"><h1>H</h1></td>
                                    <!-- <td style="padding-top: 20px;"><a style=" background-color: grey; padding: 5px 10px; border-radius: 5px; color: white; text-decoration: none;" href="#">View</a></td> -->
                                </tr>
                                <tr>
                                    <td id="toClose" style="padding-top: 20px;">Champions League</td>
                                    <td style="padding-top: 20px;">Benfica - Barcelona</td>
                                    <td style="padding-top: 20px;">17:30</td>
                                    <td style="padding-top: 20px;">1.20 | 9.05 | 21.00</td>
                                    <td style="padding-top: 20px;"><h1>A</h1></td>
                                    <!-- <td style="padding-top: 20px;"><a style=" background-color: grey; padding: 5px 10px; border-radius: 5px; color: white; text-decoration: none;" href="#">View</a></td> -->
                                </tr>
                            </tbody>
                        </table>
                    </div>
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