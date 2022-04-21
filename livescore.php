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
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,500;0,900;1,600&display=swap" rel="stylesheet">
    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="./css/stylesheet.css">
    <title>Bet3ways | Livescore</title>

    <style>
        .nav-list{
            color: #fff;
        }
        @media only screen and (max-width: 768px){
            #notShow{
                display: none;
            }
        }
        
        @media only screen and (max-width: 567px){
            #notShow{
                display: none;
            }
            .nav-list{
                color: #000;
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
                        <img src="./images/ball_2.png" alt="" id="football" style="padding-top:2px;"><h1 style="font-size:32px; font-weight: bold; color: white;">Bet3<span style="color: brown; font-size: 29dp;">Ways</span></h1></img>
                    </div>
                    <!-- <img src="./images/Bet3ways_logo.jpg" alt="Bet3Ways.com" width="35%"> -->
                </div>
                <div class="menu">
                    <div class="top-nav">
                        <div class="logo">
                            <div class="d-flex">
                                <img src="./images/ball_2.png" alt="" id="football"><h1 style="font-size:32px; font-weight: bold; color: white;">Bet3<span style="color: brown; font-size: 29dp;">Ways</span></h1></img>
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
                            <a href="./tips.php" class="nav-link scroll-link">Tips</a>
                        </li>
                        <li class="nav-item">
                            <a href="./livescore.php" style="color:brown;" class="nav-link scroll-link">Livescore</a>
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
                        <li class="nav-item">
                            <a href="./vipsite.php" class="nav-link scroll-link" style="color: brown; padding: 0.3rem 1.8rem; background-color: gold; border: 1px solid #f4f4f4; font-weight: bold;">VVIP</a>
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
            // $APIkey= $row_api->api_key;
            // $APIkey = "090ec463449a0632e9e54bd8a58f66bcf89cad3cb2d4144443dc59534f405c81";
            // $from = '2021-07-12';
            // $to = '2021-07-12';
            $league_id = 152;
            $curl_options = array(
            // CURLOPT_URL => "https://jsonplaceholder.typicode.com/posts?userId=1",
            CURLOPT_URL => "https://apiv3.apifootball.com/?action=get_standings&league_id=$league_id&APIkey=$APIkey",
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


            // $APIkey='090ec463449a0632e9e54bd8a58f66bcf89cad3cb2d4144443dc59534f405c81';
            $APIkey= $row_api->api_key;
            // $APIkey = "090ec463449a0632e9e54bd8a58f66bcf89cad3cb2d4144443dc59534f405c81";
            // $from = '2021-07-12';
            // $to = '2021-07-12';
            $laliga_id = 302;
            $curl_options = array(
            // CURLOPT_URL => "https://jsonplaceholder.typicode.com/posts?userId=1",
            CURLOPT_URL => "https://apiv3.apifootball.com/?action=get_standings&league_id=$laliga_id&APIkey=$APIkey",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_CONNECTTIMEOUT => 5
            );
            $curl_laliga = curl_init();
            curl_setopt_array( $curl_laliga, $curl_options );
            $laliga_result = curl_exec( $curl_laliga );
            $laliga_result = (array) json_decode($laliga_result);
            // var_dump($laliga_result[0]);
            
            //LIVE SCORE EVENTS
            $APIkey= $row_api->api_key;
            // $APIkey = "090ec463449a0632e9e54bd8a58f66bcf89cad3cb2d4144443dc59534f405c81";
            // $from = '2021-07-12';
            // $to = '2021-07-12';
            $laliga_id = 302;
            $curl_options = array(
            // CURLOPT_URL => "https://jsonplaceholder.typicode.com/posts?userId=1",
            CURLOPT_URL => "https://apiv3.apifootball.com/?action=get_events&from=2021-07-12&to=2021-07-12&league_id=$league_id&APIkey=$APIkey",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_CONNECTTIMEOUT => 5
            );
            $curl_live = curl_init();
            curl_setopt_array( $curl_live, $curl_options );
            $live_result = curl_exec( $curl_live );
            $live_result = (array) json_decode($live_result);
            // var_dump($live_result);
            ?>

    </header>

    <div style="min-height: 200px;">
        <div class="container">
            <div class="d-flex justify-content-center section sectionToMinBlack" style="overflow: auto;">
                <span><h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" style="text-decoration: none; color: red;" id="mySection">Today</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2></span>|<span><h2 id="mySection">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yesterday&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2></span>|<span><h2 id="mySection">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tomorrow&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2></span>|<span><h2 id="mySection">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Live</h2></span>
            </div>
            <div class="row">
                <div class="col-md-3" id="notShow">
                    <!-- <div style="height: 200px; margin-top: 50px;"><img src="./images/messi_bt2.jpg" alt="bettingtips.com"></div>
                    <div id="imgNoDisp" style="height: 300px; margin-bottom: 50px;"><img src="./images/sky_sports_1.jpg" alt="bettingtips.com"></div>
                    <div id="imgNoDisp" style="height: 300px; margin-bottom: 50px;"><img src="./images/psg_play.jpg" alt="bettingtips.com"></div> -->
                    <?php 
                        // var_dump($result);
                        for($a=1;$a<sizeof($result)-155;$a++){
                            echo "<img src='".$result[$a]->country_logo."' alt='logo here' style='width:20%;'/>&nbsp;&nbsp;&nbsp;";
                            echo "<a href='#'>".$result[$a]->country_name."</a><br><br>";
                        }
                    ?>
                </div>
                <div class="col-md-9">               
                    <div class="section sectionToMinBlack" id="mySection">
                        <?php             
                            for($i=1; $i<sizeof($result)-155; $i++){
                                if($i == 6){
                                    echo "<!-- Another Advert -->
                                    <br><br><div class='d-flex justify-content-center' style='margin:auto;'><a href='https://www.betway.co.ke/?btag=P77487-PR23747-CM67345-TS271152'; target='_blank' rel='nofollow'><img src='https://secure.betwaypartnersafrica.com/imagehandler/bf3af941-a798-4963-aea7-bb6c0e81f606/' alt='' /></a></div>   <br><br>   <br> ";
                                }
                                // echo $result[$i]->country_name."<br>";?>
                        <h1 style="color: brown;"><?php echo $result[$i]->country_name;?></h1><br>
                        <table class="table">
                            <thead>
                                <!-- <th style="padding: 10px 20px;">League</th> -->
                                <th style="padding: 10px 20px;">Time</th>
                                <th style="padding: 10px 20px;">Match</th>
                                <th style="padding: 10px 20px;">Score</th>
                                <th style="padding: 10px 20px;"></th>
                            </thead>

                            <tbody>
                                <?php 
                                    // for($a=1;$a<sizeof($live_result);$a++){ ?>
                                        <!-- <tr> -->
                                            <!-- <td style="padding-top: 20px;">English Premier League</td> -->
                                            <!-- <td style="padding-top: 20px;"><?php 
                                            // echo $live_result[$a]->match_time; 
                                            ?></td> -->
                                            <!-- <td style="padding-top: 20px;">Juventus - Chelsea</td> -->
                                            <!-- <td style="padding-top: 20px;"> _ - _</td> -->
                                            <!-- <td style="padding-top: 20px;"><h1>H</h1></td> -->
                                            <!-- <td class="text-center;" style="padding-top: 20px;"><i id="myId" class="fa fa-star-o fa-2x" aria-hidden="true" onclick="myFunction1('myId')"></i></td> -->
                                        <!-- </tr> -->
                                        <?php 
                                        // echo "<img src='".$result[$a]->country_logo."' alt='logo here' style='width:20%;'/>&nbsp;&nbsp;&nbsp;";
                                        // echo "<a href='#'>".$result[$a]->country_name."</a><br><br>";
                                    // }
                                ?>
                                <tr>
                                    <td style="padding-top: 20px;">20:00</td>
                                    <td style="padding-top: 20px;">Juventus - Chelsea</td>
                                    <td style="padding-top: 20px;"> _ - _</td>
                                    <td class="text-center;" style="padding-top: 20px;"><i id="myId" class="fa fa-star-o fa-2x" aria-hidden="true" onclick="myFunction1('myId')"></i></td>
                                </tr>
                                <tr>
                                    <td style="padding-top: 20px; color: #CE2B37;">88'</td>
                                    <td style="padding-top: 20px;">Kenya - S Sudan</td>
                                    <td style="padding-top: 20px;"> 4 - 2</td>
                                    <td class="text-center;" style="padding-top: 20px; color: #ffef00;"><i id="toChangeId" class="fa fa-star fa-2x" aria-hidden="true" onclick="myFunction1('toChangeId')"></i></td>
                                </tr>
                            </tbody>
                        </table>
                        <?php 
                            }
                        ?>
                    </div>       <!--Current odds preview section end --> 
                    <script>
                        function myFunction1(id){
                            const icon = document.getElementById(id);
                            // console.log(icon.classList);
                            if (icon.classList.contains("fa-star")){
                                icon.classList.remove("fa-star");
                                icon.classList.add("fa-star-o");
                                icon.style.color = '#000';
                                console.log('A');
                            }else if (icon.classList.contains("fa-star-o")){
                                icon.classList.remove("fa-star-o");
                                icon.classList.add("fa-star");
                                icon.style.color = '#ffef00';
                                console.log('B');
                            }else{
                                console.log('C');
                            }
                        }
                    </script>

                    <!-- Another Advert -->
                    <div class="d-flex justify-content-center" style="margin:auto;"><a href="https://www.betway.co.ke/?btag=P77487-PR23747-CM67345-TS271152"; target="_blank" rel="nofollow"><img src="https://secure.betwaypartnersafrica.com/imagehandler/bf3af941-a798-4963-aea7-bb6c0e81f606/" alt="" /></a></div>    

                    <!-- Another Advert -->
                    <!-- <div class="d-flex justify-content-center" style="margin:auto;"><a href="https://www.betway.co.ke/?btag=P77487-PR23747-CM67345-TS271152"; target="_blank" rel="nofollow"><img src="https://secure.betwaypartnersafrica.com/imagehandler/bf3af941-a798-4963-aea7-bb6c0e81f606/" alt="" /></a></div>   -->
                </div>   
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-9">
                    <?php
                        echo "<div class='container mt-5 pt-5'><br><h1 style='color: #000;'> EPL Standings</h1><br><br><table class='table'><thead><th></th><th>P</th><th style='text-align-center'><span class='p-2 px-2'>W</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class='p-2 px-2'>D</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class='p-2 px-2'>L</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th></thead><tbody>";
                        for($a = 0; $a<sizeof($country_result)-15; $a++){
                            echo "<tr><td><img src='".$country_result[$a]->team_badge."' alt='img here' style='width:10%;'></img>&nbsp;&nbsp;&nbsp;&nbsp;".$country_result[$a]->team_name."</td>   <td>".$country_result[$a]->overall_league_PTS."</td><td style='min-width:30vh;'><span class='p-2 px-2'>".$country_result[$a]->overall_league_W."</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class='p-3'>".$country_result[$a]->overall_league_D."</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <span class='p-2'>".$country_result[$a]->overall_league_L."</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                        };
                        echo "</tbody></table><div class='d-flex justify-content-center'><button class='btn btn-mini bg-primary' style='border-radius:5px;'>More</button></div></div>";

                        echo "<br><br>";
                        echo "<div class='container mt-5 mb-5 pt-5'><br><h1 style='color: #000;'> Laliga Standings</h1><br><br><table class='table'><tbody>";
                        for($a = 0; $a<sizeof($laliga_result)-15; $a++){
                            echo "<tr><td><img src='".$laliga_result[$a]->team_badge."' alt='img here' style='width:10%;'></img>&nbsp;&nbsp;&nbsp;&nbsp;".$laliga_result[$a]->team_name."</td>   <td>".$laliga_result[$a]->overall_league_PTS."</td><td style='min-width:30vh;'><span class='p-2 px-2'>".$laliga_result[$a]->overall_league_W."</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class='p-3'>".$laliga_result[$a]->overall_league_D."</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <span class='p-2'>".$laliga_result[$a]->overall_league_L."</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                        };
                        echo "</tbody></table><div class='d-flex justify-content-center'><button class='btn btn-mini bg-primary' style='border-radius:5px;'>More</button></div></div>";
                    ?>
                </div>
            </div>
    </div>
        </div>
        <!-- <iframe scrolling="no" id="hearthis_at_track_4535954" width="100%" height="150" src="https://app.hearthis.at/embed/4535954/transparent_black/?hcolor=&color=&style=2&block_size=2&block_space=1&background=1&waveform=0&cover=0&autoplay=1&css=" frameborder="0" allowtransparency allow="autoplay"><p>Listen to <a href="https://hearthis.at/ty7cpt3h/new-school-poprb/" target="_blank">New School Pop &amp; R&amp;B (2013 - 2019)</a> <span>by</span><a href="https://hearthis.at/ty7cpt3h/" target="_blank" >DJ KenB</a> <span>on</span> <a href="https://hearthis.at/" target="_blank">hearthis.at</a></p></iframe> -->  

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