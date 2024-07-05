<?php 

    const API_URL = 'https://www.whenisthenextmcufilm.com/api';
    // Inicializar una nueva sesión de cURL; ch = cURL handle
    $ch = curl_init(API_URL);
    // Indicar que queremos recibir el resultado de la petición y no mostrarla en pantalla
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    /* Ejecutar la petición 
    y guardar el resultado 
    */ 
    $result = curl_exec($ch);
    $data = json_decode($result, true);

    // Verificar si hubo algún error con cURL
    if (curl_errno($ch)) {
        echo 'Error de cURL: ' . curl_error($ch);
    } else {
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($http_code !== 200) {
            echo "Error: La API devolvió un código de estado HTTP $http_code";
        } else {
            $data = json_decode($result, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                echo 'Error al decodificar JSON: ' . json_last_error_msg();
            } else {
                var_dump($data);
            }
        }
    }

    // Cerrar la sesion de cURL
    curl_close($ch);

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