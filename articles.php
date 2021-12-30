<?php 
    include 'db_config.php';

    $Err = "";    
    $article_ID = $_GET['articleID'];
        // echo $article_ID;

    $single_article->execute([$article_ID]);
    $row_article = $single_article->fetch(PDO::FETCH_OBJ);

    // echo $row_articles->title;
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
        body{
            /* background-color: #fff; */
        }
        .small_container{
            width: 90%;
            margin: auto;
        }
        .advert_promo{
            width:70%;
            background-color:orange;
            border-radius:5px;
            min-height: 300px;
            margin-bottom: 50px;
            padding: 20px;
        }
        #promo_code{
            background-color: #969696;
            color: black;
        }
        #promo_code:hover{
            background-color: black;
            color: orange;
        }
        #get_bonus{
            position:relative; bottom: -50px;width: 80%; margin-left:10%; margin-bottom: 5%; background-color:#C13333; border-radius: 30px;
        }
        #get_bonus:hover{
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
        @media only screen and (max-width: 768px){
            #notShow{
                display: none;
            }
            img{
                width: 40%;
            }
            .small_container{
                width: 70%;
                margin: auto;
            }
            .advert_promo{
                width: 100%;
                min-height: 600px;
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
            ?>

    </header>

    <div style="min-height: 200px; margin-bottom: 100px;" class="mt-5">
        <div class="small_container">
            <div class="d-flex justify-content-center">
                <h1 style="font-size: 30px; margin-bottom: 4rem;"><?php echo $row_article->title;?></h1><br><br>
            </div>
            <div class="row mb-4">
                <div class="col-lg-8 col-md-12">
                    <?php 
                        echo $row_article->body;
                    ?>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-3 col-md-12 mt-4">
                    <h1>FREE MONEY</h1><hr style="width: 20%; background-color: #C13333; font-weight: bold; margin-bottom: 4rem;"/>
                    <div class="table table-bordered">
                        <table>
                            <tbody>
                                <tr>
                                    <td><a class="d-flex justify-content-center align-items-center" href="https://m.22bet.co.ke/?tag=d_723421m_32751c_"><img style="width: 100%; height: auto;" src="images/22Bet_1.JPG" alt="Image Here"/></a></td>
                                    <td class="d-flex justify-content-center" style="text-align: center;">
                                        <div class="inner">
                                            <a href="22bet.com">22Bet</a><br>
                                            <span class="btn bg-warning">Get Bonus</span>
                                        </div>
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <td><a class="d-flex justify-content-center align-items-center" href="https://m.22bet.co.ke/?tag=d_723421m_32751c_"><img style="width: 80%;" class="img-fluid" src="images/22Bet_1.JPG" alt="Image Here"/></a></td>
                                    <td><div class="d-flex justify-content-center" style="align-self: center; padding-top: 25px;"><a href="22bet.com">AlphaBet</a></div></td>
                                    <td><span class="btn bg-warning">Get Bonus</span></td>
                                </tr>
                                <tr>
                                    <td><a class="d-flex justify-content-center align-items-center" href="https://m.22bet.co.ke/?tag=d_723421m_32751c_"><img style="width: 80%;" class="img-fluid" src="images/22Bet_1.JPG" alt="Image Here"/></a></td>
                                    <td><div class="d-flex justify-content-center" style="align-self: center; padding-top: 25px;"><a href="22bet.com">BetNaija</a></div></td>
                                    <td><span class="btn bg-warning">Get Bonus</span></td>
                                </tr>
                                <tr>
                                    <td><a class="d-flex justify-content-center align-items-center" href="https://www.sportpesa.com/"><img style="width: 80%;" class="img-fluid" src="images/sportPesa.JPG" alt="Image Here"/></a></td>
                                    <td><div class="d-flex justify-content-center" style="align-self: center; padding-top: 25px;"><a href="22bet.com">SportPesa</a></div></td>
                                    <td><span class="btn bg-warning">Get Bonus</span></td>
                                </tr>
                                <tr>
                                    <td><a class="d-flex justify-content-center align-items-center" href="https://betmoran.co.ke/betin-kenya/"><img style="width: 80%;" class="img-fluid" src="images/betmoran.png" alt="Image Here"/></a></td>
                                    <td><div class="d-flex justify-content-center" style="align-self: center; padding-top: 25px;"><a href="22bet.com">Betmoran</a></div></td>
                                    <td><span class="btn bg-warning">Get Bonus</span></td>
                                </tr>
                                <tr>
                                    <td><a class="d-flex justify-content-center align-items-center" href="https://m.22bet.co.ke/?tag=d_723421m_32751c_"><img style="width: 80%;" class="img-fluid" src="images/22Bet_1.JPG" alt="Image Here"/></a></td>
                                    <td><div class="d-flex justify-content-center" style="align-self: center; padding-top: 25px;"><a href="22bet.com">Bet3ways</a></div></td>
                                    <td><span class="btn bg-warning">Get Bonus</span></td>
                                </tr>
                                <tr>
                                    <td><a class="d-flex justify-content-center align-items-center" href="https://m.22bet.co.ke/?tag=d_723421m_32751c_"><img style="width: 80%;" class="img-fluid" src="images/22Bet_1.JPG" alt="Image Here"/></a></td>
                                    <td><div class="d-flex justify-content-center" style="align-self: center; padding-top: 25px;"><a href="22bet.com">Bet254</a></div></td>
                                    <td><span class="btn bg-warning">Get Bonus</span></td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="advert_promo">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-4 p-5">
                        <div class="d-flex justify-content-center">
                            <a href="https://m.22bet.co.ke/?tag=d_723421m_32751c_" style="cursor: pointer;"><img src="./images/22bet-logo.PNG" alt="" style="width:25rem; padding: 2rem;"></a>
                        </div>
                    </div>
                    <div class="col-lg-4 p-5">
                        <div class="d-flex justify-content-center">
                            <div>
                                <h1 style="padding-top: 3rem; color: #C13333;">GET KSH 200 BONUS</h1>
                                <button class="btn btn-default btn-lg" id="promo_code">PROMO CODE : 22_326807</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2"></div>
                </div>
                <button class="btn btn-lg btn-block" id="get_bonus"><a href="https://m.22bet.co.ke/?tag=d_723421m_32751c_" style="font-size: 15px; text-decoration: none;">Get Bonus</a></button>
            </div>
        </div><hr style="width: 70%; margin: auto; background-color: #fff; font-weight: bold;"/>
    </div>
        <div class="container" style="min-height: 200px;">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <h1>USEFUL LINKS</h1><hr style="width:10%; height: 30px; color: #f4f4f4;">
                    <a href=""><h2>HOW TO WORK AND EARN ONLINE</h2></a><hr>
                    <a href=""><h2>BEST WAY OF MAKING MONEY WITH FOOTBALL BETTING</h2></a><hr>
                    <a href=""><h2>BEST FOOTBALL PREDICTION SITES?</h2></a><hr>
                    <a href=""><h2>BEST SOCCER PREDICTION SITE FOR FIXED MATCHES?</h2></a><hr>
                    <a href=""><h2>FOOTBALL BETTING GUIDE</h2></a><hr>
                </div>
                <div class="col-md-6 mb-4">
                    <h1>USEFUL ATRICLES</h1><hr style="width:10%; height: 30px; color: #f4f4f4;">
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