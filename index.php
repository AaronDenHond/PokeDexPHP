<?php

declare(strict_types=1);
//error reporting, do it every project
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

//met accolades geen endif, in HTML wel nodig

//USE var_dump() A LOT TO CHECK ERRORS AND CONTENTS OF VARS!!!
$pokeUserInputID = 1;
$pokeUserInputName = 1;

//moet 1 zijn of warning on load with no user input
if (isset($_GET["id"])) {
    $pokeUserInputID = $_GET["id"];
} else {
    $pokeUserInputID = 1;
}

if (isset($_GET["name"])) {
    $pokeUserInputName = strtolower($_GET["name"]);
    //strtolower zodat geen warning als hoofdletters input
} else {
    $pokeUserInputID = 1;
}

//fetch poke data, first fetch
//fetch evolution data, 2nd fetch





$pokeRawData = 'https://pokeapi.co/api/v2/pokemon/' .  $pokeUserInputID . $pokeUserInputName;
$pokeData = getPokeData($pokeRawData);

$pokeEvoRawData = 'https://pokeapi.co/api/v2/pokemon-species/' . $pokeUserInputID . $pokeUserInputName;
$evoData = getPokeData($pokeEvoRawData);



//string concat in php with .   AND we want to change the link on submit by concatting userinputID


//decode the data to JSON, second parameter needs to be true to make it return as array




//variables we need with API data
$pokeName = $pokeData['name'];
$pokeID = $pokeData['id'];
$pokeImage = $pokeData['sprites']['front_default'];
$pokeMove1 = '';
$pokeMove2 = '';
$pokeMove3 = '';
$pokeMove4 = '';
//isset checks if smth is in var, if so it will execute lines 63-65, if not it will do the else and not count(gave fatal error before)
if (isset($pokeData['moves'])) {
    if (count($pokeData['moves']) < 4) {
        $pokeMove1 = $pokeData['moves'][0]['move']['name'];
    } else {
        $pokeMove1 = $pokeData['moves'][0]['move']['name'];
        $pokeMove2 = $pokeData['moves'][1]['move']['name'];
        $pokeMove3 = $pokeData['moves'][2]['move']['name'];
        $pokeMove4 = $pokeData['moves'][3]['move']['name'];
    }
}



// dont use DOMmanipulation (yet), just echo/print
//made a function to get API
function getPokeData($url) {

    $data = file_get_contents($url);

    return json_decode($data, true);
    }
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
    <div class="container bg-danger rounded-pill" id="container2">
        <div class="row text-center">
            <div class="column">
                <h1 class="py-5 text-warning">PHPokédex!</h1>
                <h2 class="text-white"><?php echo ($pokeName); ?></h2>
                <h2 class="text-white">#<?php echo ($pokeID); ?></h2>
            </div>
            <div class="column">
                <div class="image">
                    <?php echo "<img src='" . $pokeImage . "'>"; ?>
                </div>
                <li><?php echo ($pokeMove1); ?></li>
                <li><?php echo ($pokeMove2); ?></li>
                <li><?php echo ($pokeMove3); ?></li>
                <li class="pb-2"><?php echo ($pokeMove4); ?></li>
                <div class="py-1"> <?php
                                    if ($evoData['evolves_from_species'] === null) {
                                        echo "This pokemon has no previous evolution";
                                    } else {
                                        echo "The previous evolution is" . " " . ($evoData['evolves_from_species']['name']);
                                    }
                                    ?></div>
                <!-- attempting to give user feedback if empty field -->
                <p class="text-warning"><?php if (empty($_GET["id"]) && empty($_GET["name"])) {
                                            echo "ID or name input necessary!";
                                        }  ?></p>
                <!--    Disable button with JS -->

            </div>
        </div>
        <div class="row py-3 text-center">
            <div class="column">
                <form method="get">
                    Pokemon ID: <input type="text" name="id">
                    Pokemon Name: <input type="text" name="name">
                    <input type="submit" id="button">
                    <!--  submit refreshes page  -->
                </form>
            </div>
        </div>
    </div>
</body>
</html>