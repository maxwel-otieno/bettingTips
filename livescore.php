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
    <title>Tips</title>

    <style>
        @media only screen and (max-width: 768px){
            #notShow{
                display: none;
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
                            <a href="./livescore.php" style="color:brown;" class="nav-link scroll-link">Livescore</a>
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
            // var_dump($laliga_result[0]);?>

    </header>

    <div style="min-height: 200px; margin-bottom: 100px;" class="mt-5">
        <div class="container">
            <div class="d-flex justify-content-center section sectionToMin" style="overflow: auto;">
                <span><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" style="text-decoration: none; color: red;" id="mySection">Today</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h3></span>|<span><h2 class="text-white" id="mySection">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yesterday&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2></span>|<span><h2 class="text-white" id="mySection">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tomorrow&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2></span>|<span><h2 class="text-white" id="mySection">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Live</h2></span>
            </div>
            <div class="row">
                <div class="col-md-3 pt-5" id="notShow">
                    <!-- <div style="height: 200px; margin-top: 50px;"><img src="./images/messi_bt2.jpg" alt="bettingtips.com"></div>
                    <div id="imgNoDisp" style="height: 300px; margin-bottom: 50px;"><img src="./images/sky_sports_1.jpg" alt="bettingtips.com"></div>
                    <div id="imgNoDisp" style="height: 300px; margin-bottom: 50px;"><img src="./images/psg_play.jpg" alt="bettingtips.com"></div> -->
                    <?php 
                        // var_dump($result);
                        for($a=0;$a<sizeof($result)-155;$a++){
                            echo "<img src='".$result[$a]->country_logo."' alt='logo here' style='width:20%;'/>&nbsp;&nbsp;&nbsp;";
                            echo "<a href='#' class='text-white'>".$result[$a]->country_name."</a><br><br>";
                        }
                    ?>
                </div>
                <div class="col-md-5">               
                    <div class="section sectionToMin" id="mySection">
                        <?php             
                            for($i=0; $i<sizeof($result)-155; $i++){
                                if($i == 6){
                                    echo "<!-- Another Advert -->
                                    <br><br><div class='d-flex justify-content-center' style='margin:auto;'><a href='https://www.betway.co.ke/?btag=P77487-PR23747-CM67345-TS271152'; target='_blank' rel='nofollow'><img src='https://secure.betwaypartnersafrica.com/imagehandler/bf3af941-a798-4963-aea7-bb6c0e81f606/' alt='' /></a></div>   <br><br>   <br> ";
                                }
                                // echo $result[$i]->country_name."<br>";?>
                        <h1 style="color: brown;"><?php echo $result[$i]->country_name;?></h1><br>
                        <table class="table text-white">
                            <thead>
                                <!-- <th style="padding: 10px 20px;">League</th> -->
                                <th style="padding: 10px 20px;">Time</th>
                                <th style="padding: 10px 20px;">Match</th>
                                <th style="padding: 10px 20px;">Score</th>
                                <th style="padding: 10px 20px;"></th>
                                <th></th>
                            </thead>

                            <tbody>
                                <tr class="text-white">
                                    <!-- <td style="padding-top: 20px;">English Premier League</td> -->
                                    <td style="padding-top: 20px;">20:00</td>
                                    <td style="padding-top: 20px;">Juventus - Chelsea</td>
                                    <td style="padding-top: 20px;"> _ - _</td>
                                    <!-- <td style="padding-top: 20px;"><h1>H</h1></td> -->
                                    <td class="text-center;" style="padding-top: 20px;"><i id="myId" class="fa fa-star-o fa-2x" aria-hidden="true" onclick="myFunction1('myId')"></i></td>
                                </tr>
                                <tr class="text-white">
                                    <!-- <td style="padding-top: 20px;">English Premier League</td> -->
                                    <td style="padding-top: 20px; color: #CE2B37;">88'</td>
                                    <td style="padding-top: 20px;">Kenya - S Sudan</td>
                                    <td style="padding-top: 20px;"> 4 - 2</td>
                                    <!-- <td style="padding-top: 20px;"><h1>H</h1></td> -->
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
                                icon.style.color = '#fff';
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
                <div class="col-md-4">
                    <?php
                        echo "<div class='container mt-5 pt-5'><br><h3 style='color: #C3C3C3;'> EPL Standings</h3><table class='table'><tbody>";
                        for($a = 0; $a<sizeof($country_result)-15; $a++){
                            echo "<tr style='color:white;'><td class='text-white'><img src='".$country_result[$a]->team_badge."' alt='img here' style='width:10%;'></img>&nbsp;&nbsp;&nbsp;&nbsp;".$country_result[$a]->team_name."</td>   <td class='text-red'>".$country_result[$a]->overall_league_PTS."</td><td style='min-width:30vh;'><span class='p-2 px-2 text-white'>".$country_result[$a]->overall_league_W."</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class='p-3 text-white'>".$country_result[$a]->overall_league_D."</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <span class='p-2 text-white'>".$country_result[$a]->overall_league_L."</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                        };
                        echo "</tbody></table></div>";

                        echo "<br><br>";
                        echo "<div class='container mt-5 pt-5'><br><h3 style='color: #C3C3C3;'> Laliga Standings</h3><table class='table'><tbody>";
                        for($a = 0; $a<sizeof($laliga_result)-15; $a++){
                            echo "<tr style='color:white;'><td class='text-white'><img src='".$laliga_result[$a]->team_badge."' alt='img here' style='width:10%;'></img>&nbsp;&nbsp;&nbsp;&nbsp;".$laliga_result[$a]->team_name."</td>   <td>".$laliga_result[$a]->overall_league_PTS."</td><td style='min-width:30vh;'><span class='p-2 px-2 text-white'>".$laliga_result[$a]->overall_league_W."</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class='p-3 text-white'>".$laliga_result[$a]->overall_league_D."</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <span class='p-2 text-white'>".$laliga_result[$a]->overall_league_L."</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                        };
                        echo "</tbody></table></div>";
                    ?>
                </div>
            </div>
        </div>
        <!-- <iframe scrolling="no" id="hearthis_at_track_4535954" width="100%" height="150" src="https://app.hearthis.at/embed/4535954/transparent_black/?hcolor=&color=&style=2&block_size=2&block_space=1&background=1&waveform=0&cover=0&autoplay=1&css=" frameborder="0" allowtransparency allow="autoplay"><p>Listen to <a href="https://hearthis.at/ty7cpt3h/new-school-poprb/" target="_blank">New School Pop &amp; R&amp;B (2013 - 2019)</a> <span>by</span><a href="https://hearthis.at/ty7cpt3h/" target="_blank" >DJ KenB</a> <span>on</span> <a href="https://hearthis.at/" target="_blank">hearthis.at</a></p></iframe> -->
    </div>

    <!-- Footer -->
    <footer id="footer" class="section footer">
        <div class="container">
            <div class="footer-container">
                <!-- <div class="footer-center">
                    <h3>EXTRAS</h3>
                    <a href="#">Brands</a>
                    <a href="#">Gift Certificates</a>
                    <a href="#">Affiliate</a>
                    <a href="#">Specials</a>
                    <a href="#">Site Map</a>
                </div> -->
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
                    <a href="#">Account Details</a>
                    <!-- <a href="#">Order History</a>
                    <a href="#">Wish List</a>
                    <a href="#">Newsletter</a>
                    <a href="#">Returns</a> -->
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