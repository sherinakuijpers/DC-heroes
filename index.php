<?php 
include("includes/functions.php");                  //gebruik het bestand functions.php

$teams = getTeams();                                 //de functie getTeams word in de variabele $teams gezet

if(isset($_GET['teamId']))                           //als er een teamId is aangeklikt dan word dat teamId in de variabele $teamMembers gezet
{
    $teamMembers = getTeamMembers($_GET['teamId']);
}
else
{
    $teamMembers = getTeamMembers();                 //anders word de functie getTeamMembers in de variabele $teamMembers gezet
}

if(isset($_GET['teamMemberId']))                     //als er een teamMemberId is aangeklikt dan word dat teamMemberId in de variabele $teamCharacter gezet
{
    $teamCharacter = getTeamMember($_GET['teamMemberId']);
}
else
{ 
    $teamCharacter = getTeamMember();                //anders word de functie in deze variabele gezet
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
<?php include "includes/header.php"; ?>           <!-- voeg het bestand header.php toe -->
	
	<div id="main-container">

		<div id="main-left">
			<div class= "Teams">
				<h2>Teams</h2>
			</div>
            <ul>  
                <?php 
                    foreach($teams as $key => $team)
                    {
						?>   
						<div id= "teams">
						<div class= "teamimage">
							<img src="images/<?php echo $team['teamImage'];?>" height="85" width="65" alt="">  <!--laat alle foto's van de teams zien-->
						</div>         
                            <ul>
								<div class= "teamnames">          <!--laat alle teamnamen zien met bijbehorende Id. als er op word geklikt gaat hij naar het team-->
                                	<li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?teamId=<?php echo $team["teamID"]; ?>"><?php echo $team["teamName"];echo "(5)"; ?></a></li>
								</div>
							</ul>    
					</div>          
                        <?php
                    }
                ?>
            </ul>
		</div>

		<div id="main-center">
		<?php 
            foreach($teamMembers as $key => $teamMember)              
            {
			?>
			<div id="teammember">   
				<div class= "picture">                                           <!--laat alle images zien voor elke teamMember-->
					<img src="images/<?php echo $teamMember['characterImage'];?>" height="200" width="100" alt="">
				</div>
				<div class= "text">
					<div class= "name">
						<ul>                                                     <!--laat alle characternames zien met onzichtbare id-->
                        	<li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?teamMemberId=<?php echo $teamMember["characterId"]; ?>&teamId=<?php echo $teamMember["teamID"]; ?>"><?php echo $teamMember["characterName"];   ?></a></li>
                        </ul>
					</div>
					<div class= "description">
						<?php echo $teamMember["characterDescription"]; ?>    <!-- echo elke held omschrijving -->
					</div>  
				</div>
			</div>
			<?php
            }           
        ?>          
		</div>

		<div id="main-right">
			<div id= "characterright">
				<div class= "characterimage">                                    <!--laat de image zien van het team waar op geklikt is-->
					<img src="images/<?php echo $teamMember['teamImageR'];?>" height="500" width="220" alt="">
				</div>
				<div class= "character">
				<div class= "characterimageround">                               <!--laat de image zien van het character waar op geklikt is-->
					<img class= "img-circle" src="images/<?php echo $teamCharacter['characterImage'];?>" height="150" width="150" alt="">
				</div>
				<div class= "nameright">
					<?php echo $teamCharacter['characterName'];?>                <!--laat de naam van het character zien-->
				</div>
				<div class= "descriptionright">
					<?php echo $teamCharacter['characterDescription'];?>         <!--laat de beschrijving van het character zien-->
				</div>
				<div class= "propertiesright">
					<?php echo $teamCharacter['characterProperties'];?>          <!--laat de eigenschappen van het character zien-->
				</div>
				</div>
			</div>
		</div>
		<?php include "includes/footer.php"; ?>
</body>
</html>