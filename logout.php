<?php 
    session_start();

    if (isset($_SESSION['username'])){
        session_destroy();
        // echo $_SESSION['username'];
        unset($_SESSION['username']);
        header('location: index.php');
    }

    // echo "<br>".$_SESSION['username'];

    ?>