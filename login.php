<?php
    include 'db_config.php';

    $Err = "";
    if(isset($_POST['login'])){
        $name = $_POST['username'];
        $password = md5($_POST['password']);

        // echo $name;
        // header('location: index.php');
        $get_user->execute([$name, $password]);
        if($get_user->rowCount()>0){
            // echo $password."<br>";
            $user = $get_user->fetch(PDO::FETCH_OBJ);
            $access = $user->access_level;

            session_start();
            $_SESSION['username'] = $name;
            $log_query = $pdo->prepare("INSERT INTO activity_log (`userID`, `time`, `activity`, `activity_desc`) VALUES('$user->id', NOW(), 'Login', 'User of username \"$user->username\" logged in successfully')");
            $log_query->execute();

            // echo $access. "   <br>  ".$_SESSION['username'];

            // header('location: vipsite.php');
            if($access == '1'){
                header('location: ./admin/home.php');
            }else{                
                header('location: ./vipsite.php');
            }
        }else{
            $log_query = $pdo->prepare("INSERT INTO activity_log (`userID`, `time`, `activity`, `activity_desc`) VALUES('unknown', NOW(), 'Login failed', 'Login attempt by \"$name\" failed. Invalid credentials.')");
            $log_query->execute();

            $Err = "<span class='alert d-flex justify-content-center mb-3' style='background-color:#c10717; color:#fff; border-radius:6px;'>Invalid username or password. Please try again or&nbsp;<a href='index.php'> sign up</a>.</span>";
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
    <title>Bet3ways.com | Login</title>

    <style>
        #b4_form{
            margin-top: 11%;
        }
        #form_login{
            width: 60%; background-color: white;
        }
        .pad-login{
            padding: 20px;
        }

        @media only screen and (max-width: 567px) {
            #b4_form{
                margin-top: 35%;
            }
            #form_login{
                width: 90%;
            }
            .pad-login{
                padding: 0px;
            }
        }
    </style>
</head>
<body>
    <div class="container text-black">
        <p id="yangu"></p>
        <div id="b4_form" class="row d-flex justify-content-center align-items-center">
            <div id="form_login" class="shadow p-3 mb-3 bg-white rounded">            
                <div class="d-flex justify-content-center pt-4"><h1 style="color: blue">LogIn</h1></div><br>
                <div class="container" class="pad-login">
                    <?php
                        if(!empty($Err)){
                            echo $Err;
                        }
                    ?>
                    <form action="login.php" method="post">
                        <label style="color: black;" for="username">Username</label>
                        <input type="text" class="form-control py-4" name="username" placeholder="E.g JohnDoe12"><br>
                        <label style="color: black;" for="password">Password</label>
                        <input type="password" class="form-control py-4" name="password" placeholder="Enter your password"><br>
                        <p style="color: black;"><small>Dont  have an account yet? <a href="./signup.php" style="color: blue;">SignUp</a></small><p>
                        <div class="d-flex justify-content-center pt-4"><input type="submit" style="padding: 6px 30px; color: white; cursor: pointer; font-size: 20px; font-family: arial; background-color: blue; border-radius: 5px; border: none;" name="login" value="Log In"></div><br>
                        <!-- <button class="btn btn-sm bg-primary" onclick="myFunction">YANGU</button> -->
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>    
<!-- 
    <script>
        setInterval(myFunction, 1000);

        function myFunction(){
            const myDiv = document.getElementById('yangu');
            // var number = 1;

            for(i = 0; i<10; i++){                
                myDiv.innerHTML = '<h1>Hallo '+i+'</h1>';
            }
        }
    </script> -->
</body>
</html>