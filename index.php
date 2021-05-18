<?php

//error reporting, do it every project
error_reporting(E_ALL);
ini_set("display_errors", 1);

//met accolades geen endif, in HTML wel nodig

//USE var_dump() A LOT TO CHECK ERRORS AND CONTENTS OF VARS!!!
$pokeUserInputID = 1;
$pokeUserInputName = 1;
//moet 1 zijn of warning on load with no user input
if (isset($_GET["id"])) {
    $pokeUserInputID = $_GET["id"];
}

if (isset($_GET["name"])) {
    $pokeUserInputName = strtolower($_GET["name"]);
    //strtolower zodat geen warning als hoofdletters input

}


//fetch poke data, first fetch
$pokeRawData = 'https://pokeapi.co/api/v2/pokemon/' .  $pokeUserInputID . $pokeUserInputName;
//string concat in php with .   AND we want to change the link on submit by concatting userinputID


$data = file_get_contents($pokeRawData);

//decode the data to JSON, second parameter needs to be true to make it return as array
$pokeData = json_decode($data, true);

//fetch evolution data, 2nd fetch
$pokeEvoRawData = 'https://pokeapi.co/api/v2/pokemon-species/' . $pokeUserInputID . $pokeUserInputName;
$evoRawData = file_get_contents($pokeEvoRawData);
$evoData = json_decode($evoRawData, true);


if ($evoData['evolves_from_species'] === null) {
    echo "This pokemon has no previous evolution";
} else {
    echo "The previous evolution is" . " " . ($evoData['evolves_from_species']['name']);
}

//variables we need with API data
$pokeName = $pokeData['name'];
$pokeID = $pokeData['id'];
$pokeImage = $pokeData['sprites']['front_default'];

$pokeMove1 = $pokeData['moves'][0]['move']['name'];
$pokeMove2 = $pokeData['moves'][1]['move']['name'];
$pokeMove3 = $pokeData['moves'][2]['move']['name'];
$pokeMove4 = $pokeData['moves'][3]['move']['name'];



// dont use DOMmanipulation (yet), just echo/print




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
<!-- Background image -->
   
    <div class="container bg-danger">
    
        <div class="row text-center">
            <div class="column">
                <h1 class="py-5">Poke-Dex!</h2>
                <h2><?php echo ($pokeName); ?></h2>
                <h2><?php echo ($pokeID); ?></h2>
            </div>

            <div class="column">
                <div class="image">
                    <?php echo "<img src='" . $pokeImage . "'>"; ?>
                </div>
                <li><?php echo ($pokeMove1); ?></li>
                <li><?php echo ($pokeMove2); ?></li>
                <li><?php echo ($pokeMove3); ?></li>
                <li><?php echo ($pokeMove4); ?></li>

            </div>
        </div>
        <div class="row py-3 text-center">
            <div class="column">
                <form method="get">
                    Pokemon ID: <input type="text" name="id">
                    Pokemon Name: <input type="text" name="name">
                    <input type="submit">
                    <!--  submit refreshes page  -->
                </form>
            </div>

        </div>
    </div>



</body>


</html>