<?php

$dbname = 'betting_tips';
$host = 'localhost';
$dbuser = 'root';
$pass = '';


try {
    $dsn = 'mysql: host='.$host.';dbname='.$dbname;
    $pdo = new PDO($dsn, $dbuser, $pass);
    // $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);

    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
}catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage()."<br>";
  }

  $all_users = $pdo->prepare("SELECT * FROM db_user");
  $all_users->execute();

  $get_api = $pdo->prepare("SELECT * FROM api");
  $get_api->execute();
  $row_api = $get_api->fetch(PDO::FETCH_OBJ);

  //fetch specific user info
  $get_user = $pdo->prepare('SELECT * FROM db_user WHERE username = ? AND password=?');

  //activity log
  $get_activity = $pdo->prepare("SELECT * FROM activity_log ORDER BY `time` DESC");
  $get_activity->execute();

  //LIMIT logs for notifications
  $notif_activity = $pdo->prepare("SELECT * FROM activity_log WHERE (`activity` != 'Login' OR `activity` != 'Logout') ORDER BY `time` DESC LIMIT 5");
  $notif_activity->execute();
  $row_notif = $notif_activity->fetchAll(PDO::FETCH_OBJ);

  //fetchDB Function
  function fetchDB($table, $col, $value){
    $query = $GLOBALS['pdo']->prepare("SELECT * FROM $table WHERE $col = ?");
    $query->execute([$value]);
    $row = $query->fetch(PDO::FETCH_OBJ);
    return $row;
  }
?>