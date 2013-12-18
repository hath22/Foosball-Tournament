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
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

<?php //ANTHONY's EXTRA BITS HERE
$aTournament = $_GET['formTournament']; //Grab this so that the sql query can use it to get tournament info
include 'tournament_test.php'; //This adds the data for the php tags using $match, method to reference array is bellow
//include 'tournament_structure.php'; //This uses the Database to populate $match. Uncomment this for db

//var_dump($match);
?>


<form action="" method="get">
<label for='formTournament'>Select Tournament:</label><br>
	<select  name="formTournament">
		<?php  
		  foreach($tournament_array as $Tournament_id=>$name) { ?>
                    <option value="<?php echo $Tournament_id; ?>"><?php echo $name; ?></option>
	<?php	}
		?>
        </select>
     <input type="submit" name="Submit" value="Submit" />
</form>

<?php


if($_SERVER['REQUEST_METHOD'] != 'GET') {
	exit();
}
 
if(isset($_GET['formTournament'])) 
{
  $aTournament = $_GET['formTournament'];
   
  if(!isset($aTournament)) 
  {
    echo("<p>Please Select a tournament</p>\n");
	exit();
  } 
  else
  {
   //echo "You selected" . " " . "$aTournament";   
  }
}else
	{ echo("<p>Please Select a tournament</p>\n");
        exit();}
 

///////TEST CODE ENDING HERE
?>




<?php /*
Variable methodolody

<?php echo $match[<bracket_number>][<match number>]["team_one"]; ?>
<?php echo $match[<bracket_number>][<match number>]["team_two"]; ?>
<?php echo $match[<bracket_number>][<match number>]["winner"]; ?>

*/
//END ANTHONY EXTRA BITS
?>



<!-- 8 Teams -->

        <div class="firstround match1"><P><?php echo $match[0][1]["team_one"]; ?></p></div>
         <div class="firstround match2"><P><?php echo $match[0][1]["team_two"]; ?></p></div>
          <div class="firstround match3"><P><?php echo $match[0][2]["team_one"]; ?></p></div>
           <div class="firstround match4"><P><?php echo $match[0][2]["team_two"]; ?></p></div>
            <div class="firstround match5"><P><?php echo $match[0][3]["team_one"]; ?></p></div>
             <div class="firstround  match6"><P><?php echo $match[0][3]["team_two"]; ?></p></div>
              <div class="firstround match7"><P><?php echo $match[0][4]["team_one"]; ?></p></div>
               <div class="firstround match8"><P><?php echo $match[0][4]["team_two"]; ?></p></div>

<!-- Winners 2nd round -->

        <div class="secondround match1"><P><?php echo $match[1][1]["team_one"]; ?></p></div>
         <div class="secondround match2"><P><?php echo $match[1][1]["team_two"]; ?></p></div>
          <div class="secondround match3"><P><?php echo $match[1][2]["team_one"]; ?></p></div>
           <div class="secondround match4"><P><?php echo $match[1][2]["team_two"]; ?></p></div>

<!-- Winners 3rd round -->


        <div class="thirdround match1"><P><?php echo $match[2][1]["team_one"]; ?></p></div>
         <div class="thirdround match2"><P><?php echo $match[2][1]["team_two"]; ?></p></div>


<!-- Winners 4th round -->


        <div class="forthround match1"><P><?php echo $match[3][1]["team_one"]; ?></p></div>
         <div class="forthround match2 secondlife"><P><?php echo $match[3][1]["team_two"]; ?></p></div>


<!-- Winner -->


        <div class="fithround match1"><P><?php echo $match[3][1]["winner"]; ?></p></div>

<!-- Losers brackets -->

        <div class="losers-secondround match1"><P><?php echo $match[-1][1]["team_one"]; ?></p></div>
         <div class="losers-secondround match2"><P><?php echo $match[-1][1]["team_two"]; ?></p></div>
          <div class="losers-secondround match3"><P><?php echo $match[-1][2]["team_one"]; ?></p></div>
           <div class="losers-secondround match4"><P><?php echo $match[-1][2]["team_two"]; ?></p></div>


        <div class="losers-thirdround match1"><P><?php echo $match[-2][1]["team_one"]; ?></p></div>
        <div class="losers-thirdround match2 secondlife"><P><?php echo $match[-2][1]["team_two"]; ?></p></div>
        <div class="losers-thirdround match3"><P><?php echo $match[-2][2]["team_one"]; ?></p></div>
        <div class="losers-thirdround match4 secondlife"><P><?php echo $match[-2][2]["team_two"]; ?></p></div>

<!-- Losers brackets v2 -->


          <div class="losers-forthround match1"><P><?php echo $match[-3][1]["team_one"]; ?></p></div>
          <div class="losers-forthround match2"><P><?php echo $match[-3][1]["team_two"]; ?></p></div>

<!-- Losers brackets v3 -->


          <div class="losers-fithround match1"><P><?php echo $match[-3][1]["winner"]; ?></p></div>


<!HEY LEIGH: NOT sure if the next two lines are needed??? -->

          <div class="losers-fithround match2 secondlife"><P>Ash / Ash</p></div>

<!-- Losers brackets v3 -->


          <div class="losers-sixthround match1 secondlife"><P>Luis / Hannah</p></div>




        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

    </body>
</html>
