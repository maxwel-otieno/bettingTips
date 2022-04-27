<html>
   <head>
    	<title>Livestreams</title>
        <link rel="stylesheet" href="css/livestream.css?v=1.1">
        <script type="text/javascript" src = "js/game.js"></script>

        <link rel="stylesheet" href="../css/bootstrap.min.css">

        <!-- Custom stylesheet -->
        <link rel="stylesheet" href="../css/stylesheet.css">

        <!-- logo -->
        <link rel="icon" type="image/png" sizes="16x16" href="../images/ball_2.png">

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
                /* background-color: white; color: black; */
                /* font-family: Jura; */
                padding-left: 20px;
                overflow-x: hidden;
            }
            .nav-list{
                color: #fff;
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
            .toShow{
                display: none;
            }
            .smallCont{
                width: 80%;
                margin: auto;
            }
            #game{
                min-height: 100vh;
            }
            table{
                font-size: 13px;
            }
            table tr{
                padding: 20px 0px;
            }
            #league{
                font-size: 18px;
                color: #AFA8A9;
                padding-top: 20px;
                padding-bottom: -10px;
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
                table{
                    font-size: 15px;
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
                #notShow{
                    display: none;
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
                .container{
                    width: 100% !important;
                }            
                .football{
                    width:10% !important; height: 14% !important;
                    padding-top: 5px !important;
                }
            }
        </style>
   </head>
   <body>
        <header>            
            <!-- Navigation -->
            <nav class="nav">
                <div class="navigation container">
                    <div class="logo">
                        <div class="d-flex">
                            <img src="../images/ball_2.png" alt="" class="football" style="padding-top:2px;"><h1 style="font-size:32px; font-weight: bold; color: white;">Bet3<span style="color: brown; font-size: 29dp;">Ways</span></h1></img>
                        </div>
                        <!-- <img src="./images/Bet3ways_logo.jpg" alt="Bet3Ways.com" width="35%"> -->
                    </div>
                    <div class="menu">
                        <div class="top-nav">
                            <div class="logo">
                                <div class="d-flex">
                                    <img src="../images/ball_2.png" alt="" class="football"><h1 style="font-size:32px; font-weight: bold; color: white;">Bet3<span style="color: brown; font-size: 29dp;">Ways</span></h1></img>
                                </div>
                            </div>
                            <div class="close">
                                <i class='bx bx-x' ></i>
                            </div>
                        </div>

                        <ul class="nav-list">
                            <li class="nav-item active">
                                <a href="../index.php" class="nav-link scroll-link">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="../tips.php" class="nav-link scroll-link">Tips</a>
                            </li>
                            <li class="nav-item">
                                <a href="../livescores/index.php" class="nav-link scroll-link">Livescore</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link scroll-link">Stream</a>
                            </li>
                            <li class="nav-item">
                                <a href="../about.php" class="nav-link scroll-link">About</a>
                            </li>
                            <li class="nav-item">
                                <a href="../articles.php?articleID=<?php echo rand(1, 5);?>" class="nav-link scroll-link">Blogs</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a href="login.php" class="nav-link scroll-link">Login</a>
                            </li> -->
                            <!-- <li class="nav-item">
                                <a href="#home" class="nav-link scroll-link">Create Account</a>
                            </li> -->
                            <li class="nav-item active">
                                <a href="../vipsite.php" class="nav-link scroll-link" style="color: white; font-size: 16px; padding: 0.5rem 2rem; background-color: brown;border-radius: 20px;">VVIP</a>
                            </li>
                        </ul>
                    </div>

                    <div class="hamburger text-white">
                        <i class="bx bx-menu"></i>
                    </div>
                </div>
            </nav>
        </header>

        <section>
            <h1 class="d-flex justify-content-center my-3"> Today's Games </h1>
            <h5 class="d-flex justify-content-center my-3" style='font-size: 12px;'>All times in GMT</h5><br>
            <?php
                include "settings.php";
                try {
                        $conn = new PDO("mysql:host=$servername;dbname=$database_name", $username, $password);
                        // set the PDO error mode to exception
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        //echo "Connected successfully";

                        $date  = date_create()->format('Y-m-d');

                        $data_sql = "SELECT * FROM $table_name";
                        $data_sql = $data_sql . " WHERE date = '" . $date ."'";
                        $data_sql = $data_sql . " ORDER BY date DESC LIMIT 50;";

                        $num_sql = "SELECT count(*) as `count` FROM $table_name WHERE 1";
                        $rowNum = $conn->query($num_sql);

                        // print_r($rowNum->fetch());
                        $my_num = $rowNum->fetch();
                        // echo "<br>".$my_num['count']/2;

                        // echo mysqli_num_rows($rowNum->fetch());

                        $result = $conn->query($data_sql);
                        // output data of each row
                    echo "<div class = 'row pl-3'>" ;
                    echo "<div class = 'col-lg-5 pb-5 pl-5'>" ;
                        while($row = $result->fetch()) {
                                echo "<h6 id='league'>" . $row['league'] . "</h6>";
                            echo "<table class='table-borderless' style='width: 100%;'>"   ;
                            // echo "<tr class='my-2'>";
                            //     echo "<td id='league'>" . $row['league'] . "</td>";
                            // echo "</tr>" ;
                            echo "<tr id='live'>" ;

                                if($row['time'] == ''){echo "<td style='color: brown; width: 20%;'> `Live </td>" ;}
                                else{echo "<td style='width: 20%;'>" . $row['time']   . "</td>" ;}

                                echo "<td style='width: 50%;'>" . $row['team']   . "</td>" ;
                                $play = "play('" . $row['link'] . "')";

                                echo "<td style='width: 20%; text-align: right;' class='py-2'><a href='#game'><input id='btnClick' type=button value = 'Watch' onclick = \"" . $play . "\" style='padding: 7px 20px;color: white; border-radius: 10px; border: none; background-color: brown; cursor: pointer;'<a></td>"  ;
                            echo "</tr>"  ;
                            echo "</table>" ;
                        }
                    echo "</div> <div class='col-lg-1'></div>"  ;
                    // echo "<div class='column-sm'></div>";
                    echo "<div id = 'game' class = 'col-xl-6 pb-5'></div>" ;
                echo "</div>" ;
                    } catch(PDOException $e) {
                        //echo "Connection failed: " . $e->getMessage();
                    }

                    $conn = null;
            ?>
        </section>
   </body>
</html>