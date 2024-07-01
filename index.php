<?php
    $name = 'Ignacio';
    $age = 21;
    $isDev = true;

    echo gettype($name);
    echo gettype($age);
    echo gettype($isDev);
?>

<h1>
    <?= 
        "Hola " 
        . $name 
        . ",<br/> con una edad de " 
        . $age;
    ?>
</h1>

<style>
    :root {
        color-scheme: light dark;
    }

    body {
        display: grid;
        place-content: center;
    }
</style>