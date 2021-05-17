<?php

//error reporting, do it every project
error_reporting(E_ALL);
ini_set("display_errors", 1);

//met accolades geen endif, in HTML wel nodig
 
//USE var_dump() A LOT TO CHECK ERRORS AND CONTENTS OF VARS!!!

//fetch poke data
$pokeRawData = 'https://pokeapi.co/api/v2/pokemon/1';

$data = file_get_contents($pokeRawData);
//decode the data to JSON, second parameter needs to be true to make it return as array
$pokeData = json_decode($data, true);



//variables we need with API data
$pokeName = $pokeData['name'];
$pokeID = $pokeData['id'];
$pokeImage = $pokeData['sprites']['front_default'];

$pokeMove1 = $pokeData['moves'][0]['move']['name'];
$pokeMove2 = $pokeData['moves'][1]['move']['name'];
$pokeMove3 = $pokeData['moves'][2]['move']['name'];
$pokeMove4 = $pokeData['moves'][3]['move']['name'];


/* 
 if (isset($_GET["id"])){
    $pokemonID = $_GET["id"];   
    //we slagen pokeID op
    
 } */

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