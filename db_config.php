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

  //limit the number of rows returned
  $limit = 15;
  if (isset($_GET['page'])){
  $pn = $_GET['page'];
  }else{
  $pn =1;
  }
  $start_from = (($pn-1)*$limit);

  $query = "SELECT * FROM activity_log ORDER BY id DESC LIMIT $start_from, $limit";
  $stmt = $pdo->prepare($query);
  $stmt->execute();
  $row = $stmt->fetchAll(PDO::FETCH_OBJ);

  #Website Name
  $site_name = 'Bet3ways.com';


  $all_users = $pdo->prepare("SELECT * FROM db_user");
  $all_users->execute();

  //one user
  $one_user = $pdo->prepare('SELECT * FROM db_user WHERE id=1');
  $one_user->execute();
  $row_one = $one_user->fetch(PDO::FETCH_OBJ);

  // fetch api from db
  $get_api = $pdo->prepare("SELECT * FROM api");
  $get_api->execute();
  $row_api = $get_api->fetch(PDO::FETCH_OBJ);

  //fetch specific user info
  $get_user = $pdo->prepare('SELECT * FROM db_user WHERE username = ? AND password=?');

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


  //fetch articles
  $stmt_articles = $pdo->prepare("SELECT * FROM articles");
  $stmt_articles->execute();
  $row_articles = $stmt_articles->fetchAll(PDO::FETCH_OBJ);

  //select single article
  $single_article = $pdo->prepare("SELECT * FROM articles WHERE id=?");
?>