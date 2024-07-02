<?php
    $name = 'Ignacio';
    $age = 21;
    $isDev = true;

    define('LOGO_PHP', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUXbDN6MjKqhEQLKobn2Ffg4goxiTe6xptfw&s');

    const NOMBRE = 'Ignacio';

    $output = "Hola $name";
    $output .= ", tienes $age anios";
?>

<img src="<?= LOGO_PHP; ?>" alt="Logo PHP">
<h1>
    <?= 
        $NOMBRE;
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