<?php
    include 'db_config.php';

    $Err = "";
           

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
    
    <!-- logo -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/ball_2.png">

    <title>Bet3ways.com | Login</title>

    <style>
        #b4_form{
            margin-top: 4%;
        }
        #form_login{
            width: 60%; background-color: white;
        }
        .pad-login{
            padding: 10px 20px;
        }

        @media only screen and (max-width: 567px) {
            #b4_form{
                margin-top: 0;
            }
            #form_login{
                width: 90%;
            }
            .pad-login{
                padding: 0;
            }
        }
    </style>
</head>
<body>
    <div class="container text-black">
        <p id="yangu"></p>
        <div id="b4_form" class="row d-flex justify-content-center align-items-center">
            <div id="form_login" class="shadow p-3 mb-3 bg-white rounded">            
                <div class="d-flex justify-content-center pt-2"><h1 style="color: blue">Sign Up</h1></div>
                <div class="container" class="pad-login">
                    <?php
                        if(!empty($Err)){
                            echo $Err;
                        }
                    ?>
                    <form action="./signup.php" method="post">
                        <?php
                            // if(!empty($Err)){
                            //     echo $Err;
                            // }
                        ?>
                            <label style="color: black; font-size: 14px;" for="username">Username</label>
                            <input class="form-control" type="text" placeholder="E.g. Admin12" name="username" style="padding: 5px 5px; font-size: 15px;" required><br>
                            <label style="color: black; font-size: 14px;" for="mobile" min="10" max="12">Mobile Number</label>
                            <input class="form-control" type="text" placeholder="E.g. 0712345678" name="mobile" style="padding: 5px 5px; font-size: 15px;" required><br>
                            <label style="color: black; font-size: 14px;" for="email">Email Address</label>
                            <input class="form-control" type="email" placeholder="E.g. JohnDoe@test.com" name="email" style="padding: 5px 5px; font-size: 15px;" required><br>
                            <label style="color: black; font-size: 14px;" for="passord">Password</label>
                            <input class="form-control" type="password" placeholder="Choose a strong password" name="password" style="padding: 5px 5px; font-size: 15px;" required><br>
                            <label style="color: black; font-size: 14px;" for="conf_password">Confirm Password</label>
                            <input class="form-control" type="password" placeholder="Confirm your password" name="conf_password" style="padding: 5px 5px; font-size: 15px;" required><br>
                            <small style="color: black; font-size: 14px;">Already have an account? <a style="color: blue;" href="login.php">Login</a></small><br><br>
                            <input type="checkbox">&nbsp;&nbsp;<small style="color: black;">By signing up you agree to the set terms and conditions</small><br>
                            <input type="submit" class="mt-5" style="padding: 6px 30px; color: white; cursor: pointer; font-size: 20px; font-family: arial; background-color: blue; border-radius: 5px; border: none;" name="btn_sub" value="Sign Up"><br>
                            <!-- <input type="submit" value="Sign Up" class="btn btn-sm align-self-center" name="btn_sub" style="background-color: #0069D9; font-size: 10px; border: none;"><br> -->
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