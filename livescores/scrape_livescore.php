<html>
   <head>
	<title>Livescores</title>
   </head>
   <body>
     <h1>Test page </h1>
     <?php
          // Assuming you installed from Composer:
        require "vendor/autoload.php";
        use PHPHtmlParser\Dom;
        include "settings.php";


        try {
            $conn = new PDO("mysql:host=$servername;dbname=$database_name", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";


            $sql = "SELECT current_id FROM $table_name_meta ORDER BY current_id DESC LIMIT 1;"  ;
            if($row = $conn->query($sql)->fetch()){
                $prev_id = intval($row["current_id"]);
            } else {
                //echo ("No current id");
                $prev_id = 0;
            }
            $next_id = $prev_id + 1   ;

            if($delete_prev_records){
                 $sql = "DELETE FROM $table_name WHERE current_id = $prev_id;";    //CLEAR STALE DATA;
                 $stmt = $conn->prepare($sql);
                 $stmt->execute();
            }


            $stmt = $conn->prepare("INSERT INTO $table_name (`country`, `league`, `minutes`,
                    `home_team_name`, `home_team_score`, `away_team_score`, `away_team_name`,
                    `current_id`, `rank`) VALUES (?,?,?,?,?,?,?,?,?);");


            $url = "http://www.flashscore.mobi/";
            $dom = new Dom;

            // print_r($dom);

            $dom->loadFromUrl($url);

            $top   = $dom ->getElementById("#score-data");
            $data   = $top -> innerHTML();


            $games = explode("<h4>", $data)   ;
            // echo "<br>";
            // print_r($gmaes);

            $rank = 1;
            foreach ($games as $game)
            {
                if($game == ""){
                    continue;
                }

                if($rank > 100){
                    break;
                }

                $game = "<h4>" . $game ;
                $dom->loadStr($game);

                $country_league = $dom->getElementsByTag("h4")[0] -> text();
                $arr_cl  = explode(":", $country_league);
                $country = ucfirst($arr_cl[0]);
                $league  = $arr_cl[1];


                $subgames = explode("<br />", $game) ;

                $inner_dom = new Dom;
                foreach ($subgames as $subgame){
                    if($subgame == ""){
                        continue;
                    }

                    //echo $subgame;

                    $inner_dom->loadStr("<div id = 'freedom'>" . $subgame . "</div>");

                    $minutes = $inner_dom->getElementsByTag("span")[0] -> text();

                    $names =  $inner_dom->getElementById("freedom") -> text();
                    $arr_na = explode("-", $names) ;
                    $home_team_name  = $arr_na[0];
                    $away_team_name  = $arr_na[1];

                    //echo $names . "<br>";

                    $scores =  $inner_dom->getElementsByTag("a")[0] -> text();
                    $arr_sc = explode(":", $scores)  ;
                    $home_team_score   = intval($arr_sc[0]);
                    $away_team_score   = intval($arr_sc[1]);

                    $stmt->bindParam(1, $country,         PDO::PARAM_STR);
                    $stmt->bindParam(2, $league,          PDO::PARAM_STR);
                    $stmt->bindParam(3, $minutes,         PDO::PARAM_STR);
                    $stmt->bindParam(4, $home_team_name,  PDO::PARAM_STR);
                    $stmt->bindParam(5, $home_team_score, PDO::PARAM_INT);
                    $stmt->bindParam(6, $away_team_score, PDO::PARAM_INT);
                    $stmt->bindParam(7, $away_team_name,  PDO::PARAM_STR);
                    $stmt->bindParam(8, $next_id,         PDO::PARAM_INT);
                    $stmt->bindParam(9, $rank,         PDO::PARAM_INT);

                    $stmt->execute();
                    $rank++;

                }
            }


            $date = date(DATE_RFC2822);
            echo $date . "<br>";
            $stmt = $conn->prepare("INSERT INTO $table_name_meta (date, current_id) VALUES (?,?);");
            $stmt->bindParam(1, $date, PDO::PARAM_STR);
            $stmt->bindParam(2, $next_id, PDO::PARAM_INT);
            $stmt->execute();

            echo("Ok");
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        $conn = null;
     ?>
   </body>
</html>