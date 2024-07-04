<?php
    $name = 'Ignacio';
    $age = 21;
    $isDev = true;

    $isOld = $age > 40;

    define('LOGO_PHP', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUXbDN6MjKqhEQLKobn2Ffg4goxiTe6xptfw&s');

    const NOMBRE = 'Ignacio';

    $output = "Hola $name";
    $output .= ", tienes $age anios";
    $outputAge = match (true) {
        $age < 3    => "Eres un bebe, $name",
        $age < 11   => "Eres un ninio, $name",
        $age < 19   => "Eres un adolescente, $name",
        default     => "Eres un adulto, $name",
    }
?>

<h2><?= $outputAge; ?></h2>

<?php if ($isOld) : ?>
    <h2>Eres mayor de edad</h2>
<?php elseif ($isDev) : ?>
    <h2>No eres viejo, eres Dev</h2>
<?php else : ?>
    <h2>Eres menor de edad</h2>
<?php endif; ?>

<img src="<?= LOGO_PHP; ?>" alt="Logo PHP">
<h1>
    <?= 
        NOMBRE;
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