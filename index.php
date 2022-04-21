<?php 
    // error_reporting();
    require 'db_config.php';

    // session_start();
    // $_SESSION['username'] = 'Maxwel';

    // echo $_SESSION['username'];
    $Err = "";
    function checkemail($str) {
        return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
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
    <link href='https://fonts.googleapis.com/css?family=Cormorant' rel='stylesheet'>

    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="./css/stylesheet.css">
    
    <!-- logo -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/ball_2.png">
    <style>

        /* FONTS */
        @font-face {
            font-family: Bauhaus;
            src: url(./fonts/bauhaus-93/BAUHS93.ttf);
            /* font-weight: bold; */
        }
        @font-face {
            font-family: Jura;
            src: url(./fonts/Jura/static/Jura-Bold.ttf);
            font-weight: bold;
        }
        @font-face {
            font-family: Jura-medium;
            src: url(./fonts/Jura/static/Jura-Medium.ttf);
            font-weight: bold;
        }
        body{
            background-color: white; color: black;
            /* font-family: Jura; */
        }
        .headers_min{
            font-size: 24px;
            letter-spacing: 2px;
            color: #8DC360; 
            border: 3px solid #8DC360; 
            padding: 8px 28px; 
            margin-bottom: 4rem;
        }
        .nav-list{
            color: #fff;
        }
        .free-foot{
            margin: auto !important; margin-top: 11rem !important;
        }
        .modal-table tr{
            margin-bottom: 10px;
        }

        /*tables */
        .modal-table tr td{
            vertical-align: center; text-align: center;
        }
        #myModal{
            justify-content: center;
            align-items: center;

            margin-top: -10px;
        }

        /* The Modal (background) */
        .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 0;
        border: 1px solid #888;
        width: 30%;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
        -webkit-animation-name: animatetop;
        -webkit-animation-duration: 0.4s;
        animation-name: animatetop;
        animation-duration: 0.4s
        }
        .cardYangu{
            width: 25rem;
            min-height: 25rem;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            margin-bottom: 7rem;
        }
        .cardYangu:hover{
            min-height: 25rem;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.6), 0 10px 40px 0 rgba(0, 0, 0, 0.22);
        }

        /* Add Animation */
        @-webkit-keyframes animatetop {
        from {top:-300px; opacity:0} 
        to {top:0; opacity:1}
        }

        @keyframes animatetop {
        from {top:-300px; opacity:0}
        to {top:0; opacity:1}
        }

        /* The Close Button */
        .close {
            position: relative;
            right: 0;
            top: 10;
            color: white;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
        }

        .modal-header {
        padding: 10px 16px;
        background-color: #000;
        color: white;
        }

        .modal-body {padding: 2px 16px;}

        }
        .sectionToMinBlack td{
            font-size: 22px;
        }
        .frames{
            display: none;
        }
        .myBonus{
            padding-bottom: 1rem; 
            padding-left: 4rem; 
            padding-right: 4rem;
        }
        .myBonuns span{
            font-size: 15px;
        }

        /*tables */
        #getFree{
            font-size: 20px;
        }
        .td_bonus{
            padding: 6px 17px;
        }
        #imgcap{
            min-height:21rem; max-height:21rem;
        }
        .myFooter{
            /* position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            text-align: center; */
        }
        .football{
            width:5%; height:5%;
        }
        #gradientDeco{
            background-image: linear-gradient(to right, black, rgb(17,24,39), transparent);
            /* opacity: 0.7; */
            height: 100vh;
        }
        .toShow{
            display: none;
        }
        .smallCont{
            width: 80%;
            margin: auto;
        }
        #coloredFootball{
            font-family: Aormorant; font-size: 43px !important; font-style: italic; color: green;
        }

        @media only screen and (max-width: 1200px){            
            .football{
                width:7%; height:7%;
            }
        }

        @media only screen and (max-width: 1024px){            
            .football{
                width:%; height:7%;
            }
        }

        @media only screen and (max-width: 978px){
            .football{
            width:8%; height:8%;
        }
        }
        @media only screen and (max-width: 768px){
            .container{
                width: 100%;
            }
            .container-small{
                width: 100%;
            }
            .smallCont{
                width: 100%;
            }
            .modal-content{
                width: 90%;
            }
            .headers_min{
                font-size: 14px;
                /* color: white; */
            }
            #notShow{
                display: none;
            }
            #myModal{
                display: none;
            }
            .myBonus span{
                padding: 5px;
                font-size: 12px;
            }

            /*Bottom links */
            
            .bottomLink h1{
                font-size: 18px;
            }
            .bottomLink h2{
                font-size: 14px;
            }
            .football{
                width:7%; height:7%;
            }
            .toShow{
                display: block;
            }
        }
        @media only screen and (max-width: 567px){
            .nav-list{
                color: #000;
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
            .container{
                width: 100% !important;
            }
            .free-foot{
                margin: auto; margin-top: 3rem !important;
            }
            .modal-table img{
                width: 30% !important;
            }
            .modal-table td{
                padding: 5px !important;
            }
            #getFree{
                font-size: 20px;
            }

            /* Blog */
            .cardYangu{
                width: 25rem;
                min-height: 22rem;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                margin-bottom: 7rem;
            }
            .cardYangu:hover{
                min-height: 18rem;
                /* max-height: 18rem; */
            }
            .cardYangu h1{
                font-size: 14px;
            }


            .sectionToMinSpec span{
                font-size: 12px;
                color: black;
                padding:2px;
            }

            /* modal elements */
            .myBonus span{
                padding: 5px 10px !important;
                font-size: 10px;
            }
            #imgcap{
                min-height:17rem; max-height:17rem;
            }
            .football{
                width:10% !important; height: 14% !important;
                padding-top: 5px !important;
            }
            #coloredFootball{
                font-family: inherit;
                font-size: 28px !important;
                font-style: normal;
                color: brown;
            }
        }
    </style>
    <title>Bet3ways</title>
</head>
<body>
    <!-- header -->
    <header id='home' class='header'>
        <div style="background:url(./images/foot_bg_11.jpg); height: 100vh;">
            <div id="gradientDeco">
                <!-- Navigation -->
                <nav class="nav">
                    <div class="navigation container">
                        <div class="logo">
                            <div class="d-flex">
                                <img src="./images/ball_2.png" alt="" class="football" style="padding-top:2px;"><h1 style="font-size:32px; font-weight: bold; color: white;">Bet3<span style="color: brown; font-size: 29dp;">Ways</span></h1></img>
                            </div>
                            <!-- <img src="./images/Bet3ways_logo.jpg" alt="Bet3Ways.com" width="35%"> -->
                        </div>
                        <div class="menu">
                            <div class="top-nav">
                                <div class="logo">
                                    <div class="d-flex">
                                        <img src="./images/ball_2.png" alt="" class="football"><h1 style="font-size:32px; font-weight: bold; color: white;">Bet3<span style="color: brown; font-size: 29dp;">Ways</span></h1></img>
                                    </div>
                                </div>
                                <div class="close">
                                    <i class='bx bx-x' ></i>
                                </div>
                            </div>

                            <ul class="nav-list">
                                <li class="nav-item active">
                                    <a href="#home" style="color:brown;" class="nav-link scroll-link">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a href="./tips.php" class="nav-link scroll-link">Tips</a>
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
                                    <a href="login.php" class="nav-link scroll-link">Login</a>
                                </li> -->
                                <!-- <li class="nav-item">
                                    <a href="#home" class="nav-link scroll-link">Create Account</a>
                                </li> -->
                                <li class="nav-item active">
                                    <a href="./vipsite.php" class="nav-link scroll-link" style="color: white; font-size: 16px; padding: 0.5rem 2rem; background-color: brown;border-radius: 20px;">VVIP</a>
                                </li>
                            </ul>
                        </div>

                        <div class="hamburger text-white">
                            <i class="bx bx-menu"></i>
                        </div>
                    </div>
                </nav>
                
        <div class="row pb-1">
            <div class="col-lg-1"></div>
            <div class="col-lg-5 row align-middle free-foot">
                <div class="container">
                <!-- <iframe scrolling='no' frameBorder='0' style='padding:0px; margin:0px; border:0px;border-style:none;border-style:none;' width='300' height='250' src="https://refpasrasw.world/I?tag=d_723421m_48327c_&site=723421&ad=48327" ></iframe> -->
                    <h1 style="font-weight: 800; color: brown; font-size: 28px;">Free <span id="coloredFootball">football</span> prediction website</h1>
                    <!-- #FFD700 -->
                    <p style="color: white;">Bet3ways provides Free football predictions, Tips of the day, Single Bets, e.t.c. Bet3ways is the best source of free football tips and one of the top best football prediction site on the internet that provides sure soccer predictions.</p><p class="text-white">We provide you with a wide range of accurate predictions you can rely on. Our unique interface makes it easy for the users to browse easily both on desktop and mobile for online sports gambling. If you are looking for sites that predict football matches correctly, Bet3ways is the Best Football Prediction Website in the world.</p><br><br><br>
                    <!-- <a href="https://www.betway.co.ke/?btag=P77487-PR23747-CM67345-TS271152"; target="_blank" rel="nofollow"><img src="https://secure.betwaypartnersafrica.com/imagehandler/bf3af941-a798-4963-aea7-bb6c0e81f606/" alt="" /></a> -->
                </div>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-4">
                <!-- <div class="container" id="notShow">
                    <form action="./index.php" method="post">
                        <?php
                            // if(!empty($Err)){
                            //     echo $Err;
                            // }
                            ?>
                        <div class="card" style="background-color: black; margin-top: 20px;">
                            <div class="card-body">
                                <label class="text-white" for="username">Username</label>
                                <input class="form-control" type="text" placeholder="E.g. Admin12" name="username" style="padding: 20px 5px; font-size: 15px;" required><br>
                                <label class="text-white" for="mobile" min="10" max="12">Mobile Number</label>
                                <input class="form-control" type="text" placeholder="E.g. 0712345678" name="mobile" style="padding: 20px 5px; font-size: 15px;" required><br>
                                <label class="text-white" for="email">Email Address</label>
                                <input class="form-control" type="email" placeholder="E.g. JohnDoe@test.com" name="email" style="padding: 20px 5px; font-size: 15px;" required><br>
                                <label class="text-white" for="passord">Password</label>
                                <input class="form-control" type="password" placeholder="Choose a strong password" name="password" style="padding: 20px 5px; font-size: 15px;" required><br>
                                <label class="text-white" for="conf_password">Confirm Password</label>
                                <input class="form-control" type="password" placeholder="Confirm your password" name="conf_password" style="padding: 20px 5px; font-size: 15px;" required>
                                <small class="text-white">Already have an account? <a style="color: blue;" href="login.php">Login</a></small><br><br>
                                <input type="checkbox">&nbsp;&nbsp;<small style="color: white;">By signing up you agree to the set terms and conditions</small><br>
                                <input type="submit" value="Sign Up" class="btn align-self-center" name="btn_sub" style="background-color: #0069D9; font-size: 20px;"><br>
                            </div>
                        </div>
                    </form>
                </div> -->
            </div>
            <div class="col-md-1"></div>
        </div>

            </div>
        </div>
    </header>

    <div>
        <div class="container">
            <div class="mySectionToMin">
            <!-- Trigger/Open The Modal -->
            <button id="myBtn" class="btn btn-mini btn-success d-none">Open Modal</button>

            <!-- The Modal -->
            <div id="myModal" class="modal">
                <div class="modal-dialog-centered">
                    <!-- Modal content -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 id="getFree">GET FREE BETTING MONEY</h1>                           
                            <span class="close">&times;</span>
                        </div>
                        <div class="modal-body">
                                <table class="table-bordered table-striped modal-table">
                                    <tbody>
                                        <tr>
                                            <td style="padding: 0.2rem;"><a href="https://lp.22betpartners.com/p/multisport-nigeria/index-ng.php?btag=439991_FE66D4BDCD2C4A8B94C91623BD4B3B07" target="_blank" style="text-decoration: none;"><img class="img-fluid" style="width: 30%;" src="images/22Bet_1.JPG" alt="Image Here"/></a></td>
                                            <td class="myBonus" style="padding-top: 10px;"><a href="https://lp.22betpartners.com/p/multisport-nigeria/index-ng.php?btag=439991_FE66D4BDCD2C4A8B94C91623BD4B3B07" class="text-center" target="_blank" style="text-decoration: none;"><span style="margin-top: 1rem; margin-bottom: -10px; color: red; font-size: 12px;">₦ 50,000</span><span class="btn bg-warning td_bonus">Get Bonus</span></a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="https://www.betway.co.ke/?btag-P77487-PR23169-CM63192-TS271152" target="_blank" style="text-decoration: none;"><img class="img-fluid" style="width: 30%;" src="./images/betway.png" alt="Image Here"/></a></td>
                                            <td class="myBonus" style="padding-top: 10px;"><a href="https://www.betway.co.ke/?btag-P77487-PR23169-CM63192-TS271152_" class="text-center" target="_blank" style="text-decoration: none;"><span style="margin-top: 1rem; margin-bottom: -10px; color: red; font-size: 12px;">₦ 100,000<br></span><span class="btn bg-warning td_bonus">Get Bonus</span></a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="https://melbet.ke/?tag=d_730661m_" target="_blank" style="text-decoration: none;"><img class="img-fluid" style="width: 30%;" src="./images/melbet.jfif" alt="Image Here"/></a></td>
                                            <td class="myBonus" style="padding-top: 10px;"><a href="https://melbet.ke/?tag=d_730661m_" class="text-center" target="_blank" style="text-decoration: none;"><span style="margin-top: 1rem; margin-bottom: -10px; color: red; font-size: 12px;">₦ 2,000<br></span><span class="btn bg-warning td_bonus">Get Bonus</span></a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="https://1xbet.co.ke/?tag=d_1248161m_47149c_" target="_blank" style="text-decoration: none;"><img class="img-fluid" style="width: 30%;" src="./images/1x_bet.png" alt="Image Here"/></a></td>
                                            <td class="myBonus" style="padding-top: 10px;"><a href="https://1xbet.co.ke/?tag=d_1248161m_47149c_" class="text-center" target="_blank" style="text-decoration: none;"><span style="margin-top: 1rem; margin-bottom: -10px; color: red; font-size: 12px;">₦ 100,000<br></span><span class="btn bg-warning td_bonus">Get Bonus</span></a></td>
                                        </tr>
                                            <td><a href="https://betwinner.com/" target="_blank" style="text-decoration: none;"><img class="img-fluid" style="width: 30%;" src="images/bet_winner.png" alt="Image Here"/></a></td>
                                            <td class="myBonus" style="padding-top: 10px;"><a href="https://betwinner.com/" class="text-center" target="_blank" style="text-decoration: none;"><span style="margin-top: 1rem; margin-bottom: -10px; color: red; font-size: 12px;">₦ 100,000<br></span><span class="btn bg-warning td_bonus">Get Bonus</span></a></td>
                                        </tr>
                                        <!-- <tr>
                                            <td><a href="https://1xbet.co.ke/?tag=d_1248161m_47149c_" target="_blank" style="text-decoration: none;"><img class="img-fluid" style="width: 30%;" src="./images/1x_bet.png" alt="Image Here"/></a></td>
                                            <td width="50%" class="myBonus" style="padding-top: 10px;"><a href="https://1xbet.co.ke/?tag=d_1248161m_47149c_" class="text-center" target="_blank" style="text-decoration: none;"><span style="margin-top: 1rem; margin-bottom: -10px; color: red; font-size: 15px;">₦ 100,000<br></span><span class="btn bg-warning td_bonus">Get Bonus</span></a></td>
                                        </tr> -->

                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>

            <div class="myFoter">
                <!-- <iframe scrolling='no' frameBorder='0' style='padding:0px; margin:0px; border:0px;border-style:none;border-style:none;' width='300' height='250' src="https://refpasrasw.world/I?tag=d_723421m_48327c_&site=723421&ad=48327" href="https://22bet.com/?tag=d_723421m_48327c_&site=723421&ad=48327"></iframe>                 -->
            </div>

            <script>
            // Get the modal
            var modal = document.getElementById("myModal");
            // console.log(modal);

            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[1];
            // console.log(span);

            // When the user clicks the button, open the modal 
            btn.onclick = function() {
            modal.style.display = "block";
            modal.style.marginTop = "-30px";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
            modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }

            // When the user scrolls down 20px from the top of the document, show the modal
            window.onscroll = function() {scrollFunction()};

            // setInterval(() => {          
            // }, 1000);

            function scrollFunction() {
                if (document.body.scrollBottom > 20 || document.documentElement.scrollTop < 25) {
                    modal.style.display = "block";
                } else {
                    modal.style.display = "none";
                }
            }
            </script>

                <div class="frames">
                <iframe scrolling='no' frameBorder='0' style='padding:0px; margin:0px; border:0px;border-style:none;border-style:none;' width='320' height='80' src="https://refpasrasw.world/I?tag=d_723421m_32751c_&site=723421&ad=32751" ></iframe></div>

                <div class="smallCont">                    
                    <div class="section sectionToMinBlack" id="mySection">
                        <div class="d-flex justify-content-center">
                            <span class="headers_min">LATEST TIPS</span><br><br>
                        </div>

                        <script>
                            var editBtn = document.getElementById('toClick');
                            var iframe = document.getElementById('i_frame');

                            iframe.addEventListener('click', clickedBtn);

                            function clickedBtn(){
                                editBtn.click();
                            }
                        </script>
                        <?php 
                            if (sizeof($prediction) < 3){?>
                                <span class="d-flex justify-content-center"><h1>Sorry!! No tips are available at the moment</h1></span>
                            <?php }else{
                        ?>
                        <table class="table table-striped text-black">
                            <thead>
                                <th id="notShow" style="padding: 10px 20px;" class="text-left">League</th>
                                <th style="padding: 10px 20px;" class="text-left">Match</th>
                                <th style="padding: 10px 20px;" class="text-center">Time</th>
                                <th style="padding: 10px 20px;" class="text-center">Tip</th>
                                <th></th>
                            </thead>

                            <tbody>
                            <tbody>
                                <?php
                                    for($a=0; $a<20;$a++){
                                        // echo sizeof($prediction);
                                        if($prediction[$a]->match_status != "Finished"){
                                            // if($prediction[$a]->country_name == "England" || $prediction[$a]->league_name == "Premier League"){
                                        // echo $a;
                                        ?>
                                        <tr>
                                            <td id="toClose" style="padding-top: 20px;" class="text-left"><?php echo $prediction[$a]->league_name;?></td>
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
                                    <?php   } } }
                                ?> 
                            </tbody>
                        </table>
                    </div>       <!--Current odds preview section end --> 
                </div>
            
            
            <div class="smallCont">  
                <div class="d-flex justify-content-center" style="margin:auto; color:#000;">
                    <div style="margin: 1rem 0;">
                        <h1 style="color: brown; padding-bottom: 2rem;">Real Football Prediction</h1>
                            <p>Online sports betting can be real fun and the great thing is that you have a real, calculated chance to win much more than you invest initially. So, this being said, we welcome you on our attractive and clean platform, offering you all the information you need before placing your bets free. The beauty of free betting tips is that you can place multiple bets at once, so your chances of winning more money, do effectively increase. We have worked on creating an interface easy to use, with full information and multiple games that play that instant all around the world. You are not limited from this point of view and that`a a great advantage. We could also add the fact that the odds are carefully estimated for a great variety of sports, not only football.</p>
                    </div>
                </div>
                <div class="container my-5">
                        <!-- Another Advert -->
                    <div class="d-flex justify-content-center" style="margin:auto;"><a href="https://www.betway.co.ke/?btag=P77487-PR23747-CM67345-TS271152"; target="_blank" rel="nofollow"><img src="https://secure.betwaypartnersafrica.com/imagehandler/bf3af941-a798-4963-aea7-bb6c0e81f606/" alt="" width="100%"/></a></div>
                </div>

                <div class="d-flex justify-content-center" style="margin:auto; color:#000;">
                    <div style="margin: 1rem 0;">
                        <!-- <h1 class="text-primary">FREE FOOTBALL PREDICTION SITE</h1> -->
                        <p>We have always improved, in time, our technique regarding the odds and predictions of the upcoming sports matches, before they even begun playing. It`s not about what we feel about the game we set the value of a certain odd, but as we mentioned earlier, it`s all calculated, mathematically speaking, using algorithms, that some great specialists created, over the time. We could mention here Dixon and Coles econometric methods, used to set the values you see in the graphics of our websites interface.</p>
                    </div>
                </div>
                                            
                <!-- Won/Previous Odds -->
                <div class="section sectionToMinBlack" id="mySection">
                    <div class="d-flex justify-content-center">
                        <span class="headers_min">LATEST WINNINGS</span><br><br>
                    </div>
                    
                    <?php
                    if (sizeof($result) < 3){?>
                        <span class="d-flex justify-content-center"><h1>Sorry!! No tips are available at the moment</h1></span>
                    <?php }else{
                        // echo sizeof($result);
                    ?>
                    <table class="table table-striped text-black">
                        <thead>
                            <th id="notShow" style="padding: 10px 20px;">League</th>
                            <th style="padding: 10px 20px;">Match</th>
                            <th style="padding: 10px 20px;">Time</th>
                            <th style="padding: 10px 20px;">Tip</th>
                            <!-- <th></th> -->
                        </thead>

                        <tbody>
                        <tbody>
                            <?php
                                for($a=0; $a<10;$a++){
                                    // echo sizeof($prediction);
                                    if($result[$a]->match_status == "Finished"){
                                        // if($prediction[$a]->country_name == "England" || $prediction[$a]->league_name == "Premier League"){
                                    // echo $a;
                                    ?>
                                    <tr>
                                        <td id="toClose" style="padding-top: 20px;" class="text-left"><?php echo $result[$a]->league_name;?></td>
                                        <td style="padding-top: 20px;" class="text-left"><?php echo $result[$a]->match_hometeam_name;?> <span id="notShow">    vs    </span><br class="toShow"> <?php echo $result[$a]->match_awayteam_name;?></td>
                                        <td style="padding-top: 20px;" class="text-center"><?php echo $result[$a]->match_time;?></td>
                                        <!-- <td style="padding-top: 20px;">1.20 | 9.05 | 21.00</td> -->
                                        <td style="padding-top: 20px;" class="text-center"><?php 
                                            if ($result[$a]->prob_HW > $result[$a]->prob_D && $result[$a]->prob_HW > $result[$a]->prob_AW){
                                                // echo "<br>".$prediction[2]->prob_HW;
                                                $predict = "<h1 style='text-align: center; font-weight: bold; color: green;'>1</h1>";
                                            }else if($result[$a]->prob_AW > $result[$a]->prob_HW && $result[$a]->prob_AW > $result[$a]->prob_D){
                                                // echo "<br>".$prediction[2]->prob_AW;
                                                $predict = "<h1 style='text-align: center; font-weight: bold; color: black;'>2</h1>";
                                            }else{
                                                // echo $prediction[2]->prob_D;
                                                $predict = "<h1 style='text-align: center; font-weight: bold; color: brown;'>X</h1>";
                                            } ?><?php echo $predict;?></td>
                                        <td style="padding-top: 20px;"><a href="bet_view.php?matchID= <?php echo $prediction[$a]->match_id; ?>">More</a></td>
                                    </tr>
                                <?php   } } }
                            ?> 
                            </tbody>
                        </table>
                </div>

                <!-- Another Advert -->
                <div class="d-flex justify-content-center mt-5" style="margin:auto; padding-bottom: 30px;"><a href="https://www.betway.co.ke/?btag=P77487-PR23747-CM67345-TS271152"; target="_blank" rel="nofollow"><img src="https://secure.betwaypartnersafrica.com/imagehandler/bf3af941-a798-4963-aea7-bb6c0e81f606/" alt="" /></a></div>

                <!-- Premium Odds -->
                <!-- <div class="section sectionToMinBlack">
                    <div class="d-flex justify-content-center">
                        <span class="headers_min">PREMIUM ODDS</span><br><br>
                    </div>
                    <table class="table table-striped text-black">
                        <thead>
                            <th id="toClose" style="padding: 10px 0px;">League</th>
                            <th style="padding: 10px 0px;">Match</th>
                            <th style="padding: 10px 0px;">Time</th>
                            <th style="padding: 10px 0px;">Odds</th>
                            <th style="padding: 10px 0px;">Tip</th>
                        </thead>

                        <tbody>
                            <tr>
                                <td id="toClose" style="padding-top: 20px;">Othaya Youth League</td>
                                <td style="padding-top: 20px;">Cumbaya FC - Chacaritas FC</td>
                                <td style="padding-top: 20px;">17:30</td>
                                <td style="padding-top: 20px;">1.20 | 9.05 | 21.00</td>
                                <td style="padding-top: 20px;"><h1>D</h1></td>
                            </tr>
                            <tr>
                                <td id="toClose" style="padding-top: 20px;">UEFA Champions League</td>
                                <td style="padding-top: 20px;">Bayern Munich - Dynamo Kyiv</td>
                                <td style="padding-top: 20px;">17:30</td>
                                <td style="padding-top: 20px;">1.20 | 9.05 | 21.00</td>
                                <td style="padding-top: 20px;"><h1>H</h1></td>
                            </tr>
                            <tr>
                                <td id="toClose" style="padding-top: 20px;">Champions League</td>
                                <td style="padding-top: 20px;">Benfica - Barcelona</td>
                                <td style="padding-top: 20px;">17:30</td>
                                <td style="padding-top: 20px;">1.20 | 9.05 | 21.00</td>
                                <td style="padding-top: 20px;"><h1>A</h1></td>
                            </tr>
                            <tr>
                                <td id="toClose" style="padding-top: 20px;">English Premier League</td>
                                <td style="padding-top: 20px;">Juventus - Chelsea</td>
                                <td style="padding-top: 20px;">20:00</td>
                                <td style="padding-top: 20px;">2.00 | 3.15 | 2.80</td>
                                <td style="padding-top: 20px;"><h1>H</h1></td>
                            </tr>
                            <tr>
                                <td id="toClose" style="padding-top: 20px;">Othaya Youth League</td>
                                <td style="padding-top: 20px;">Cumbaya FC - Chacaritas FC</td>
                                <td style="padding-top: 20px;">17:30</td>
                                <td style="padding-top: 20px;">1.20 | 9.05 | 21.00</td>
                                <td style="padding-top: 20px;"><h1>D</h1></td>
                            </tr>
                            <tr>
                                <td id="toClose" style="padding-top: 20px;">UEFA Champions League</td>
                                <td style="padding-top: 20px;">Bayern Munich - Dynamo Kyiv</td>
                                <td style="padding-top: 20px;">17:30</td>
                                <td style="padding-top: 20px;">1.20 | 9.05 | 21.00</td>
                                <td style="padding-top: 20px;"><h1>H</h1></td>
                            </tr>
                            <tr>
                                <td id="toClose" style="padding-top: 20px;">Champions League</td>
                                <td style="padding-top: 20px;">Benfica - Barcelona</td>
                                <td style="padding-top: 20px;">17:30</td>
                                <td style="padding-top: 20px;">1.20 | 9.05 | 21.00</td>
                                <td style="padding-top: 20px;"><h1>A</h1></td>
                            </tr>
                            <tr>
                                <td id="toClose" style="padding-top: 20px;">English Premier League</td>
                                <td style="padding-top: 20px;">Juventus - Chelsea</td>
                                <td style="padding-top: 20px;">20:00</td>
                                <td style="padding-top: 20px;">2.00 | 3.15 | 2.80</td>
                                <td style="padding-top: 20px;"><h1>H</h1></td>
                            </tr>
                            <tr>
                                <td id="toClose" style="padding-top: 20px;">Othaya Youth League</td>
                                <td style="padding-top: 20px;">Cumbaya FC - Chacaritas FC</td>
                                <td style="padding-top: 20px;">17:30</td>
                                <td style="padding-top: 20px;">1.20 | 9.05 | 21.00</td>
                                <td style="padding-top: 20px;"><h1>D</h1></td>
                            </tr>
                            <tr>
                                <td id="toClose" style="padding-top: 20px;">UEFA Champions League</td>
                                <td style="padding-top: 20px;">Bayern Munich - Dynamo Kyiv</td>
                                <td style="padding-top: 20px;">17:30</td>
                                <td style="padding-top: 20px;">1.20 | 9.05 | 21.00</td>
                                <td style="padding-top: 20px;"><h1>H</h1></td>
                            </tr>
                            <tr>
                                <td id="toClose" style="padding-top: 20px;">Champions League</td>
                                <td style="padding-top: 20px;">Benfica - Barcelona</td>
                                <td style="padding-top: 20px;">17:30</td>
                                <td style="padding-top: 20px;">1.20 | 9.05 | 21.00</td>
                                <td style="padding-top: 20px;"><h1>A</h1></td>
                            </tr>
                        </tbody>
                    </table>
                </div> -->            
            </div> <!-- end of smallCont -->
            <div class="d-flex justify-content-center mt-5">
                <span class="headers_min">OUR BLOGS</span><br><br>
            </div>

            <div class="row">
                <?php
                    foreach($row_articles as $article){ ?>
                        <!-- // echo "<a href='./articles.php?articleID=$article->id'><h2>$article->title</h2></a><hr>"; -->
                    <div class="col-sm-6 col-lg-4">
                        <a href ="./articles.php?articleID=<?php echo $article->id;?>" class="d-flex justify-content-center" style="text-decoration: none;">
                        <div class="cardYangu">
                            <img class="card-img-top" src="<?php echo $article->image_src;?>" alt="Card image cap" id="imgcap">
                            <div class="card-body" style="text-align:center">
                                <h2 class="card-text" style="padding-bottom: 0;"><?php echo $article->title;?></h2>
                            </div>
                        </div></a>
                    </div>
                <?php }?>
            </div>
        </div>
        <div style="width:80%; margin:auto;">            
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