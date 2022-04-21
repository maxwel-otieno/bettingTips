<?php 
   //  error_reporting();
    require_once '../db_config.php';
    
?>

<html>
   <head>
    	<title>Livescores</title>

       <!-- external css -->
         <!-- <link rel="stylesheet" href="css/livescore.css"> -->

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
         
         <!-- logo -->
         <link rel="icon" type="image/png" sizes="16x16" href="../images/ball_2.png">

         <script src="js/get_data.js"></script>

         <style>
            div.header {
               background-color:#ddd;
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
               color: red;
               font-size: 13px;
               padding-top: 2rem;
            }

            table.livescore td.l1_live{
               width : 10%;
               color: red;
            }

            table.livescore td.l1{
               width : 10%;
               color: black;
            }

            table.livescore td.l2{
               width : 80%;
               font-size: 13px;
            }
            table.livescore td.l3{
               text-align : right;
               font-size: 13px;
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
               color: #f4f4f4;
            }
            #football{
                  width:5%; height:5%;
            }

            @media only screen and (max-width: 567px){
               table.livescore td{
                  font-size: 100px !important;
               }
               #football{
                  width: 10%;
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
                            <a href="../livescore.php" style="color:brown;" class="nav-link scroll-link">Livescore</a>
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
                           <a href="../vipsite.php" class="nav-link scroll-link" style="color: black; font-size: 16px; padding: 0.5rem 2rem; background-color: white;border-radius: 20px;">VVIP</a>
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

   <!-- Footer -->
   <footer id="footer" class="section footer">
      <div class="container">
         <div class="footer-container">
               <div class="footer-center">
                  <h3>INFORMATION</h3>
                  <a href="../about.php">About Us</a>
                  <a href="../policy.php">Privacy Policy</a>
                  <a href="#">Terms & Conditions</a>
                  <a href="../articles.php?articleID=1#contact">Contact Us</a>
               </div>
               <div class="footer-center">
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
               <div class="footer-center">
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
    <script src="../js/index.js"></script>
   </body>
</html>