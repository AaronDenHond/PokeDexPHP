<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

//met accolades geen endif, in HTML wel nodig

//fetch poke data
$pokeRawData = 'https://pokeapi.co/api/v2/pokemon/';

$data = file_get_contents($pokeRawData);
$pokeData = json_decode($data);

//var dump to check
/* var_dump($pokeData); */

//variables we need with API data
$pokeName = $pokeData['name'];
$pokeID = $pokeData['id'];
$pokeImage = $pokeData['sprites']['front-default'];
var_dump($pokeName);
var_dump($pokeID);




 if (isset($_GET["id"])){
    $pokemonID = $_GET["id"];   
    //we slagen pokeID op
    
 }

 ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form method="get">
        Pokemon: <input type="text" name="id"><br>
      
        <input type="submit">
    </form>
    <br>
   
        NAME: <?php echo htmlspecialchars($_GET["id"]); ?>
        <br>
         
   
</body>


</html>