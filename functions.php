<?php 
function dBConnect()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "dc heroes";
    //variabellen voor de database connectie
    $connection = mysqli_connect($servername,$username,$password,$dbName) or die(mysqli_error($connection));
    //nieuw object om de connectie met de database te maken
    return $connection;
}

function getTeams()                                        
{
    $connection = dBConnect();                                            //verbinding met database
    
    $teams = array();                                                     // definieer een lege array om de teams in op te slaan

    $getTeamsSQL = "SELECT * FROM `teams` ORDER BY `teamName` ASC";       //sql om de teamnaam uit de tabel teams te halen

    $resource = mysqli_query($connection, $getTeamsSQL) or die (mysqli_error($connection));    //voer de query uit, als dat niet lukt geef een error

    while($row = mysqli_fetch_assoc($resource))                           //zolang er resultaten zijn, zet deze in de array teams
    {
        $teams[] = $row;
    }

    return $teams;                                                        //definieer de query om de gegevens op te roepen uit de database

}

function getTeamMembers($teamId = false)                             
{
    $connection = dBConnect();                                            //verbinding met database
    
    $teamMembers = array();                                               // definieer een lege array om de teams in op te slaan

    $getTeamMembersSQL = "SELECT * FROM `characters`";                    //sql om alle informatie uit de database characters te halen

    if($teamId)                                                           //als er een teamIs is ingevuld..
    {
        $getTeamMembersSQL .= " WHERE teamID = $teamId ";                 //haal uit database alles met dat teamId waar op geklikt is
    }
    $getTeamMembersSQL .= " ORDER BY `characterName` ASC";                //zet de character namen op volgorde

    $resource = mysqli_query($connection, $getTeamMembersSQL) or die (mysqli_error($connection));    //voer de query uit, als dat niet lukt geef een error

    while($row = mysqli_fetch_assoc($resource))                           //zolang er resultaten zijn..
    {
        $teamMembers[] = $row;                                            //zet deze in een array
    }

    return $teamMembers;                                                  //definieer de query om de gegevens op te roepen uit de database

}

function getTeamMember($teamMemberId = false, $teamId = true )
{
    $connection = dBConnect();                                             //verbinding met database
    
    $teamMember = array();                                                 //definieer een lege array om de teams in op te slaan

    if($teamMemberId)                                                      //als er een teamMemberId is bepaald pak deze query
    {
        $getTeamMemberSQL = "SELECT * FROM `characters` JOIN teams ON characters.teamID = teams.teamID WHERE characters.characterId =  '$teamMemberId';";
    }
    else                                                                   //anders pak deze query
    {
        $getTeamMemberSQL = "SELECT * FROM characters JOIN teams ON characters.teamID = teams.teamID WHERE teams.teamID = '$teamId' ORDER BY RAND() LIMIT 1";  
    }

    $resource = mysqli_query($connection, $getTeamMemberSQL) or die (mysqli_error($connection));     //voer de query uit, als dat niet lukt geef een error

    $teamMember = mysqli_fetch_assoc($resource);                            //zet de resultaten in de variabele teamMember

    return $teamMember;                                                     //definieer de query om de gegevens op te roepen uit de database
}

function myDump($myVar)                                                     //functie hoe de resultaten moeten komen te staan
{
    echo "<pre>";
    var_dump($myVar);
    echo "</pre>";
}
?>




