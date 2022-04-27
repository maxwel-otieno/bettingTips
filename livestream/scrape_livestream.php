<html>
   <head>
	<title>Livestreams</title>
   </head>
   <body>
     <h1>Scrapping Livestreams.</h1>
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

            $stmt_del = $conn->prepare("DELETE FROM $table_name WHERE 1;");
            $stmt_del->execute();


            $stmt = $conn->prepare("INSERT INTO $table_name (date,league, team, link, time) VALUES (?,?,?,?, ?);");
            $date  = date_create()->format('Y-m-d H:i:s');

            $url = "https://amzfootball.com/";
            $dom = new Dom;
            $dom->loadFromUrl($url);

            $atime = $dom -> find("p.info_live_league > span");
            if(count($atime) > 0){
                $time = explode("-", $atime[0] -> text)[0];
            } else {
                $time = "-";
            }
            $streams = $dom -> find("div.list_hot_match_football");
            foreach ($streams as $stream) {
                $league = $stream -> find("p.luegea_home")[0];
                //echo $league;

                $league_name = $league ->find("a")[0] -> text;

                $link   = $league -> find("a")[0] -> getAttribute("href");
                $team   = $stream -> find("p.club_name")[0] -> text;

                $stmt->bindParam(1, $date,              PDO::PARAM_STR);
                $stmt->bindParam(2, $league_name,       PDO::PARAM_STR);
                $stmt->bindParam(3, $team,              PDO::PARAM_STR);
                $stmt->bindParam(4, $link,              PDO::PARAM_STR);
                $stmt->bindParam(5, $time,              PDO::PARAM_STR);

                $stmt->execute();

            }

            //echo $dom -> innerHTML;  ;
            $streams = $dom->find('div.matches-lst-tr');
            #$date = date(DATE_RFC2822);

            foreach ($streams as $stream)
            {
                $league_name = $stream -> find("p.league-name")[0] -> text;
                $link        = $stream -> find("a.mlt-time")[0] -> getAttribute("href");
                $time        = $stream -> find("p.mltt-up")[0] -> text;

                $home = $stream -> find("div.mlti-home")[0]   ;
                $home_name = $home -> find("span")[0] -> text;
                $away = $stream -> find("div.mlti-away")[0]  ;
                $away_name = $away -> find("span")[0] -> text;
                $team = $home_name . " - " . $away_name;


                $stmt->bindParam(1, $date,              PDO::PARAM_STR);
                $stmt->bindParam(2, $league_name,       PDO::PARAM_STR);
                $stmt->bindParam(3, $team,              PDO::PARAM_STR);
                $stmt->bindParam(4, $link,              PDO::PARAM_STR);
                $stmt->bindParam(5, $time,              PDO::PARAM_STR);

                $stmt->execute();

            }



            echo("Ok");
        } catch(PDOException $e) {
           // echo "Connection failed: " . $e->getMessage();
        }
        $conn = null;
     ?>
   </body>
</html>