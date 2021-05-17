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

// dont use DOMmanipulation (yet), just echo/print

/* if (isset($_GET["id"])){
    $pokemonID = $_GET["id"];   
    //we slagen pokeID op
    
 }  */

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="column">
                <p><?php echo ($pokeName); ?></p>
                <p><?php echo ($pokeID); ?></p>
            </div>

            <div class="column">
                <p><?php echo ($pokeImage); ?></p>
                <p><?php echo ($pokeMove1); ?></p>
                <p><?php echo ($pokeMove2); ?></p>
                <p><?php echo ($pokeMove3); ?></p>
                <p><?php echo ($pokeMove4); ?></p>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <form method="get">
                    Pokemon NAME/ID: <input type="text" name="id">
                    <input type="submit">
                </form>
            </div>

            <div class="column">

            </div>
        </div>
    </div>





    <br>



    </div>

</body>


</html>