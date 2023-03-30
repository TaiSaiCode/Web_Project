<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="<?php $root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/'. "/projetPanier";
    echo $root . "/vues/css/style.css" ?>">

    <style>

.sombre {
    background-color: black;
    color:white;
}

body {
    background-color: lightgreen;
}

    </style>
</head>
<body>
<div class="root_container">

<div>
<?php 
    require_once 'controleurs/PanierControleur.php';

    $controller = new PanierControleur();
    $controller->handleRequest();
    ?>
</div>
        
</div>
<?php
    include("vues/pied.php");
    ?>

<script>
    changerCurseur();

    function changerCurseur() {
      document.body.classList.add("plant");
      document.querySelectorAll("div").forEach(t => t.classList.add("plant"));

    }
</script>
</body>
</html>