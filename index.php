<?php
	include("includes/functions.php");                          //inlcude functions from includes/functions.php
	
	$teams = getTeams();                                        //stop de functie in de variabele $teams

	$characters = getCharacters();                              //stop de functie in de variabele $characters

	if(isset($_GET['teamId']))
	{
    	$characters = getCharacters($_GET['teamId']);
	}
	else
	{	
    	$characters = getCharacters();
	}

	if(isset($_GET['characterId']))
	{
    	$character = getCharacters($_GET['characterId']);
	}
	else
	{
    	$character = getCharacters();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="description" content="DC Heroes">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>DC Heroes</title>
</head>
<body>
	<?php include "includes/header.php"; ?>                         <!-- voeg het bestand header.php toe -->
	<div id="main-container">
		<div id="main-left">
			
			<nav id= "navigation">
				<ul>
					<?php
					foreach($teams as $key => $team)                //voor elke $team in de tabel $teams..
					{ 
						?>
						<div class= "navblocks">
						<img src="img/<?php echo $team['teamImage'];?>" height="100" width="75" alt="">
						<div class= "teamname">                     <!-- echo de naam van elk team --> 
							 <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?teamId=<?php echo $team["teamId"]; ?>"><?php echo $team["teamName"]; ?></a></li>     
						</div>
					</div>
						<?php
					}
					?>
				</ul>
			</nav>
		</div>

		<div id="main-center">
		
			<li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?characterId=<?php echo $teamCharacter["characterId"]; ?>&teamId=<?php echo $teamCharacter["teamId"]; ?>"></a></li>

		
		
		
		<div class= "characterbox">
			<?php
				foreach ($characters as $key => $character)                 //voor elke $character in de tabel $characters..
				{
					?>
					<div class= "characters">
					<div class= "charactername">
						<?php echo $character["characterName"]; ?>          <!-- echo elke held naam -->
					</div>
					<div class= "characterimage">                           <!-- echo elke held image -->
                    	<img src= "img/<?php echo $character['characterImage'];?>" height= "280" width= "150">
					</div>    
					<div class= "characterdescription">
						<?php echo $character["characterDescription"]; ?>    <!-- echo elke held omschrijving -->
					</div>    
					<div class= "charactermoreinfo">
						<input type= "submit" name= "more info" value= "More info">     <!-- button met meer info -->
					</div>

				</div>
					<?php
				}
			
			?>
			</div>
		</div>
			

		<div id="main-right">
			Right container
			<?php   
				echo $character['characterName'];         
                echo "<br >";
				echo $character['characterDescription'];
			?>
			<div id="review-form">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <textarea name="reviewtext" id="" cols="30" rows="10"></textarea>
                        <input type="hidden" name="bid" value="<?php echo $character['characterID'];?>">
                    </form>
                </div>
		</div>
		

	</div>
	<?php include "includes/footer.php"; ?>               <!-- voeg het bestand footer.php toe -->
</body>
</html>