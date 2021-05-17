<?php
$world = "Hello World!"; 

$echo = "Does this work?";
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
    <p><?php echo $world ?></p>
    <?php
     echo "This is also a paragraph!";
    ?>
     <p><?php var_dump($_GET);?></p> 
     <!-- $_GET is superglobal, global scope and automatically declared -->
     <p><?php var_dump($_GET["aaron"]);?></p>
</body>
</html>
