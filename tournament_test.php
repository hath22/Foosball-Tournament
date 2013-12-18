<?php
  /*     $match[$row['rundenid']][$match_number]["team_one"] = $teams[$row['teamid0']];
       $match[$row['rundenid']][$match_number]["team_two"] = $teams[$row['teamid1']];
        if($row['winnerid'] != 0) {
          $match[$row['rundenid']][$match_number]["winner"]   = $teams[$row['winnerid']];
        } else {
           $match[$row['rundenid']][$match_number]["winner"]   = "TBA";

	*/	   


//Test Data for Machines without the DB installed
		   

$tournament_array = array("Tournament1","Tourny2","Tourny3");
//var_dump($tournament_array);

$match = array(
			"0"=>array (
						"1"=> array(
									"team_one"=>"Team name 1/0",
									"team_two"=>"Team name 2/0",
									"winner"=>"Winner match 1/0"
									),
						"2"=> array(
									"team_one"=>"Team name 3/0",
									"team_two"=>"Team name 4/0",
									"winner"=>"Winner match 2/0"
									),
						"3"=> array(
									"team_one"=>"Team name 5/0",
									"team_two"=>"Team name 6/0",
									"winner"=>"Winner match 3/0"
									),   
						"4"=> array(
									"team_one"=>"Team name 7/0",
									"team_two"=>"Team name 8/0",
									"winner"=>"Winner match 4/0"
									),
						),
			"1"=>array (
						"1"=> array(
									"team_one"=>"Team name 1/1",
									"team_two"=>"Team name 2/1",
									"winner"=>"Winner match 1/1"
									),
						"2"=> array(
									"team_one"=>"Team name 3/1",
									"team_two"=>"Team name 4/1",
									"winner"=>"Winner match 2/1"
									),
						),
			"-1"=>array (
						"1"=> array(
									"team_one"=>"Team name 1/-1",
									"team_two"=>"Team name 2/-1",
									"winner"=>"Winner match 1/-1"
									),
						"2"=> array(
									"team_one"=>"Team name 3/-1",
									"team_two"=>"Team name 4/-1",
									"winner"=>"Winner match 2/-1"
									),
						),
			"-2"=>array (
						"1"=> array(
									"team_one"=>"Team name 1/-2",
									"team_two"=>"Team name 2/-2",
									"winner"=>"Winner match 1/-2"
									),
						),
			"2"=>array (
						"1"=> array(
									"team_one"=>"Team name 1/2",
									"team_two"=>"Team name 2/2",
									"winner"=>"Winner match 1/2"
									)
						),




			
			"-3"=>array (
						"1"=> array(
									"team_one"=>"Team name 1/-3",
									"team_two"=>"Team name 2/-3",
									"winner"=>"Winner match 1/-3"
									)
						),
			
			"3"=>array (
						"1"=> array(
									"team_one"=>"Team name 1/3",
									"team_two"=>"Team name 2/3",
									"winner"=>"Winner match 1/3"
									)
						)














			);
		   
		   
//echo var_dump($match);
   
		   
		   
		   ?>
