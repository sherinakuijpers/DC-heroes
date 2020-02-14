<?php
function DBconnect ()
{
    $servername = "localhost";                //naam van de server
    $username = "root";                       //username om in te loggen
    $password = "";                           //wachtwoord im in te loggen. standaard is deze leeg
    $dbname = "dc heroes";                    //naam van de databse

    $connection = new mysqli($servername, $username, $password, $dbname) or die ($connection->error); 
    //verbind met de database of anders geef een error als er geen connectie is

    return $connection;                       //als je de functie aanroept geeft hij de $connection terug
}

	function getTeams()
	{
		$connection = DBconnect();            //verbind met database

		$teams = array();                     //maak een array aan om de teams in op te slaan
                                              //maak een query om data uit de database te halen
		$getTeamsSQL = "SELECT * FROM `teams` ORDER BY `teamName` ASC";

		$resource = mysqli_query($connection, $getTeamsSQL) or die(mysqli_error($connection));

		while($row = mysqli_fetch_assoc($resource))            //zolang er resultaten zijn, zet deze in de array $teams
		{
			$teams[] = $row;
		}

		return $teams;                                        //als de functie word aangeroepen geeft hij de array $teams terug
	}

	function getCharacters()
	{
		$connection = DBconnect();                            //verbind met database

		$teams = array();                                     //maak een array aan om de teams in op te slaan

		$characters = array();
                                                              //maak een query om data uit de database te halen
		$getCharactersSQL = "SELECT * FROM `characters` ORDER BY `teamId` ASC";

		$resource = mysqli_query($connection, $getCharactersSQL) or die($mysqli_error($connection));

		while($row = mysqli_fetch_assoc($resource))
		{
			$characters[] = $row;                              //zolang er resultaten zijn, zet deze in de array $characters
		}

		return $characters;                                    //als de functie word aangeroepen geeft hij de array $characters terug
	}

function myDump($myVar)             
{
	echo "<pre>";
	var_dump($myVar);
	echo "</pre>";
}



?>