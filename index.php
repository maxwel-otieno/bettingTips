<?php 
    include 'db_config.php';

    $Err = "";
    function checkemail($str) {
        return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
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


    // $APIkey= $row_api->api_key;
    // $APIkey = "090ec463449a0632e9e54bd8a58f66bcf89cad3cb2d4144443dc59534f405c81";
    // $from = '2021-07-12';
    // $to = '2021-07-12';
    $league_id = 300;
    $today_date = date("Y-n-j");
    $tomorrow_day = date('j');
    $tomorrow_day++;
    $tomorrow_date = date("Y-n")."-".($tomorrow_day);
    // echo $today_date."<br>";
    // echo $tomorrow_date;

    $curl_options = array(
    // CURLOPT_URL => "https://jsonplaceholder.typicode.com/posts?userId=1",
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
            

    if(isset($_POST['btn_sub'])){
        // echo "Ni kuzuri. Thank you God.";
        $username = $_POST['username'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        
        $ids_stmt = $pdo->prepare("SELECT MAX(id) as max_id from db_user");
        $ids_stmt->execute();
        $nextID = $ids_stmt->fetch(PDO::FETCH_OBJ)->max_id + 1;
        
        //validate email address
        // function checkemail($str) {
        //     return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
        // }
        // if(!checkemail($email)){
        //     echo "Invalid email address.";
        // }
        // else{
        //     echo "Valid email address.";
        // }

        //check if the username exists
        $username_exists = $pdo->prepare("SELECT * FROM db_user WHERE `username`='$username'");
        $username_exists->execute();

        if($username_exists->rowCount()>0){
            $Err = "<span class='alert d-flex justify-content-center mb-5' style='background-color:#c10717; color:#fff; border-radius:6px; padding-left:5rem; padding-right:5rem;'>The username already exists.</span>";
        }else{
            //check if the user exists
            $user_exists = $pdo->prepare("SELECT `db_user`.email, `db_user`.username, `db_user`.mobile_number FROM db_user WHERE `mobile_number`='$mobile' AND `email`='$email'");
            $user_exists->execute();

            if($user_exists->rowCount()>0){
                $Err = "<span class='alert d-flex justify-content-center mb-5' style='background-color:#c10717; color:#fff; border-radius:6px; padding-left:5rem; padding-right:5rem;'>Error creating the account. This account exists.<span>";
            }else{
                //insert user data into the DB
                $insert_user = $pdo->prepare("INSERT INTO db_user (`username`, `password`, `email`, `mobile_number`, `created_at`) VALUES(?, ?, ?, ?, NOW())");
                $insert_user->execute([$username, md5($password), $email, $mobile]);
        
                if($insert_user->rowCount() > 0){
                    // $Err = "<span class='alert alert-success d-flex justify-content-center mb-5'>Congratulations!! Your account has been successfully created.</span>";
                    $Err = "<span class='alert d-flex justify-content-center mb-5' style='background-color:#2AAA00; color:#fff; border-radius:6px'>Congratulations!! Your account has been successfully created.</span>";

                    $log_query = $pdo->prepare("INSERT INTO activity_log (`userID`, `time`, `activity`, `activity_desc`) VALUES('$nextID', NOW(), 'SignUp', 'User of username \"$username\" created successfully')");
                    $log_query->execute();
                }else{
                    // $Err = "<span class='alert alert-danger d-flex justify-content-center mb-5'>There was an error creating your account</span>";
                    $Err = "<span class='alert d-flex justify-content-center mb-5' style='background-color:#c10717; color:#fff; border-radius:6px; padding-left:5rem; padding-right:5rem;'>There was an error creating your account</span>";
                }
            }
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
    <style>
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
@media only screen and (max-width: 576px){
    .modal-content{
        width: 90%;
    }
}
</style>
    <title>Tips</title>
</head>
<body style="background-color: white; color: black;">
    <!-- header -->
    <header id='home' class='header' style="background:url(./images/foot_1.jpg)">
        <!-- Navigation -->
        <nav class="nav text-white">
            <div class="navigation container">
                <div class="logo">
                    <h1>Bet3ways <span style="color: brown; font-size: 25dp;">.com</span></h1>
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
                        <li class="nav-item active">
                            <a href="#home" style="color:brown;" class="nav-link scroll-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="./tips.php" class="nav-link scroll-link">Tips</a>
                        </li>
                        <li class="nav-item">
                            <a href="livescore.php" class="nav-link scroll-link">Livescore</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://bet3ways.com/#about-us" class="nav-link scroll-link">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="login.php" class="nav-link scroll-link">Login</a>
                        </li>
                        <li class="nav-item">
                            <a href="#home" class="nav-link scroll-link">Create Account</a>
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

                <div class="hamburger text-white">
                    <i class="bx bx-menu"></i>
                </div>
            </div>
        </nav>

        <!-- Hero -->
        <!-- <img src="./images/thrift_1.png" class="hero-img" alt="Image goes here"/> -->

        <!-- <div class="hero-content">
            <h2><span class="discount">99% </span>Success rate</h2>
            <h1>
                <span>Tips to get</span>
                <span>you started</span>
            </h1>
            <a href="#" class="btn">Sign Up</a>
        </div> -->
        <div class="row pb-5">
            <div class="col-lg-1"></div>
            <div class="col-lg-4 row d-flex justify-content-center align-items-center pl-5">
                <div class="container"><br><br><br>
                    <h1 style="font-weight: 800; color: #FFD700;">For the best odds and tips</h1>
                    <p style="color: white;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque magni laborum numquam adipisci in ex ratione similique, hic rerum doloremque, animi asperiores nesciunt, eaque aspernatur? Repellendus a repellat beatae sapiente eos ea aperiam ad sunt delectus. Ad tenetur beatae recusandae.</p><br><br><br>
                    <!-- <a href="https://www.betway.co.ke/?btag=P77487-PR23747-CM67345-TS271152"; target="_blank" rel="nofollow"><img src="https://secure.betwaypartnersafrica.com/imagehandler/bf3af941-a798-4963-aea7-bb6c0e81f606/" alt="" /></a> -->
                </div>
            </div>
            <div class="col-lg-2"></div>
            <div class="col-lg-4">
                <div class="container">
                    <form action="./index.php" method="post">
                        <!-- <h1 style="font-size: 44px; color: white;">Create an Account</h1><br> -->
                        <?php
                            if(!empty($Err)){
                                echo $Err;
                            }
                        // var_dump($result[0]->country_name);
                        
                        // echo $all_users->rowCount();?>
                        <div class="card" style="background-color: black; margin-top: 20px;">
                            <!-- <h5 class="card-header" style="background-color: #F7F7F7; padding: 20px 5px; font-size: 15px;">Create an account</h5> -->
                            <div class="card-body">
                                <!-- <h5 class="card-title">Special title treatment</h5> -->
                                <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
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
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </header>

    <div style="min-height: 200px; margin-bottom: 100px;" class="mt-5">
        <div class="container">

            <!-- Trigger/Open The Modal -->
            <button id="myBtn" class="btn btn-mini btn-success">Open Modal</button>

            <!-- The Modal -->
            <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Top Betting Sites</h2>                           
                    <span class="close">&times;</span>
                </div>
                <div class="modal-body">
                        <table>
                            <tbody>
                                <tr style="margin-bottom: 20px;">
                                    <td><a class="d-flex justify-content-center align-items-center" href="https://m.22bet.co.ke/?tag=d_723421m_32751c_"><img style="width: 30%;" class="img-fluid" src="images/22Bet_1.JPG" alt="Image Here"/></a></td>
                                    <td><div class="d-flex justify-content-center" style="align-self: center; padding-top: 25px;"><a href="https://m.22bet.co.ke/?tag=d_723421m_32751c_">22Bet</a></div></td>
                                    <td><span class="btn bg-warning">Get Bonus</span></td>
                                </tr>
                                <tr style="padding-bottom: 20px;">
                                    <td><a class="d-flex justify-content-center align-items-center" href="https://m.22bet.co.ke/?tag=d_723421m_32751c_"><img style="width: 30%;" class="img-fluid" src="images/22Bet_1.JPG" alt="Image Here"/></a></td>
                                    <td><div class="d-flex justify-content-center" style="align-self: center; padding-top: 25px;"><a href="https://m.22bet.co.ke/?tag=d_723421m_32751c_">AlphaBet</a></div></td>
                                    <td><span class="btn bg-warning">Get Bonus</span></td>
                                </tr>
                                <tr style="padding-bottom: 20px;">
                                    <td style="width: 40%;"><a class="d-flex justify-content-center align-items-center" href="https://m.22bet.co.ke/?tag=d_723421m_32751c_"><img style="width: 30%;" class="img-fluid" src="images/22Bet_1.JPG" alt="Image Here"/></a></td>
                                    <td><div class="d-flex justify-content-center" style="align-self: center; padding-top: 25px;"><a href="22bet.com">BetNaija</a></div></td>
                                    <td><span class="btn bg-warning">Get Bonus</span></td>
                                </tr>
                                <tr style="padding-bottom: 20px;">
                                    <td><a class="d-flex justify-content-center align-items-center" href="https://www.sportpesa.com/"><img style="width: 30%;" class="img-fluid" src="images/sportPesa.JPG" alt="Image Here"/></a></td>
                                    <td><div class="d-flex justify-content-center" style="align-self: center; padding-top: 25px;"><a href="22bet.com">SportPesa</a></div></td>
                                    <td><span class="btn bg-warning">Get Bonus</span></td>
                                </tr>
                                <tr style="padding-bottom: 20px;">
                                    <td><a class="d-flex justify-content-center align-items-center" href="https://betmoran.co.ke/betin-kenya/"><img style="width: 30%;" class="img-fluid" src="images/betmoran.png" alt="Image Here"/></a></td>
                                    <td><div class="d-flex justify-content-center" style="align-self: center; padding-top: 25px;"><a href="22bet.com">Betmoran</a></div></td>
                                    <td><span class="btn bg-warning">Get Bonus</span></td>
                                </tr>
                                <tr style="padding-bottom: 20px;">
                                    <td><a class="d-flex justify-content-center align-items-center" href="https://www.sportpesa.com/"><img style="width: 30%;" class="img-fluid" src="images/sportPesa.JPG" alt="Image Here"/></a></td>
                                    <td><div class="d-flex justify-content-center" style="align-self: center; padding-top: 25px;"><a href="22bet.com">SportPesa</a></div></td>
                                    <td><span class="btn bg-warning">Get Bonus</span></td>
                                </tr>
                                <tr style="marging-bottom: 30px;">
                                    <td><a class="d-flex justify-content-center align-items-center" href="https://betmoran.co.ke/betin-kenya/"><img style="width: 30%;" class="img-fluid" src="images/betmoran.png" alt="Image Here"/></a></td>
                                    <td><div class="d-flex justify-content-center" style="align-self: center; padding-top: 25px;"><a href="22bet.com">Betmoran</a></div></td>
                                    <td><span class="btn bg-warning">Get Bonus</span></td>
                                </tr>
                            </tbody>
                        </table>
                </div>
            </div>

            </div>

            <script>
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks the button, open the modal 
            btn.onclick = function() {
            modal.style.display = "block";
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
            </script>

            <!-- Button trigger modal -->
            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Launch demo modal
            </button> -->

            <!-- Modal -->
            <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h1>Hello. This is the modal</h1>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                    </div>
                </div>
            </div> -->
            <!-- end div implementation -->

            <div class="d-flex justify-content-center" style="margin:auto;"><a href="https://www.betway.co.ke/?btag=P77487-PR23747-CM67345-TS271152"; target="_blank" rel="nofollow"><img src="https://secure.betwaypartnersafrica.com/imagehandler/bf3af941-a798-4963-aea7-bb6c0e81f606/" alt="" /></a></div>
            <!-- <div class="row"> -->
                <!-- <div class="col-md-3 pt-5">
                    <div style="height: 200px; margin-top: 50px;"><img src="./images/messi_bt2.jpg" alt="bettingtips.com"></div>
                    <div id="imgNoDisp" style="height: 300px; margin-bottom: 50px;"><img src="./images/sky_sports_1.jpg" alt="bettingtips.com"></div>
                    <div id="imgNoDisp" style="height: 300px; margin-bottom: 50px;"><img src="./images/psg_play.jpg" alt="bettingtips.com"></div>
                </div> -->
                <div>                    
                    <div class="section sectionToMinBlack" id="mySection">
                        <h1 style="color: #B81E20; font-weight: bold;">Latest Tips</h1><br>
                        <?php 
                            if (sizeof($prediction) < 3){?>
                                <span class="d-flex justify-content-center"><h1>Sorry!! No tips are available at the moment</h1></span>
                            <?php }else{
                        ?>
                        <table class="table table-striped text-black">
                            <thead>
                                <th style="padding: 10px 20px;">League</th>
                                <th style="padding: 10px 20px;">Match</th>
                                <th style="padding: 10px 20px;">Time</th>
                                <th style="padding: 10px 20px;">Tip</th>
                                <th></th>
                            </thead>

                            <tbody>
                            <tbody>
                                <?php
                                    for($a=0; $a<10;$a++){
                                        // echo sizeof($prediction);
                                        if($prediction[$a]->match_status != "Finished"){
                                            // if($prediction[$a]->country_name == "England" || $prediction[$a]->league_name == "Premier League"){
                                        // echo $a;
                                        ?>
                                        <tr>
                                            <td style="padding-top: 20px;"><?php echo $prediction[$a]->league_name;?></td>
                                            <td style="padding-top: 20px;"><?php echo $prediction[$a]->match_hometeam_name;?> <br> <?php echo $prediction[$a]->match_awayteam_name;?></td>
                                            <td style="padding-top: 20px;"><?php echo $prediction[$a]->match_time;?></td>
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
                                                } ?><?php echo $predict;?></td>
                                            <td style="padding-top: 20px;"><a href="#">More</a></td>
                                        </tr>
                                    <?php   } } }
                                ?> 
                            </tbody>
                        </table>
                    </div>       <!--Current odds preview section end --> 
                </div>
            <!-- </div> -->

            <!-- Product Banner -->
            <!-- <section class="section">
                <div class="product-banner">
                    <div class="left">
                        <img src="./images/thrift_2.jpg" alt="image goes here">
                    </div>
                    <div class="right">
                        <div class="content">
                            <h2>
                                <span class="discount">90%</span> Correct
                            </h2>
                            <h1>
                                <span>Get the very best</span>
                                <span>of predictions</span>
                            </h1>
                            <a href="./index.php" class="btn">Sign Up</a>
                        </div>
                    </div>
                                
                </div>
            </section>                   -->

            
            <div class="d-flex justify-content-center section sectionToMinBlack" style="margin:auto; padding-left:3rem; color:#000;">
                <div style="margin: 40px 0; font-size: 26px;">
                    <p>Untitled design35With new betting sites in Kenya coming up every other day, it is our job to help you pick the best site for you. No two bookies are alike and choosing the right one is crucial in determining your success. Using the right bookmaker is important because they usually have different odds, bonuses, betting options, betting markets and live betting features. It is also important to consider overlooked features such as cash out, user friendliness of the site, mobile apps etc. All these are important factors that all new and veteran bettors need to consider when picking the right site for them to use.
                        
                    Besides the main features, our team goes further to analyze important and often hidden information such as when the site was founded, complaints filed by other users, the trustworthiness of the site,  licenses held, and whether they have been banned by the government.

                    Our reviews are written after analysis has been done by our team of expert sport bettors who are very passionate about sports betting. We are not employers of any betting site and our reviews uphold the highest level of integrity. Furthermore, our recommendations are based on the experience of our editors as well as those of our users. Feel free to include your opinion on any bookmaker listed by us by visiting our site reviews.</p>
                </div>
            </div>
                <!-- Another Advert -->
                <div class="d-flex justify-content-center" style="margin:auto;"><a href="https://www.betway.co.ke/?btag=P77487-PR23747-CM67345-TS271152"; target="_blank" rel="nofollow"><img src="https://secure.betwaypartnersafrica.com/imagehandler/bf3af941-a798-4963-aea7-bb6c0e81f606/" alt="" /></a></div>

                <div class="d-flex justify-content-center section sectionToMinBlack" style="margin:auto; padding-left:3rem; color:#000;">
                    <div style="margin: 40px 0; font-size: 26px;">
                        <h2 class="text-primary">FREE FOOTBALL PREDICTION SITE</h3>
                        <p>At Bet3ways, we are passionate with making football punters across the globe make profit with our free football betting tips provided daily! Our team of expert analysts and tipsters work effortlessly to ensure football betting tips provided are safe to stake on. Free betting tips on Bet3ways include OVER 1.5, Double Chance, Potential Risk (High Odds), Upcoming Tips and Free Tipsters Tips no wonder Bet3ways.com is considered as the best free soccer prediction site in the world. Our simple and unique interface makes it easy for users to navigate through our website. We also provide match previews, reports and blog about everything football betting to enable our users get regular updates with the happenings in the world of football via our social media pages.</p>
                    </div>
                </div>
                                        
            <!-- <div class="row">
                <div class="col-md-3" id="notShow">                         -->
                    <!-- <div style="height: 200px; margin-top: 50px;"><img src="./images/messi_bt2.jpg" alt="bettingtips.com"></div>
                    <div id="imgNoDisp" style="height: 300px; margin-bottom: 50px;"><img src="./images/sky_sports_1.jpg" alt="bettingtips.com"></div>
                    <div id="imgNoDisp" style="height: 300px; margin-bottom: 50px;"><img src="./images/psg_play.jpg" alt="bettingtips.com"></div> -->
                    <?php 
                        // var_dump($result);
                        // for($a=0;$a<sizeof($result)-155;$a++){
                        //     echo "<img src='".$result[$a]->country_logo."' alt='logo here' style='width:20%;'/>&nbsp;&nbsp;&nbsp;";
                        //     echo "<a href='#'>".$result[$a]->country_name."</a><br><br>";
                        // }
                    ?>
                <!-- </div>
                <div class="col-md-9">        -->
                    <!-- Won/Previous Odds -->
                    <div class="section sectionToMinBlack">
                        <h1 style="color: #B81E20; font-weight: bold;">Previous and Won Tips</h1><br>
                        <?php    
                            // $APIkey='090ec463449a0632e9e54bd8a58f66bcf89cad3cb2d4144443dc59534f405c81';
                            $APIkey= $row_api->api_key;
                            // $from = '2021-10-9';
                            // $to = '2021-10-9';
                            // $league_id = 300;

                            $curl_options = array(
                            // CURLOPT_URL => "https://jsonplaceholder.typicode.com/posts?userId=1",
                            CURLOPT_URL => "https://apiv3.apifootball.com/?action=get_predictions&from=$today_date&to=$tomorrow_date&APIkey=$APIkey",
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
                            // var_dump($result[0]);

                            // foreach($result as $res){
                            //     if($res->country_name == 'England'){
                            //         echo "<br>".$res->match_hometeam_name." VS ".$res->match_awayteam_name."&nbsp;&nbsp;".$res->match_time."  ".$res->match_status;
                            //     }
                            // }
                            // echo "<br><br><br><br>";
                            
                            // echo $all_users->rowCount();
                        ?><?php 
                        if (sizeof($result) < 3){?>
                            <span class="d-flex justify-content-center"><h1>Sorry!! No tips are available at the moment</h1></span>
                        <?php }else{
                            // echo sizeof($result);
                        ?>
                        <table class="table table-striped text-black">
                            <thead>
                                <th style="padding: 10px 20px;">League</th>
                                <th style="padding: 10px 20px;">Match</th>
                                <th style="padding: 10px 20px;">Time</th>
                                <th style="padding: 10px 20px;">Tip</th>
                                <th></th>
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
                                            <td style="padding-top: 20px;"><?php echo $result[$a]->league_name;?></td>
                                            <td style="padding-top: 20px;"><?php echo $result[$a]->match_hometeam_name;?> - <br> <?php echo $result[$a]->match_awayteam_name;?></td>
                                            <td style="padding-top: 20px;"><?php echo $result[$a]->match_time;?></td>
                                            <td style="padding-top: 20px;"><?php 
                                                if ($result[$a]->prob_HW > $result[$a]->prob_D && $result[$a]->prob_HW > $result[$a]->prob_AW){
                                                    // echo "<br>".$prediction[2]->prob_HW;
                                                    $predict = "<h1 style='border:4px solid green; border-radius: 7px; text-align: center;'>1</h1>";
                                                }else if($result[$a]->prob_AW > $result[$a]->prob_HW && $result[$a]->prob_AW > $result[$a]->prob_D){
                                                    // echo "<br>".$prediction[2]->prob_AW;
                                                    $predict = "<h1 style='border:4px solid black; border-radius: 7px; text-align: center;'>2</h1>";
                                                }else{
                                                    // echo $prediction[2]->prob_D;
                                                    $predict = "<h1 style='border:4px solid brown; border-radius: 7px; text-align: center;'>X</h1>";
                                                } ?><?php echo $predict;?></td>
                                            <td style="padding-top: 20px;"><a href="#">More</a></td>
                                        </tr>
                                    <?php   } } }
                                ?> 
                                </tbody>
                            </table>
                        <!-- <table class="table table-striped text-black">
                            <thead>
                                <th style="padding: 10px 20px;">League</th>
                                <th style="padding: 10px 20px;">Match</th>
                                <th style="padding: 10px 20px;">Time</th>
                                <th style="padding: 10px 20px;">Odds</th>
                                <th style="padding: 10px 20px;">Tip</th>
                            </thead>

                            <tbody>
                                <tr>
                                    <td style="padding-top: 20px;">Champions League</td>
                                    <td style="padding-top: 20px;">PSG - Manchester City</td>
                                    <td style="padding-top: 20px;">20:00</td>
                                    <td style="padding-top: 20px;">2.90 | 5.30 | 2.10</td>
                                    <td style="padding-top: 20px;"><h1>H</h1></td>
                                </tr>
                                <tr>
                                    <td style="padding-top: 20px;">Othaya Youth League</td>
                                    <td style="padding-top: 20px;">Cumbaya FC - Chacaritas FC</td>
                                    <td style="padding-top: 20px;">17:30</td>
                                    <td style="padding-top: 20px;">1.20 | 9.05 | 21.00</td>
                                    <td style="padding-top: 20px;"><h1>D</h1></td>
                                </tr>
                                <tr>
                                    <td style="padding-top: 20px;">UEFA Champions League</td>
                                    <td style="padding-top: 20px;">Bayern Munich - Dynamo Kyiv</td>
                                    <td style="padding-top: 20px;">17:30</td>
                                    <td style="padding-top: 20px;">1.20 | 9.05 | 21.00</td>
                                    <td style="padding-top: 20px;"><h1>H</h1></td>
                                </tr>
                                <tr>
                                    <td style="padding-top: 20px;">Champions' League</td>
                                    <td style="padding-top: 20px;">Benfica - Barcelona</td>
                                    <td style="padding-top: 20px;">17:30</td>
                                    <td style="padding-top: 20px;">1.20 | 9.05 | 21.00</td>
                                    <td style="padding-top: 20px;"><h1>A</h1></td>
                                </tr>
                            </tbody>
                        </table> -->
                    </div>

                    <!-- Another Advert -->
                    <div class="d-flex justify-content-center" style="margin:auto; padding-bottom: 30px;"><a href="https://www.betway.co.ke/?btag=P77487-PR23747-CM67345-TS271152"; target="_blank" rel="nofollow"><img src="https://secure.betwaypartnersafrica.com/imagehandler/bf3af941-a798-4963-aea7-bb6c0e81f606/" alt="" /></a></div>

                    <!-- Premium Odds -->
                    <div class="section sectionToMinBlack">
                        <h1 style="color: #B81E20; font-weight: bold;">Premium Odds</h1><br>
                        <table class="table table-striped text-black">
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
                <!-- </div> -->
            <!-- </div>             -->

            <div class="row">
                <div class="col-md-4">
                    <div class="card" style="width: 28rem;">
                        <img class="card-img-top" src="./images/sky_sports_2.jpg" alt="Card image cap">
                        <div class="card-body">
                            <a class="card-text" href="#"><h1>BETTING TIPS FOR BEGINNERS</h1></a>
                        </div>
                    </div>
                    <!-- <div class="wrapper d-flex justify-content-center">
                        <img src="./images/sky_sports.jpg" alt="img here" style="width: 30%;">
                        <h1>BETTING TIPS FOR BEGINNERS</h1>
                    </div> -->
                </div>
                <div class="col-md-4">
                    <div class="card" style="width: 28rem;">
                        <img class="card-img-top" src="./images/chevrolet_2.jpg" alt="Card image cap">
                        <div class="card-body">
                            <a class="card-text" href="#"><h1>HOW POLITICS AFFECTS BETTING</h1></a>
                        </div>
                    </div>
                    <!-- <div class="wrapper d-flex justify-content-center">
                        <img src="./images/chevrolet_2.jpg" alt="img here" style="width: 30%;">
                        <h1>HOW POLITICS AFFECTS BETTING</h1>
                    </div> -->
                </div>
                <div class="col-md-4">
                    <div class="card" style="width: 28rem;">
                        <img class="card-img-top" src="./images/psg_play_1.jpg" alt="Card image cap">
                        <div class="card-body">
                            <a class="card-text" href="#"><h1>DON'T GET ADDICTED</h1></a>
                        </div>
                    </div>
                    <!-- <div class="wrapper d-flex justify-content-center">
                        <img src="DON'T GET ADDICTED" alt="img here" style="width: 30%;">
                        <h1>DON'T GET ADDICTED</h1>
                    </div> -->
                </div>
            </div>
        </div>
        <div style="width:80%; margin:auto;">
            <!-- <div class="row">
                <div class="col-md-6">
                    <div class="d-flex justify-content-center" style="background-color: #B81E20; font-family: tahoma; font-size: 20px; margin-bottom: 20px; padding:1rem; color: #f4f4f4; min-height: 400px;">
                        <div class="section sectionToMin">
                            <h1 style="font-weight: bold; font-size: 30px;">Live Results</h1>
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32. reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-center bottomSection" style="background-color: #FFD700; font-family: tahoma; font-size: 20px; margin:auto; padding:5rem; color: black; min-height: 400px;">
                    <div class="section sectionToMin">
                        <h1 style="font-weight: bold; font-size: 30px;">Premier League Predictions</h1>
                        <p>Bet3ways offers the most accurate premier league prediction in the world. As you are quite aware, the Premier League is the top tier of England's football pyramid, with 20 teams battling it out for the honour of being crowned English champions. The teams that finish in the bottom three of the league table at the end of the campaign are relegated to the Championship, the second tier of English football. Those teams are replaced by three clubs promoted from the Championship; the sides that finish in first and second place and the third via the end-of-season play-offs.

                        Home to some of the most famous clubs, players, managers and stadiums in world football, the Premier League is the most-watched league on the planet with one billion homes watching the action in 188 countries.

                        At Bet3ways , we take pride in giving the best football predictions with detailed analysis in the English Premiership scoring as high as 88% accuracy in our tips.</p>
                        </div>
                    </div>
                </div>
            </div> -->
            
        </div>
    </div>
        <div class="container" style="min-height: 200px;">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <h1>USEFUL LINKS</h1><hr style="width:10%; background-color: #C13333; margin-bottom: 2rem;">
                    <?php 
                        // foreach($row_articles as $article){
                        //     print_r($article->title);
                        // }
                    ?>
                    <a href=""><h2>HOW TO WORK AND EARN ONLINE</h2></a><hr>
                    <a href=""><h2>Best way of making money with football betting</h2></a><hr>
                    <a href=""><h2>BEST FOOTBALL PREDICTION SITES?</h2></a><hr>
                    <a href=""><h2>BEST SOCCER PREDICTION SITE FOR FIXED MATCHES?</h2></a><hr>
                    <a href=""><h2>FOOTBALL BETTING GUIDE</h2></a><hr>
                </div>
                <div class="col-md-6 mb-4">
                    <h1>USEFUL ATRICLES</h1><hr style="width:10%; font-weight: bold; background-color: #C13333; margin-bottom: 2rem;">
                    <?php
                        foreach($row_articles as $article){
                            echo "<a href='./articles.php?articleID=$article->id'><h2>$article->title</h2></a><hr>";
                        }?>
                    <a href=""><h2>BETTING SITES WITH GOOD ODDS</h2></a><hr>
                    <a href=""><h2>HOW TO STOP LOSING IN SPORT BETTING</h2></a><hr>
                    <a href="policy.php"><h2>PRIVACY POLICY</h2></a><hr>
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