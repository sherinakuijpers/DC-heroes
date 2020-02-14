<?php
	include("includes/functions.php");                          //inlcude functions from includes/functions.php
	
	$teams = getTeams();                                        //stop de functie in de variabele $teams

	$characters = getCharacters();                              //stop de functie in de variabele $characters
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
			<h3>Teams</h3>
			<nav id= "navigation">
				<ul>
					<?php
					foreach($teams as $key => $team)                //voor elke $team in de tabel $teams..
					{ 
						?>
						<div class= "teamname">
							<li><?php echo $team["teamName"] ?></li>       <!-- echo de naam van elk team -->
						</div>
						<?php
					}
					?>
				</ul>
			</nav>
		</div>

		<div id="main-center">
			<?php
				foreach ($characters as $key => $character)                 //voor elke $character in de tabel $characters..
				{
					?>
					<div class= "charactername">
						<?php echo $character["characterName"]; ?>          <!-- echo elke held naam -->
					</div>
					<div class= "characterimage">                           <!-- echo elke held image -->
                    <img src= "../img/<?php echo $character['characterImage'];?>" height= "200" width= "100">
					</div>    
					<div class= "characterdescription">
						<?php echo $character["characterDescription"]; ?>    <!-- echo elke held omschrijving -->
					</div>    
					<div class= "charactermoreinfo">
						<input type= "submit" name= "more info" value= "More info">     <!-- button met meer info -->
					</div>
					<?php
				}
			?>
		</div>

		<div id="main-right">
			Right container
		</div>

	</div>
	<?php include "includes/footer.php"; ?>               <!-- voeg het bestand footer.php toe -->
</body>
</html>