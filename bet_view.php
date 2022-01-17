<?php 
    include 'db_config.php';
    
    $name = $_GET['matchID'];
    // echo $name;

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
    <title>Bet3ways | Tips</title>

    <style>
        body{            
            /* padding-left: 10px; */
            background-color: white; color:black;
        }
        .frames{
            display: none;
        }
        .headers_min{
            font-size: 30px;
            letter-spacing: 2px;
            color: #8DC360; 
            border: 3px solid #8DC360; 
            padding: 10px 30px; 
            margin-bottom: 4rem;
        }
        .free_money_hr{
            width: 15%; background-color: #C13333; font-weight: bold; height: 0.2rem; margin-bottom: 4rem; text-align: center;
        }

        /* PROMO */
        .advert_promo{
            width: 100%;
            background-color:orange;
            border-radius:5px;
            /* margin: auto; */
            margin-top: 3rem;
            padding: 10px;
            margin-bottom: 4rem;
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
        }
        @media only screen and (max-width: 978px){            
            .advert_promo{
                width: 100%;
                /* min-height: 400px; */
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
        }

        @media only screen and (max-width: 567px){
            .frames{
                display: block;
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
                text-align: center;
                z-index: 9999;
            }           
            .free_money_hr{
                height: 0.2rem; 
                width: 10%;
                margin-bottom: 4rem;
                margin-top: 0px;
            }

            /*Advert */
            .advert_promo img{
                width: 17rem !important;
                height: 10rem !important;
                /* margin-top: 10px; */
                /* margin:0; */
            }
            /* .myImg{
                width: 3000px !important;
            } */
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
                            <a href="./tips.php" style="color:brown;" class="nav-link scroll-link">Tips</a>
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
                        <!-- <li class="nav-item">
                            <a href="./index.php" class="nav-link scroll-link">Create Account</a>
                        </li> -->
                        <li class="nav-item">
                            <a href="./vipsite.php" class="nav-link scroll-link" style="color: brown; padding: 0.3rem 1.8rem; background-color: gold; border: 1px solid #f4f4f4; font-weight: bold;">VVIP</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="cart.html" class="nav-link icon"><i class="bx bx-shopping-bag"></i></a>
                        </li> -->
                    </ul>
                </div>

                <!-- <a href="cart.html" class="cart-icon">
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
            
            $today_date = date("Y-n-j");
            $today_day = date('j');
            // echo "today ".$today_date;
        
            $yester_day = $today_day - 1;
            $yester_date = date("Y-n")."-".($yester_day);
            // echo "Yesterday ".$yester_date;
        
            $today_day++;
            $tomorrow_date = date("Y-n")."-".($today_day);
            // echo "tomorrow ".$tomorrow_date;
            // echo $today_date."<br>";
            // echo $tomorrow_date;

            $curl_options = array(
            // CURLOPT_URL => "https://jsonplaceholder.typicode.com/posts?userId=1",
            CURLOPT_URL => "https://apiv3.apifootball.com/?action=get_predictions&from=$today_date&to=$today_date&APIkey=$APIkey",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_CONNECTTIMEOUT => 5
            );

            $curl = curl_init();
            curl_setopt_array( $curl, $curl_options );
            $game_result = curl_exec( $curl );

            $game_result = (array) json_decode($game_result);

            // var_dump($game_result);
            
            // echo $all_users->rowCount();
            
            

            // $APIkey='090ec463449a0632e9e54bd8a58f66bcf89cad3cb2d4144443dc59534f405c81';
            // $APIkey= $row_api->api_key;
            $APIkey = "090ec463449a0632e9e54bd8a58f66bcf89cad3cb2d4144443dc59534f405c81";
            // $from = '2021-07-12';
            // $to = '2021-07-12';
            $league_id = 300;
            $curl_options = array(
            // CURLOPT_URL => "https://jsonplaceholder.typicode.com/posts?userId=1",
            CURLOPT_URL => "https://apiv3.apifootball.com/?action=get_standings&league_id=152&APIkey=$APIkey",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_CONNECTTIMEOUT => 5
            );
            $curl = curl_init();
            curl_setopt_array( $curl, $curl_options );
            $country_result = curl_exec( $curl );
            $country_result = (array) json_decode($country_result);
            // var_dump($country_result[0]->team_name);


            // echo "<div class='container'><br><h1 style='color: red;'> EPL Standings</h1><table class='table table-responsive-sm'><thead style='color:white;'><th>Team</th><th>P</th><th>MP</th><th style='min=width:100px;'>Stats( W D L )</thead><tbody>";
            // for($a = 0; $a<sizeof($country_result); $a++){
            //     echo "<tr style='color:white;'><td class='text-white'>".($a+1)." . ".$country_result[$a]->team_name."</td>   <td class='text-red'>".$country_result[$a]->overall_league_PTS."</td> <td>".$country_result[$a]->overall_league_payed."</td> <td style='min-width:30vh;'><span class='p-2 px-2 text-white'>".$country_result[$a]->overall_league_W."</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class='p-3 text-white'>".$country_result[$a]->overall_league_D."</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <span class='p-2 text-white'>".$country_result[$a]->overall_league_L."</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
            // };
            // echo "</table></div>";


            // echo $all_users->rowCount();?>

    </header>
    <div style="min-height: 200px; margin-bottom: 100px;" class="mt-5">
        <div class="container">
            <div class="frames">
            <iframe scrolling='no' frameBorder='0' style='padding:0px; margin:0px; border:0px;border-style:none;border-style:none;' width='320' height='80' src="https://refpasrasw.world/I?tag=d_723421m_47685c_&site=723421&ad=47685" ></iframe></div>

            <div>
                <?php 
                    for($a=0; $a<sizeof($game_result); $a++){
                        // echo $game_result[$a]->match_id."<br>";
                        if($game_result[$a]->match_id == $name){?>
                            <div class="row">
                                <div class="col-md-2 mb-5">
                                    <!-- <div style="border: 3px solid #fff700; margin:5px; text-align: center; padding: 5px;">
                                        <h1>Tip</h1>
                                        <p>3 - 1</p>
                                        <h2>Home Wins</h2>
                                    </div> -->
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-8 d-flex justify-content-center align-items-center">
                                    <div class="MySectionToMin">
                                        <h1 style="font-size: 25px; font-weight: bold;"><?php echo $game_result[$a]->match_hometeam_name; ?> Vs <?php echo $game_result[$a]->match_awayteam_name; ?></h1>
                                        <?php $date = $game_result[$a]->match_date; 
                                            $date_array = explode('-', $date);

                                            // var_dump($date_array);
                                            $arr_month = array('January', 'February', 'March', 'April', 'May', 'June', 'july', 'August', 'September', 'October', 'November', 'December');
                                            
                                            $date_month = $arr_month[$date_array[1]-1];
                                        ?>
                                        <h2 style="font-size: 20px"><?php echo $date_month." ".$date_array[2];?>, <?php echo $date_array[0]; ?></h2>
                                    </div>
                                </div>
                            </div>


            <div class="advert_promo" style="padding-bottom: 20px;">
                <div class="row" style="padding:0;">
                    <!-- <div class="col-lg-2"></div> -->
                    <div class="col-lg-6 p-5">
                        <div class="d-flex justify-content-center">
                            <div>
                            <a href="https://m.22bet.co.ke/?tag=d_723421m_32751c_" style="cursor: pointer;"><img src="./images/22bet-logo.PNG" alt="" style=""></a><br>
                            <!-- <a href="https://m.22bet.co.ke/?tag=d_723421m_32751c_" style="color: brown; font-weight: bold;text-align: center;margin: auto;">Full Review</a><br><hr style="margin: auto;background-color: brown; width: 10%; text-align: center;"> --></div>
                        </div>
                        <!-- <div class="d-flex justify-content-center">
                            <a href="https://m.22bet.co.ke/?tag=d_723421m_32751c_" style="cursor: pointer; color: brown; font-weight: bold;">Full Rreview</a><br><hr style="margin-top: -2px;background-color: brown; width: 10%; text-align: center;">
                        </div> -->
                    </div>
                    <div class="col-lg-6 p-5">
                        <div class="d-flex justify-content-center">
                            <div>
                                <h1 class="bonus_amt">GET KSH 200 BONUS</h1>
                                <div style="text-align: center;">
                                    <button class="btn" style="" id="promo_code">PROMO CODE : 22_326807</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-lg-2"></div> -->
                </div>
                <div>
                    <button class="btn btn-block" id="get_bonus"><a href="https://m.22bet.co.ke/?tag=d_723421m_32751c_" style="text-decoration:none; color: white;">GET YOUR BONUS</a></button>
                </div>
            </div>
            
                            <hr style="background-color: white; height: 4px; margin-top: 3rem; margin-bottom: 5rem;">
                        <div class="d-flex justify-content-center">
                            <span class="headers_min text-center">MORE TIPS</span>
                        </div>

                            <table class="table table-striped" width="25%">
                                <thead>
                                    <th>Option</th>
                                    <th>Tip</th>
                                </thead>
                                <tbody style="font-size: 20px;">
                                    <tr>
                                        <td style="padding: 10px;">Double Chance</td>
                                        <td><?php  
                                                if(($game_result[$a]->prob_HW_D > $game_result[$a]->prob_AW_D) && ($game_result[$a]->prob_HW_D > $game_result[$a]->prob_HW_AW)){
                                                    echo "1 / X";
                                                }else if(($game_result[$a]->prob_AW_D > $game_result[$a]->prob_HW_D) && ($game_result[$a]->prob_AW_D > $game_result[$a]->prob_HW_AW)){
                                                    echo "2 / X";                                
                                                }else{
                                                    echo "1 / 2";
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Goals (Over 1.5)</td>
                                        <td><?php  
                                                if($game_result[$a]->prob_O_1 > $game_result[$a]->prob_U_1){
                                                    echo "Over";
                                                }else{
                                                    echo "Under";                                
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Goals (Over 2.5)</td>
                                        <td><?php  
                                                if($game_result[$a]->prob_O > $game_result[$a]->prob_U){
                                                    echo "Over";
                                                }else{
                                                    echo "Under";                                
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Goals (Over 3.5)</td>
                                        <td><?php  
                                                if($game_result[$a]->prob_O_3 > $game_result[$a]->prob_U_3){
                                                    echo "Over";
                                                }else{
                                                    echo "Under";                                
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Both teams to score</td>
                                        <td><?php  
                                                if($game_result[$a]->prob_bts > $game_result[$a]->prob_ots){
                                                    echo "YES";
                                                }else{
                                                    echo "NO";                                
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr></tr>
                                </tbody>
                            </table>
                            <?php
                            // echo "<br>".$game_result[$a]->match_id;
                        }
                    }
                ?>
            </div>

            <!-- <div class="row my-5">
                <div class="col-md-6">
                    <div style="background-color: #36454f; min-height: 300px; border-radius: 10px; margin-bottom: 10px;"> 
                        <h1 style="text-align: center; color: #fff700;">Juventus form</h1>
                        <div class="row">
                            <div class="col-md-6">
                                <div style="margin: 10px; text-align: center;">
                                    <h1>Home Games</h1>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h1>W</h1>
                                            <p>5</p>
                                        </div>
                                        <div class="col-md-4">
                                            <h1>D</h1>
                                            <p>1</p>
                                        </div>
                                        <div class="col-md-4">
                                            <h1>L</h1>
                                            <p>0</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div style="padding: 20px; text-align: center;">
                                    <h1 style="weight: bold;">League Position</h1>
                                    <table class="table float-left" style="border: none;">
                                        <thead>
                                            <th>Pos</th>
                                            <th>MP</th>
                                            <th>W</th>
                                            <th>D</th>
                                            <th>L</th>
                                            <th>Pts</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>6</td>
                                                <td>5</td>
                                                <td>1</td>
                                                <td>0</td>
                                                <td>16</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div style="background-color: #36454f; min-height: 300px; margin-bottom: 10px;">
                        <h1 style="text-align: center; color: #fff700;">Chelsea form</h1>
                        <div class="row">
                            <div class="col-md-6">
                                <div style="padding: 20px; text-align: center;">
                                    <h1>Away Games</h1>
                                    <h1>W&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;  D  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; L</h1>
                                    <p>5&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 0</p>
                                </div>
                            </div>
                            <div class="col-md-6"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div style="padding: 20px; text-align: center;">
                                    <h1 style="weight: bold;">League Position</h1>
                                    <table class="table float-left" style="border: none;">
                                        <thead>
                                            <th>Pos</th>
                                            <th>MP</th>
                                            <th>W</th>
                                            <th>D</th>
                                            <th>L</th>
                                            <th>Pts</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>6</td>
                                                <td>5</td>
                                                <td>1</td>
                                                <td>0</td>
                                                <td>16</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div style="background-color: #36454f; min-height: 300px; margin-bottom: 10px;">
                    <h1 style="text-align: center; color: #fff700;">Juventus Previous matches</h1>
                </div>
                </div>
                <div class="col-md-6">
                    <div style="background-color: #36454f; min-height: 300px;">
                        <h1 style="text-align: center; color: #fff700;">Chelsea Previous matches</h1>
                    </div>
                </div>
            </div> -->
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