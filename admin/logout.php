<?php
include '../db_config.php';
    session_start();
    if(isset($_SESSION['username'])){
        $name = $_SESSION['username'];
        $userID = fetchDB('db_user', 'username', $name)->id;
        // $name = fetchDB('db_user', 'username', $_SESSION['username'])->username;

        // echo $userID."<br>";
        // echo $name;
        $log_query = $pdo->prepare("INSERT INTO activity_log (`userID`, `time`, `activity`, `activity_desc`) VALUES('$userID', NOW(), 'Logout', '$name logged out successfully')");
        $log_query->execute();

        session_destroy();
        header('location: ../login.php');
    }