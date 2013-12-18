<?php

//$private_path = "httpd/private";
//require("$private_path/opendatabase.inc.php");

$db_host = "127.0.0.1";
$db_user = "root";
$db_pass = "snoopy1234";
$db = "bn";

$con = mysqli_connect($db_host, $db_user, $db_pass, $db);

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  } else {// echo "connection ok";
        }

//grab all the details from the resultlist table
if (isset($aTournament)) {
$query = "SELECT turnierid, rundenid, matchid, matchidnextlbrplus1, matchidprevwbrplus1, teamid0, teamid1, winnerid, eintragenderid FROM resultlist WHERE turnierid=$aTournament";
}
else {
$query = "";
}
$result1 = mysqli_query($con, $query);

//grab list of team names
$query2 = "SELECT id, teamname FROM teamlist";
$result2 = mysqli_query($con, $query2);
//echo var_dump($result2);

//Teams, will be in key value pairs. Key is team number, value is the name.
$teams = array();

while($row1 = mysqli_fetch_array($result2)) {
$teams[$row1['id']] = $row1['teamname']; //put team id and name in key value pair
}
//echo var_dump($teams);
///////////////////


//Create Tournament Number=>Tournament name array
$tournament_array = array();
$query3 = "SELECT id, turniername FROM turnierlist"; // ORDER BY id DESC LIMIT 6";
$result3 = mysqli_query($con, $query3);
while($row3 = mysqli_fetch_array($result3)) {
echo $row3;
$tournament_array[$row3['id']] = $row3['turniername'];
}
//End code to put values into key pairs


//set up the arrays
$match = array();

//Put data into matches array. Winnerid = 0 if match not played. Teamid 0 if no team.
$index = 0;
$match_number =0;
$current_bracket = 0;

//echo "hello";

while($row = mysqli_fetch_array($result1)) //fetch_array grabs key names also. fetch row doesn't
  {

//Increment the match number only in the same bracket otherwise start at 1
       if ( $current_bracket == $row['rundenid']) {
		$match_number++;
	}
	else { //Start match number at one and current bracket set to now
		$match_number = 1; 
		$current_bracket = $row['rundenid'];
	}

       $match[$row['rundenid']][$match_number]["team_one"] = $teams[$row['teamid0']];
       $match[$row['rundenid']][$match_number]["team_two"] = $teams[$row['teamid1']];
        if($row['winnerid'] != 0) {
	  $match[$row['rundenid']][$match_number]["winner"]   = $teams[$row['winnerid']];
	} else {
	   $match[$row['rundenid']][$match_number]["winner"]   = "TBA";
	}

        }

//var_dump($match);
?>


