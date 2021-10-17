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

            if($access == '1'){
                header('location: ./admin/home.php');
            }else{
                header('location: index.php');
            }
            session_start();
            $_SESSION['username'] = $name;
            $log_query = $pdo->prepare("INSERT INTO activity_log (`userID`, `time`, `activity`, `activity_desc`) VALUES('$user->id', NOW(), 'Login', 'User of username \"$user->username\" logged in successfully')");
            $log_query->execute();
        }else{
            $log_query = $pdo->prepare("INSERT INTO activity_log (`userID`, `time`, `activity`, `activity_desc`) VALUES('Unknown', NOW(), 'Login failed', 'Login attempt failed. $name does not exist.')");
            $log_query->execute();

            $Err = "<span class='alert d-flex justify-content-center mb-3' style='background-color:#c10717; color:#fff; border-radius:6px;'>The user doesn't exist. Please try again or&nbsp;<a href='index.php'> sign up</a>.</span>";
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
    <title>Tips|Login</title>
</head>
<body>
    <div class="container">
        <p id="yangu"></p>
        <div id="b4_form" class="row d-flex justify-content-center align-items-center" style="margin-top: 20%;">
            <div id="form_login" style="width: 60%; background-color: white;" class="shadow p-3 mb-3 bg-white rounded">            
                <div class="d-flex justify-content-center pt-4"><h1 class="text-blue">LogIn</h1></div><br>
                <div class="container" style="padding: 20px;">
                    <?php
                        if(!empty($Err)){
                            echo $Err;
                        }
                    ?>
                    <form action="login.php" method="post">
                        <label for="username">Username</label>
                        <input type="text" class="form-control py-4" name="username" placeholder="E.g JohnDoe12"><br>
                        <label for="password">Password</label>
                        <input type="password" class="form-control py-4" name="password" placeholder="Enter your password"><br>
                        <p><small>Dont  have an account yet? <a href="./index.php" style="color: blue;">SignUp</a></small><p>
                        <div class="d-flex justify-content-center pt-4"><input type="submit" style="padding: 6px 15px; color: white; cursor: pointer; font-size: 20px; font-family: arial; background-color: blue; border-radius: 5px;" name="login" value="Log In"></div><br>
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