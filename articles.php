<?php 
    include 'db_config.php';

    session_start();

    // echo $_SESSION['username'];
    $Err = "";    
    $article_ID = $_GET['articleID'];

    $single_article->execute([$article_ID]);
    $row_article = $single_article->fetch(PDO::FETCH_OBJ);

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // echo "Hello";
        if(isset($_POST['articleSub'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $message = $_POST['comment'];

            //check db if comment exists
            $query_verify = $pdo->prepare("SELECT * FROM article_response WHERE article_id=? AND email=? AND message=? AND phone=?");
            $query_verify->execute([$article_ID, $email, $message, $phone]);
            $row_verify = $query_verify->fetchAll(PDO::FETCH_OBJ);

            if($query_verify->rowCount() < 1){
                //Insert the comments data into the database
                $insert_article = $pdo->prepare("INSERT INTO article_response (`name`, `article_id`, `email`, `message`, `phone`) VALUES('$name', '$article_ID', '$email', '$message', '$phone')");
                $stmt_article = $insert_article->execute();

                if($insert_article->rowCount() > 0){
                    $Err = "<span class='alert d-flex justify-content-center mb-5' style='background-color:#2AAA00; margin-top:4rem; color: #fff'>Your comment has been sent</span>";
                }
            }else{
                $Err = "<span class='alert d-flex justify-content-center mb-5' style='background-color:red; margin-top:1rem; color: #fff'>Error!!! Comment already exists</span>";             
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
    <title>Bet3ways | Blog</title>

    <style>
        body{
            /* background-color: #fff; */
            background-color: white; color: black;
            /* padding-left: 15px; */
        }
        .small_container{
            width: 90%;
            margin: auto;
        }
        .frames{
            display: none;
        }
        .free_money_hr{
            width: 15%; background-color: #C13333; font-weight: bold; height: 0.2rem; margin-bottom: 4rem;
        }

        /* PROMO */
        .advert_promo{
            width: 70%;
            background-color:orange;
            border-radius:5px;
            /* margin: auto; */
            margin-top: 1rem;
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

        /*tables */
        table td{
            vertical-align: center; text-align: center;
        }


        .contact{
            width: 70%;
            border: 2px solid #f4f4f4;
            padding: 15px;
            padding-right: 40px;
            margin-bottom: 4rem;
        }
        @media only screen and (max-width: 1200px){
            
            /*tables */
            .td_bonus{
                padding: 7px 17px;;
                /* font-size: 40px; */
            }
        }
        @media only screen and (max-width: 1024px){            
            /*tables */
            .td_bonus{
                padding: 7px 17px;;
                /* font-size: 40px; */
            }
        }
        @media only screen and (max-width: 978px){
            .contact{
                width: 100%;
            }
            .advert_promo{
                width: 100%;
                /* min-height: 400px; */
            }
            
            /*tables */
            .td_bonus{
                padding: 10px 30px;;
                /* font-size: 40px; */
            }
        }
        @media only screen and (max-width: 768px){
            #notShow{
                display: none;
            }
            .small_container{
                width: 95% !important;
                margin: auto;
                overflow: hidden;
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
            .articles img{
                width: 400px !important;
                height: 250px !important;
            }
            .myImg{
                width: 15rem !important;
            }

            /*tables */
            .td_bonus{
                padding: 10px 20px;;
                /* font-size: 40px; */
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
            h1{
                font-size: 20px;
            }
            p{
                font-size: 15px !important;
            }
            li{
                font-size: 13px !important;
            }
            .articles img{
                width: 400px !important;
                height: 250px !important;
            }


            img{
                width: 40%;
            }
            .small_container{
                width: 100%;
                margin: auto;
            }
            /* .contact{
                width: 100%;
            } */

            /*Bottom Links */
            .bottomLink h1{
                font-size: 18px;
            }
            .bottomLink h2{
                font-size: 14px;
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

            /*tables */
            table td span{
                vertical-align: center; 
                text-align: center;
            }
            .td_bonus{
                padding: 7px 17px;;
                /* font-size: 40px; */
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
                    echo "<div class='container'>".$Err."</div>";
            }
            ?>

    </header>

    <div class="mt-5">

        <div class="frames">
        <iframe scrolling='no' frameBorder='0' style='padding:0px; margin:0px; border:0px;border-style:none;border-style:none;' width='320' height='80' src="https://refpasrasw.world/I?tag=d_723421m_47685c_&site=723421&ad=47685" ></iframe></div>
        <div class="small_container">
            <div class="d-flex justify-content-center mb-5">
                <h1><?php echo $row_article->title;?></h1><br><br>
            </div>
            <!-- <hr style="width: 30%;background-color: gold; font-weight: 800; margin: auto; margin-top: -15px; margin-bottom: 5rem; height: 0.3rem;"/> -->
            <div class="row mb-4">
                <div class="col-lg-8 col-md-12">
                    <div class="articles">
                        <?php 
                            echo $row_article->body;
                        ?>
                    </div>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-3 col-md-12 mt-4">
                    <h1>GET FREE BETTING MONEY</h1><hr class="free_money_hr"/>
                    <div class="table table-bordered" style="width:100%">
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
                                    <td><a href="https://m.22bet.co.ke/?tag=d_723421m_32751c_" target="_blank" style="text-decoration: none;"><img width="100px" class="img-fluid" style="border-radius: 100%;" src="images/22Bet_1.JPG" alt="Image Here"/></a></td>
                                    <td style="padding-top: 10px;"><a href="https://m.22bet.co.ke/?tag=d_723421m_32751c_" class="text-center" style="text-decoration: none;"><span style="margin-top: 1rem; margin-bottom: -10px; color: red; font-size: 15px;">₦ 50,000<br></span><span class="btn bg-warning td_bonus">Get Bonus</span></a></td>
                                </tr>
                                <tr>
                                    <td><a href="https://www.betway.co.ke/?btag-P77487-PR23169-CM63192-TS271152" target="_blank" style="text-decoration: none;"><img width="100px;" class="img-fluid" src="./images/betway.png" alt="Image Here"/></a></td>
                                    <td style="padding: 10px;"><a href="https://www.betway.co.ke/?btag-P77487-PR23169-CM63192-TS271152_" class="text-center" style="text-decoration: none;" target="_blank"><span style="margin-top: 1rem; margin-bottom: -10px; color: red; font-size: 15px;">₦ 100,000<br></span><span class="btn bg-warning td_bonus">Get Bonus</span></a></td>
                                </tr>
                                <tr>
                                    <td><a href="https://melbet.ke/?tag=d_730661m_" target="_blank" style="text-decoration: none;"><img width="100px;" style="border-radius: 100%;" class="img-fluid" style="border-radius: 100%;" src="images/melbet.jfif" alt="Image Here"/></a></td>
                                    <td><a href="https://melbet.ke/?tag=d_730661m_" class="text-center" target="_blank" style="text-decoration: none;"><span style="margin-top: 1rem; margin-bottom: -10px; color: red; font-size: 15px;">₦ 2,000<br></span><span class="btn bg-warning td_bonus">Get Bonus</span></a></td>
                                </tr>
                                <tr>
                                    <td style="padding-top: 30px;"><a href="https://1xbet.co.ke/?tag=d_1248161m_47149c_" target="_blank" style="text-decoration: none;"><img width="100px;" style="border-radius: 100%;" class="img-fluid" src="images/1x_bet.png" alt="Image Here"/></a></td>
                                    <td style="padding-top: 10px;"><a href="https://1xbet.co.ke/?tag=d_1248161m_47149c_" class="text-center" target="_blank" style="text-decoration: none;"><span style="margin-top: 1rem; margin-bottom: -10px; color: red; font-size: 15px;">₦ 100,000<br></span><span class="btn bg-warning td_bonus">Get Bonus</span></a></td>
                                </tr>
                                <tr>
                                    <td><a href="https://www.betwinner.com" target="_blank" style="text-decoration: none;"><img width="100px;" style="border-radius: 100%;" class="img-fluid" src="images/bet_winner.png" alt="Image Here"/></a></td>
                                    <td style="padding: 10px;"><a href="https://www.betwinner.com" class="text-center" target="_blank" style="text-decoration: none;"><span style="margin-top: 1rem; margin-bottom: -10px; color: red; font-size: 15px;">₦ 100,000<br></span><span class="btn bg-warning td_bonus">Get Bonus</span></a></td>
                                </tr>
                                <tr>
                                    <td style="width: 50%;"><a href="https://melbet.ke/?tag=d_730661m_" target="_blank" style="text-decoration: none;"><img width="100px;" style="border-radius: 100%;" class="img-fluid" src="images/22Bet_1.JPG" alt="Image Here"/></a></td>
                                    <td><a href="https://melbet.ke/?tag=d_730661m_" class="text-center" style="text-decoration: none;" target="_blank"><span style="margin-top: 1rem; margin-bottom: -10px; color: red; font-size: 15px;">₦ 2,000<br></span><span class="btn bg-warning td_bonus">Get Bonus</span></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="advert_promo" style="padding-bottom: 20px;">
                <div class="row" style="padding:0;">
                    <!-- <div class="col-lg-2"></div> -->
                    <div class="col-lg-6 p-5">
                        <div class="d-flex justify-content-center">
                            <div>
                            <a href="https://m.22bet.co.ke/?tag=d_723421m_32751c_" style="cursor: pointer;"><img src="./images/22bet-logo.PNG" alt="" class="myImg"></a><br>
                            <!-- <a href="https://m.22bet.co.ke/?tag=d_723421m_32751c_" style="color: brown; font-weight: bold;text-align: center;margin: auto;">Full Review</a><br><hr style="margin: auto;background-color: brown; width: 10%; text-align: center;"> --></div>
                        </div>
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
            <div class="contact">
                <h3 style="color: green;">Leave a reply</h3>
                <span style="font-size: 15px;">Your email address will not be published</span><br><br>
                <form action="articles.php?articleID=<?php echo $article_ID; ?>" method="post" class="form" id="home">
                    <label for="comment" style="font-size: 17px;">Comment</label>
                    <textarea name="comment" id="commentBox" cols="20" rows="6" required class="form-control" style="font-size: 17px;"></textarea><br>
                    <label for="name" style="font-size: 17px;">Name : </label><input name="name" type="text" required class="form-control" style="font-size: 17px; height: 3.5rem;"><br>
                    <label for="email" style="font-size: 17px;">Email : </label> <input name="email" type="email" required class="form-control text-bold" style="font-size: 17px; height: 3.5rem;"><br>
                    <label for="phone" style="font-size: 17px;">Phone Number: </label> <input name="phone" type="phone" required class="form-control text-bold" minlength="10" style="font-size: 17px; height: 3.5rem;"><br>
                    <input type="submit" name="articleSub" value="Submit" class="btn bg-success btn-block" style="font-size: 15px;">
                </form>
            </div>
        </div><hr class="myHr" style="width: 70%; margin: auto; margin-bottom: 4rem; background-color: #fff; font-weight: bold;"/>
    </div>
        <div class="container" style="min-height: 200px;">
            <div class="row bottomLink">
                <div class="col-md-6 mb-4">
                    <h1>USEFUL LINKS</h1><hr style="width:10%; background-color: #C13333; margin-bottom: 2rem;">
                    <a href=""><h2>HOW TO WORK AND EARN ONLINE</h2></a><hr>
                    <a href=""><h2>BEST WAY OF MAKING MONEY WITH FOOTBALL BETTING</h2></a><hr>
                    <a href=""><h2>BEST FOOTBALL PREDICTION SITES?</h2></a><hr>
                    <a href=""><h2>BEST SOCCER PREDICTION SITE FOR FIXED MATCHES?</h2></a><hr>
                    <a href=""><h2>FOOTBALL BETTING GUIDE</h2></a><hr>
                </div>
                <div class="col-md-6 mb-4">
                    <h1>USEFUL ATRICLES</h1><hr style="width:10%; font-weight: bold; background-color: #C13333; margin-bottom: 2rem;;">
                    <?php
                        foreach($row_articles as $article){
                            echo "<a href='./articles.php?articleID=$article->id'><h2>$article->title</h2></a><hr>";
                        }?>
                    <!-- <a href=""><h2>BETTING SITES WITH GOOD ODDS</h2></a><hr>
                    <a href=""><h2>HOW TO STOP LOSING IN SPORT BETTING</h2></a><hr>
                    <a href="policy.php"><h2>PRIVACY POLICY</h2></a><hr> -->
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