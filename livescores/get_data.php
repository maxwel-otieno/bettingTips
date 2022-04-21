<?php
            //display livescores
            include "settings.php";

            // callable type hint may be "closure" type hint instead, depending on php version
            function array_group_by(array $arr, callable $key_selector) {
                  $result = array();
                  foreach ($arr as $i) {
                    $key = call_user_func($key_selector, $i);
                    $result[$key][] = $i;
                  }
                  return $result;
            }


            $livescore = array();
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$database_name", $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //echo "Connected successfully";

                $sql    = "SELECT current_id FROM $table_name_meta ORDER BY current_id
                DESC LIMIT 1;"  ;

                if($row = $conn->query($sql)->fetch()){
                    $current_id = $row["current_id"] ;   //unless no prior scrape
                } else {
                    $current_id = 1;
                }

                $query =  htmlspecialchars($_GET["filter"]) ;
                $live  =  htmlspecialchars($_GET["live"]) ;

                $data_sql = "SELECT * FROM $table_name WHERE current_id=$current_id";
                if($live == "true") {
                    $data_sql = $data_sql . " AND (NOT `minutes` LIKE '%:%')";
                }
                if($query != "") {
                    $data_sql = $data_sql . " AND (`country` LIKE '%$query%' OR `league` LIKE '%$query%')";
                }

                $data_sql = $data_sql . " ORDER BY `rank` ASC LIMIT $no_rows;";
                // echo $data_sql."<br><br>";

                $result = $conn->query($data_sql);
                // output data of each row
                while($row = $result->fetch()) {
                    $output =
                      array($row["country"]. " " . $row["league"],
                      trim($row["minutes"]),
                      trim($row["home_team_name"]), trim($row["home_team_score"]) ,
                      trim($row["away_team_score"]) , trim($row["away_team_name"]));
                    //echo ($output);
                    array_push($livescore, $output);
                }

            } catch(PDOException $e) {
                  echo "Connection failed: " . $e->getMessage();
            }

            $grouped = array_group_by($livescore, function($i){  return $i[0]; });
            echo json_encode($grouped);
            $conn = null;
     ?>