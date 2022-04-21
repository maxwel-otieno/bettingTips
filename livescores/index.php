<?php 
    include '../db_config.php';

    $Err = "";    
    // $article_ID = $_GET['articleID'];

    // $single_article->execute([$article_ID]);
    // $row_article = $single_article->fetch(PDO::FETCH_OBJ);

    // if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //     // echo "Hello";
    //     if(isset($_POST['articleSub'])){
    //         $name = $_POST['name'];
    //         $email = $_POST['email'];
    //         $message = $_POST['comment'];

    //         //check db if comment exists
    //         $query_verify = $pdo->prepare("SELECT * FROM article_response WHERE article_id=? AND email=? AND message=?");
    //         $query_verify->execute([$article_ID, $email, $message]);
    //         $row_verify = $query_verify->fetchAll(PDO::FETCH_OBJ);

    //         if($query_verify->rowCount() < 1){
    //             //Insert the comments data into the database
    //             $insert_article = $pdo->prepare("INSERT INTO article_response (`name`, `article_id`, `email`, `message`) VALUES('$name', '$article_ID', '$email', '$message')");
    //             $stmt_article = $insert_article->execute();

    //             if($insert_article->rowCount() > 0){
    //                 $Err = "<span class='alert d-flex justify-content-center mb-5' style='background-color:#2AAA00; margin-top:4rem; color: #fff'>Your comment has been sent</span>";
    //             }
    //         }else{
    //             $Err = "<span class='alert d-flex justify-content-center mb-5' style='background-color:red; margin-top:1rem; color: #fff'>Error!!! Comment already exists</span>";             
    //         }
    //     }
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- favicon -->
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <!-- Box icons -->
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500"> 
    <!-- <link rel="stylesheet" href="../fonts/icomoon/style.css"> -->

    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,500;0,900;1,600&display=swap" rel="stylesheet">
    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="../css/stylesheet.css">
    <!-- <link rel="stylesheet" href="css/livescore.css"> -->
    
    <!-- logo -->
    <link rel="icon" type="image/png" sizes="16x16" href="../images/ball_2.png">

    <script src="js/get_data.js"></script>
    <title>Bet3ways | Livescores</title>
    <!-- <description>All the live mathches in one place. Search all leagues from around the world</description> -->
    <style>
        div.header {
            background-color:#ddd;
        }
        .nav-list{
            color: #fff;
        }

        table.livescore {
            border-collapse: collapse;
            width : 100%;
        }
        table.livescore tr.bordert-top {
            border-top: 1.5px solid #f4f4f4;
            padding-top: 2rem !important;
            /* margin-bottom: 20rem !important; */
        }

        table.livescore {
            text-align : left;
        }

        table.livescore td.l1{
            width : 10%;
            color: white;
            /* font-size: 13px; */
            padding-top: 2rem;
        }

        table.livescore td.l1_live{
            width : 10%;
            color: brown;
        }

        table.livescore td.l1{
            width : 10%;
            color: white;
            /* font-size: 13px; */
        }

        table.livescore td.l2{
            width : 80%;
            /* font-size: 13px; */
        }
        table.livescore td.l3{
            text-align : right;
            /* font-size: 13px; */
        }
        .l3_live{
            color: brown; 
            /* width: 10%: */
        }

        .title {
            text-align : center;
        }

        #edt_search {
            width: 60%;
            min-width : 150px;
            margin-right: 3rem;
        }

        #chk_live {
            vertical-align : middle;
        }

        #btn_submit {
            width : 30%;
            min-width : 60px;
            margin-left: 2rem;
        }
        body{
            font-family: 'tahoma', 'Poppins', sans-serif !important;
        }
        .myHeader{
            /* background-color: #000; */
            font-size: 20px;
            padding: 5px 10px;
            /* font-weight: bold; */
            margin-top: 2rem;
            color: #AFA8A9;
        }
        #football{
                width:5%; height:5%;
                padding-top: 5px;
        }        
        .my_H1{
            text-align: center; font-size: 33px; font-weight: bold; margin-bottom: 4rem; color: black;
        }
        
        /*tables */
        #tableYangu{
            margin-bottom: 6rem;
            width: 100%;
        }
        .td_bonus{
            padding: 6px 17px;
        }
        #tableYangu tbody tr td{
            vertical-align: center; text-align: center;
        }
        .free_money_hr{
            width: 10%; 
            background-color: #C13333; 
            font-weight: bold; 
            height: 0.2rem; 
            margin: -3rem auto 4rem auto;
        }
        @media only screen and (max-width: 900px;){            
            #edt_search{
                /* width: 100vw; */
                width: 70%;
            }
            #live_comb{
                width: 10%;
            }
            #btn_submit{
                margin-top: 2rem;
                margin-left: 0;

                width: 30vw;
                /* float: right; */
            }
        }

        @media only screen and (max-width: 567px){
            .nav-list{
                color: #000;
            }
            table.livescore tr{
                font-size: 15px !important;
            }
            table.livescore td.l1_live{
                width : 15%;
                color: brown;
            }
            table.livescore td.l1{
                width : 15%;
                color: white;
                /* padding-right: 2rem; */
            } 
            table.livescore tr{
                margin-bottom: 2rem !important;
            }
            .myHeader{
                font-size: 16px;
                margin-top: 2.5rem;
                color: #AFA8A9;
            }
            #football{
                width: 10%; height: 14%;
                padding-top: 5px;
            }
            #edt_search{
                /* width: 100vw; */
                width: 70%;
            }
            #live_comb{
                width: 10%;
            }
            #btn_submit{
                margin-top: 2rem;
                margin-left: 0;

                width: 30vw;
                /* float: right; */
            }
            #notShow{
                display: none;
            }
            .my_H1{
                font-size: 22px;
            }

            /* tables */            
            .free_money_hr{
                height: 0.2rem; 
                width: 10%;
                margin-bottom: 4rem;
                margin-top: 0px;  
                margin: -3rem auto 4rem auto;
            }
        }
    </style>
</head>
<body onload = "get_livescores('', 'true')">
    <!-- header -->
    <header id='home'>
        <!-- Navigation -->
        <nav class="nav">
            <div class="navigation container">
                <div class="logo">
                    <div class="d-flex">
                        <img src="../images/ball_2.png" alt="" id="football"><h1 style="font-size:32px; font-weight: bold;">Bet3<span style="color: brown; font-size: 29dp;">Ways</span></h1></img>
                    </div>
                    <!-- <img src="./images/Bet3ways_logo.jpg" alt="Bet3Ways.com" width="35%"> -->
                </div>
                <div class="menu">
                    <div class="top-nav">
                        <div class="logo">
                            <div class="d-flex">
                                <img src="../images/ball_2.png" alt="" id="football"><h1 style="font-size:32px; font-weight: bold;">Bet3<span style="color: brown; font-size: 29dp;">Ways</span></h1></img>
                            </div>
                    <!-- <img src="./images/Bet3ways_logo.jpg" alt="Bet3Ways.com"> -->
                        </div>
                        <div class="close">
                            <i class='bx bx-x' ></i>
                        </div>
                    </div>

                    <ul class="nav-list">
                        <li class="nav-item">
                            <a href="../index.php" class="nav-link scroll-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="../tips.php" class="nav-link scroll-link">Tips</a>
                        </li>
                        <li class="nav-item active">
                            <a href="../livescores/index.php" style="color:brown;" class="nav-link scroll-link">Livescore</a>
                        </li>
                        <li class="nav-item">
                            <a href="../about.php" class="nav-link scroll-link">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="../articles.php?articleID=<?php echo rand(1, 5);?>" class="nav-link scroll-link">Blogs</a>
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
     <!-- <h1 class="title">Bet3ways</h1> -->
     <div>
        <div class="container mb-5 pb-5">
            <form class = "livescores mt-5 mb-5 pb-5" onsubmit="return do_search();">
               <input class="p-2" style="border: none;" type="text" id = "edt_search" name="filter" placeholder="Country or League">
               <label for="chk_live">Live</label>
               <input type="checkbox" id = "chk_live" name = "live" checked = true onclick ="check_Click()"/>
               <input class="p-2" style="border: none; background-color: #007ACC; cursor: pointer; color: white;" type="submit"   id = "btn_submit" value="Search">
            </form>

            <div id = "data_container"></div>
        </div>     
     </div>

     <section class="py-5 mb-0" style="background-color: white; padding-bottom: 3rem;">
         <div class="container">
            <div>
                <h1 class="my_H1">TOP BOOKMARKERS</h1><hr class="free_money_hr"/>         
                <table class="table table-striped table-bordered" id="tableYangu">
                    <tbody>
                        <!-- 22bet link -- https://m.22bet.co.ke/?tag=d_723421m_32751c_ -->
                        <tr>
                            <td><a  href="https://lp.22betpartners.com/p/multisport-nigeria/index-ng.php?btag=439991_FE66D4BDCD2C4A8B94C91623BD4B3B07" target="_blank"><img width="90px" class="img-fluid" src="../images/22Bet_1.JPG" alt="Image Here"/></a></td>
                            <td><div class="d-flex justify-content-center" style="align-self: center; padding-top: 40px; color: black !important"><a href="https://lp.22betpartners.com/p/multisport-nigeria/index-ng.php?btag=439991_FE66D4BDCD2C4A8B94C91623BD4B3B07" target="_blank">22Bet</a></div></td>
                            <td><a href="https://lp.22betpartners.com/p/multisport-nigeria/index-ng.php?btag=439991_FE66D4BDCD2C4A8B94C91623BD4B3B07" class="text-center" target="_blank"><span style="margin-top: 1rem; margin-bottom: -10px; color: red; font-size: 15px;">₦ 50,000<br></span><span class="btn bg-warning td_bonus">Get Bonus</span></a></td>
                        </tr>
                        <tr>
                            <td><a class="d-flex justify-content-center align-items-center" href="https://www.betway.co.ke/?btag-P77487-PR23169-CM63192-TS271152" style="padding-top: 10px;"><img width="90px;" class="img-fluid" src="../images/betway.png" alt="Image Here"/></a></td>
                            <td><div class="d-flex justify-content-center" style="align-self: center; padding-top: 50px; color: black !important"><a href="https://www.betway.co.ke/?btag-P77487-PR23169-CM63192-TS271152">BetWay</a></div></td>
                            <td style="padding: 2rem;"><a href="https://www.betway.co.ke/?btag-P77487-PR23169-CM63192-TS271152" class="text-center" target="_blank"><span style="margin-top: 1rem; margin-bottom: -10px; color: red; font-size: 15px;">₦ 100,000<br></span><span class="btn bg-warning td_bonus">Get Bonus</span></a></td>
                        </tr>
                        <tr>
                            <td><a class="d-flex justify-content-center align-items-center" href="https://melbet.ke/?tag=d_730661m_" target="_blank"><img width="90px;" class="img-fluid" src="../images/melbet.jfif" alt="Image Here"/></a></td>
                            <td><div class="d-flex justify-content-center" style="align-self: center; padding-top: 25px; color: black !important""><a href="https://melbet.ke/?tag=d_730661m_" target="_blank">Melbet</a></div></td>
                            <td><a href="https://melbet.ke/?tag=d_730661m_" class="text-center" target="_blank"><span style="margin-top: 1rem; margin-bottom: -10px; color: red; font-size: 15px;">₦ 2,000<br></span><span class="btn bg-warning td_bonus">Get Bonus</span></a></td>
                        </tr>
                        <tr>
                            <td><a class="d-flex justify-content-center align-items-center" href="https://1xbet.co.ke/?tag=d_1248161m_47149c_" target="_blank"><img width="100px;" class="img-fluid" src="../images/1x_bet.png" alt="Image Here"/></a></td>
                            <td><div class="d-flex justify-content-center" style="align-self: center; padding-top: 25px; color: black !important""><a href="https://1xbet.co.ke/?tag=d_1248161m_47149c_" target="_blank">1Xbet</a></div></td>
                            <td><a href="https://1xbet.co.ke/?tag=d_1248161m_47149c_" class="text-center" target="_blank"><span style="margin-top: 1rem; margin-bottom: -10px; color: red; font-size: 15px;">₦ 100,000<br></span><span class="btn bg-warning td_bonus">Get Bonus</span></a></td>
                        </tr>
                        <tr>
                            <td><a class="d-flex justify-content-center align-items-center" href="https://lp.22betpartners.com/p/multisport-nigeria/index-ng.php?btag=439991_FE66D4BDCD2C4A8B94C91623BD4B3B07" target="_blank"><img width="100px;" class="img-fluid" src="../images/bet_winner.png" alt="Image Here"/></a></td>
                            <td><div class="d-flex justify-content-center" style="align-self: center; padding-top: 25px; color: black !important""><a href="https://lp.22betpartners.com/p/multisport-nigeria/index-ng.php?btag=439991_FE66D4BDCD2C4A8B94C91623BD4B3B07" target="_blank">BetWinner</a></div></td>
                            <td><a href="https://lp.22betpartners.com/p/multisport-nigeria/index-ng.php?btag=439991_FE66D4BDCD2C4A8B94C91623BD4B3B07" class="text-center" target="_blank"><span style="margin-top: 1rem; margin-bottom: -10px; color: red; font-size: 15px;">₦ 100,000<br></span><span class="btn bg-warning td_bonus">Get Bonus</span></a></td>
                        </tr>
                        <!-- <tr>
                            <td><a class="d-flex justify-content-center align-items-center" href="https://lp.22betpartners.com/p/multisport-nigeria/index-ng.php?btag=439991_FE66D4BDCD2C4A8B94C91623BD4B3B07" target="_blank"><img width="100px;" class="img-fluid" src="../images/22Bet_1.JPG" alt="Image Here"/></a></td>
                            <td><div class="d-flex justify-content-center" style="align-self: center; padding-top: 25px; color: black !important""><a href="https://lp.22betpartners.com/p/multisport-nigeria/index-ng.php?btag=439991_FE66D4BDCD2C4A8B94C91623BD4B3B07" target="_blank">22Bet</a></div></td>
                            <td><a href="https://lp.22betpartners.com/p/multisport-nigeria/index-ng.php?btag=439991_FE66D4BDCD2C4A8B94C91623BD4B3B07" class="text-center" target="_blank"><span style="margin-top: 1rem; margin-bottom: -10px; color: red; font-size: 15px;">₦ 100,000<br></span><span class="btn bg-warning td_bonus">Get Bonus</span></a></td>
                        </tr> -->
                        <tr>
                            <td><a class="d-flex justify-content-center align-items-center" href="https://lp.22betpartners.com/p/multisport-nigeria/index-ng.php?btag=439991_FE66D4BDCD2C4A8B94C91623BD4B3B07" target="_blank"><img width="100px;" class="img-fluid" src="../images/22Bet_1.JPG" alt="Image Here"/></a></td>
                            <td><div class="d-flex justify-content-center" style="align-self: center; padding-top: 25px; color: black !important""><a href="https://lp.22betpartners.com/p/multisport-nigeria/index-ng.php?btag=439991_FE66D4BDCD2C4A8B94C91623BD4B3B07" target="_blank">Bet3ways</a></div></td>
                            <td><a href="https://lp.22betpartners.com/p/multisport-nigeria/index-ng.php?btag=439991_FE66D4BDCD2C4A8B94C91623BD4B3B07" class="text-center" target="_blank"><span style="margin-top: 1rem; margin-bottom: -10px; color: red; font-size: 15px;">₦ 100,000<br></span><span class="btn bg-warning td_bonus">Get Bonus</span></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
     </section>

    <!-- Footer -->
    <footer id="footer" class="section footer">
        <div class="container">
            <div class="footer-container">
                <div class="footer-center">
                    <h3>INFORMATION</h3>
                    <a href="../about.php">About Us</a>
                    <a href="../policy.php">Privacy Policy</a>
                </div>
                <div class="footer-center">
                    <br id="notShow"/>
                    <a href="#">Terms & Conditions</a>
                    <a href="../articles.php?articleID=1#contact">Contact Us</a>
                </div>
                <div class="footer-center">
                    <h3>CONTACT US</h3>
                    <div>
                        <span>
                        <i class="fas fa-map-marker-alt"></i>
                        </span>
                        bet3ways@gmail.com
                    </div>
                    <div>
                        <span>
                        <i class="far fa-envelope"></i>
                        </span>
                        bet3ways@outlook.com
                    </div>
                </div>
                <div class="footer-center">
                    <br id="notShow"/>
                    <div>
                        <span>
                        <i class="fas fa-phone"></i>
                        </span>
                        <a href="https://bet3ways.com/">https://bet3ways.com/</a>
                    </div>
                    <div>
                        <span>
                        <i class="far fa-paper-plane"></i>
                        </span>
                        <a href="https://t.me/bet3ways" target="_blank">https://t.me/bet3ways</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js"></script>
    <!-- Custom Script -->
    <script src="../js/index.js"></script>
</body>
</html>