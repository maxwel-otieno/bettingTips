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
    
    <!-- logo -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/ball_2.png">
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
        #football{
            width:5%; height:5%;
        }
        @media only screen and (max-width: 1200px){
            #football{
                width:7%; height:7%;
            }
        }
        
        @media only screen and (max-width: 1024px){     
            #football{
                width:%; height:7%;
            }
        }
        @media only screen and (max-width: 978px){            
            .advert_promo{
                width: 100%;
                /* min-height: 400px; */
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
            #football{
                width:7%; height:7%;
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
                        <li class="nav-item">
                            <a href="./tips.php" style="color:brown;" class="nav-link scroll-link">Tips</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="./livescore.php" class="nav-link scroll-link">Livescore</a>
                        </li> -->
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
                           <a href="../vipsite.php" class="nav-link scroll-link" style="color: white; font-size: 16px; padding: 0.5rem 2rem; background-color: brown;border-radius: 20px;">VVIP</a>
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
            <iframe scrolling='no' frameBorder='0' style='padding:0px; margin:0px; border:0px;border-style:none;border-style:none;' width='320' height='80' src="https://refbanners.com/I?tag=d_1248161m_47149c_&site=1248161&ad=47149" ></iframe></div>

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
                                        <h1 style="font-size: 22px; font-weight: bold;"><?php echo $game_result[$a]->match_hometeam_name; ?> Vs <?php echo $game_result[$a]->match_awayteam_name; ?></h1>
                                        <?php $date = $game_result[$a]->match_date; 
                                            $date_array = explode('-', $date);

                                            // var_dump($date_array);
                                            $arr_month = array('January', 'February', 'March', 'April', 'May', 'June', 'july', 'August', 'September', 'October', 'November', 'December');
                                            
                                            $date_month = $arr_month[$date_array[1]-1];
                                        ?>
                                        <h2 style="font-size: 18px"><?php echo $date_month." ".$date_array[2];?>, <?php echo $date_array[0]; ?></h2>
                                    </div>
                                </div>
                            </div>


            <div class="advert_promo" style="padding-bottom: 20px;">
                <div class="row" style="padding:0;">
                    <!-- <div class="col-lg-2"></div> -->
                    <div class="col-lg-6 p-5">
                        <div class="d-flex justify-content-center">
                            <div>
                            <a href="https://1xbet.co.ke/?tag=d_1248161m_47149c_" style="cursor: pointer;"><img src="./images/1x_bet.png" alt="" style=""></a><br>
                            <!-- <a href="https://m.22bet.co.ke/?tag=d_723421m_32751c_" style="color: brown; font-weight: bold;text-align: center;margin: auto;">Full Review</a><br><hr style="margin: auto;background-color: brown; width: 10%; text-align: center;"> --></div>
                        </div>
                        <!-- <div class="d-flex justify-content-center">
                            <a href="https://m.22bet.co.ke/?tag=d_723421m_32751c_" style="cursor: pointer; color: brown; font-weight: bold;">Full Rreview</a><br><hr style="margin-top: -2px;background-color: brown; width: 10%; text-align: center;">
                        </div> -->
                    </div>
                    <div class="col-lg-6 p-5">
                        <div class="d-flex justify-content-center">
                            <div>
                                <h1 class="bonus_amt">GET ₦ 100,000 BONUS</h1>
                                <div style="text-align: center;">
                                    <button class="btn" style="" id="promo_code">PROMO CODE : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-lg-2"></div> -->
                </div>
                <div>
                    <button class="btn btn-block" id="get_bonus"><a href="https://1xbet.co.ke/?tag=d_1248161m_47149c_" style="text-decoration:none; color: white;">GET YOUR BONUS</a></button>
                </div>
            </div>
            
                            <!-- <hr style="background-color: white; height: 4px; margin-top: 3rem; margin-bottom: 5rem;"> -->
                        <div class="d-flex justify-content-center">
                            <span class="text-center mt-5" style="font-size: 27px; margin-bottom: 3rem;">MORE TIPS</span>
                        </div>

                            <table class="table table-striped" width="25%">
                                <thead>
                                    <th>Option</th>
                                    <th>Tip</th>
                                </thead>
                                <tbody style="font-size: 17px;">
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