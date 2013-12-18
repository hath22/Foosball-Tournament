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
$query = "SELECT turnierid, rundenid, matchid, matchidnextlbrplus1, matchidprevwbrplus1, teamid0, teamid1, winnerid, eintragenderid FROM resultlist";

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


//set up the arrays
$match = array();


//Put data into matches array. Winnerid = 0 if match not played. Teamid 0 if no team.
$index = 0;
$match_number =1;
$current_bracket = 1;

while($row = mysqli_fetch_array($result1)) //fetch_array grabs key names also. fetch row doesn't
  {
        $index = $index + 1;
        //echo $row['rundenid'] ;
        $match[$index]["bracket"] = $row['rundenid'];
        $match[$index]["team_one"] = $teams[$row['teamid0']];
        $match[$index]["team_two"] = $teams[$row['teamid1']];


        if( $match[$index]["bracket"] == $current_bracket) {
                $match_number = $match_number +1;
                }
        else {
                $match_number =1;
                $current_bracket = $match[$index]["bracket"];
                }

        $match[$index]["match_number"] = $match_number;


        if($row['winnerid'] != 0) {
        $match["$index"]["winner"] = $teams[$row['winnerid']];
        } else {
        $match["$index"]["winner"] = "TBA";
        }
//var_dump($row);




        }


$total_matches = $index;
//Grab some variables athat are needed
//Find how many teams will be in the first bracket. Once aquired fit it into the DKO/KO bracket image
//i.e. for 8, 16, 32, 64 teams. Put this into an if statement to tell what to render.


$matches_in_bracket_0 = 1;
while($match[$matches_in_bracket_0]["bracket"] == 0) {
        $matches_in_bracket_0++;
        }
$matches_in_bracket_0--; //Remove one as the while loop adds extra
echo "<br>Matches in Bracket 0 " . $matches_in_bracket_0 . "<br>";

echo var_dump($match);


//Put in the HTML header
//LEIGH STUFF HERE
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
//END LEIGH STUFF HERE

<?php

if($matches_in_bracket <= 4 )
{
//Render image for 8 teams. Add in the different numbers
echo "<br> 8 Teams Bracket";
echo "<br> Number of Teams" . $matches_in_bracket_0;
?>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->



<!-- 8 Teams -->
<?php $i =1; ?>
        <div class="firstround match1"><P><?php echo $match[$i]["team_one"]; ?></p></div>
         <div class="firstround match2"><P><?php echo $match[$i]["team_two"]; ?></p></div>
<?php $i= $i+1; ?>
          <div class="firstround match3"><P><?php echo $match[$i]["team_one"]; ?></p></div>
           <div class="firstround match4"><P><?php echo $match[$i]["team_two"]; ?></p></div>
<?php //Check to see if Match is in this bracket
	$i = $i+1; 
		if ($match[$i]["bracket"] == 0) { 
           		echo "<div class=\"firstround match5\"><P>" . $match[$i]["team_one"] . "</p></div>";
		   	echo "<div class=\"firstround match6\"><P>" . $match[$i]["team_two"] . "</p></div>";
	//Check to see if Match number is in this bracket 
		$i = $i+1;
			if ($match[$i]["bracket"] == 0) {
				echo "<div class=\"firstround match7\"><P>" . $match[$i]["team_one"] . "</p></div>";
               			echo "<div class=\"firstround match8\"><P>" . $match[$i]["team_two"]  . "</p></div>";
		        $i = $i+1; //add one more to the end just to increment the matches	
			} 
	  }
	  ?>



<!-- Winners 2nd round -->

        <div class="secondround match1"><P><?php echo $match[$i]["team_one"]; ?></p></div>
         <div class="secondround match2"><P><?php echo $match[$i]["team_two"]; ?></p></div>

<?php //Check to see if more matches are in this bracket
	$i = $i+1; //go to the next match	
	if($match[$i]["bracket"] == 1) { ?>
          <div class="secondround match3"><P><?php echo $match[$i]["team_one"]; ?></p></div>
           <div class="secondround match4"><P><?php echo $match[$i]["team_two"]; ?></p></div>
		<?php $i++;	} ?>


<!-- Losers brackets -->

        <div class="losers-secondround match1"><P>Jiri / Zsolte</p></div>
         <div class="losers-secondround match2"><P>Anya / Loren</p></div>


          <div class="losers-secondround match3"><P>Hamid / Mohammed</p></div>
           <div class="losers-secondround match4"><P>Kenny / Steve</p></div>


        <div class="losers-thirdround match1"><P>Jiri / Zsolte</p></div>
        <div class="losers-thirdround match2 secondlife"><P>Vittoria / Vittorio</p></div>
        <div class="losers-thirdround match3"><P>Kenny / Steve</p></div>
        <div class="losers-thirdround match4 secondlife"><P>Luis / Hannah</p></div>



<!-- Winners 3rd round -->
        <div class="thirdround match1"><P>Leigh / Anthony</p></div>
         <div class="thirdround match2"><P>Ash / Ash</p></div>

<!-- Winners 4th round -->


        <div class="forthround match1"><P>Leigh / Anthony</p></div>
         <div class="forthround match2 secondlife"><P>Jiri / Zsolte</p></div>


<!-- Winner -->


        <div class="fithround match1"><P>Leigh / Anthony</p></div>


<!-- Losers brackets v2 -->


          <div class="losers-forthround match1"><P>Jiri / Zsolte</p></div>
          <div class="losers-forthround match2"><P>Luis / Hannah</p></div>

<!-- Losers brackets v3 -->


          <div class="losers-fithround match1"><P>Jiri / Zsolte</p></div>
          <div class="losers-fithround match2 secondlife"><P>Ash / Ash</p></div>

<!-- Losers brackets v3 -->


          <div class="losers-sixthround match1 secondlife"><P>Luis / Hannah</p></div>




        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

    </body>
<?php
}

elseif($matches_in_bracket <= 8 )
{
//Render image for 16 teams. Add in the different numbers
echo "<br>16 Teams";
}

elseif($matches_in_bracket <= 16 )
{
//Render image for 32 teams. Add in the different numbers
echo "<br>32 Teams";
}

else
{
//Render image for 64 teams. Add in the different numbers
echo "<br>64 Teams";
}








?>

