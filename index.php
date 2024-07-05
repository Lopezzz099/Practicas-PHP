<?php 

    const API_URL = 'https://www.whenisthenextmcufilm.com/api';
    # Inicializar una nueva sesion de cURL; ch = cURL handle
    $ch = curl_init(API_URL);
    // Indicar que queremos recibir el resultado de la peticion y no mostrarla en pantalla
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    /* Ejecutar la peticion 
    y guardar el resultado 
    */ 
    $result = curl_exec($ch);
    $data = json_decode($result, true);

    // Cerrar la sesion de cURL
    curl_close($ch);

    var_dump($data);

?>

<main>
    <h2>La proxima pelicula de Marvel</h2>
</main>

<style>
    :root {
        color-scheme: light dark;
    }

    body {
        display: grid;
        place-content: center;
    }
</style>