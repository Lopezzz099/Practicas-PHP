# Practicas-PHP

Repositorio dedicado a prácticas de desarrollo en PHP, diseñado para explorar y aprender conceptos clave de este lenguaje de programación. Incluye ejercicios, proyectos y recursos útiles para mejorar habilidades en la creación de aplicaciones web dinámicas utilizando PHP.

Lo siguiente es el proceso en cómo fui aprendiendo PHP.

### Como iniciar el servidor web:
Inicia el servidor web embebido usando el comando php -S seguido de la dirección y el puerto en el que deseas que se ejecute el servidor. Por ejemplo:
```sh
    php -S localhost:8000
```

### Alternativa a php echo:
```php
    <?php echo 'Mi primea app'; ?>
    <?= 'Mi primea app'; ?>
```

### ¿Cómo crear variables en PHP y restricciones?
Con el signo de '$' es como estamos identificando las variables y luego al lado va el nombre de la variable.
```php
    <?php
        $name = 'Ignacio';
        $age = 21;
        $isDev = true;
    ?>
```
También se pueden asignar variables a otras con condiciones.
```php
    <?php
        $name = 'Ignacio';
        $age = 21;
        $isDev = true;

        $isOld = !$isDev && $age > 40;
    ?>
```

### ¿Qué es PHP?
Es un lenguaje de tipado dinámico, débil y gradual. Es dinámico porque no es necesario declarar el tipo de la variable, puede cambiar en tiempo de ejecución. Es débil porque va a intentar cambiar los tipos automáticamente, por ejemplo: $newAge = 21 + '1'; esto va a dar 22. Pero si son dos cadenas de texto y lo quieres concatenar, el símbolo '+' no sirve ya que tenemos que utilizar ' . ', por ejemplo: $newAge = '21' + '1'; esto va a dar 22 y $newAge = '21' . '1'; esto va a dar 211. Lo mismo pasa al revés: $newAge = 21 . 1; esto va a dar 211. Es gradual porque puedes indicar explícitamente los tipos de las variables, esto se aplica solo en funciones o en clases, no tiene un tipado completo para aplicarlo en cualquier parte. Pero no es algo obligatorio ya que es opcional.
```php
<?php
    $name = 'Ignacio';
    $age = 21;
    $isDev = true;

    $newAge = $age + '1';
    $nameComplete = $name . ' ' . 'Lopez';
?>
```
Para poner comentarios utilizaríamos el #.
```php
<?php
    # Esto es un comentaio.
?>
```
También con //.
```php
<?php
    // Esto tambien es un comentaio.
?>
```
Y con esto /**/.
```php
<?php
    /* Ejecutar la peticion 
    y guardar el resultado 
    */ 
?>
```

### Métodos para ver los tipos de datos
El 'var_dump' te va a decir exactamente el tipo de datos y el valor del dato que tiene en ese momento una variable.
```php
    var_dump($name);
    var_dump($age);
    var_dump($isDev);
```
Cómo se visualiza: string(7) "Ignacio" int(21) bool(true)
IMPORTANTE: Esto se puede visualizar en producción o sea si hay un error, un atacante lo puede utilizar en tu contra. Entonces una vez terminado quitar los 'var_dump'.

Otro importante es el 'gettype', directamente lo que te dice es el tipo de dato.
```php
    echo gettype($name);
    echo gettype($age);
    echo gettype($isDev);
```
Cómo se visualiza: stringintegerboolean

Otros métodos para verificar el tipo de dato pueden ser:
```php
    is_string($name);
    is_bool($age);
    is_int($isDev);
```
Estos te devuelven un true o false.

### El 'type-casting'
Es un forzado de tipos, si por lo que sea quieres transformar un número a un booleano lo puedes hacer con un prefijo así: $age = (bool) 21; o sea se va a mostrar un 1 ya que eso sería el valor 'true' de un booleano.

---

```php
    <?= 
        "Hola " 
        . $name 
        . ",<br/> con una edad de " 
        . $age;
    ?>
```

---

### Interpolación de cadenas
Si queremos evaluar las variables dentro de una cadena de texto entonces tenemos que utilizar " ". 
Por ejemplo si tenemos el output:
```php
    <?php
        $name = 'Ignacio';
        $age = 21;
        $isDev = true;

        $output = "Hola $name, con una edad de $age";
    ?>
```
Eso en la salida se mostraría así: Hola Ignacio, con una edad de 21.
Pero si tenemos esto:
```php
    <?php
        $name = 'Ignacio';
        $age = 21;
        $isDev = true;

        $output = 'Hola $name, con una edad de $age';
    ?>
```
Lo va a tomar como si fuera todo un texto, se mostraría así: Hola $name, con una edad de $age.
También si queremos concatenar, se puede hacer un " .= " así:
```php
    $output  .=  ", tienes $age anios"; 
```
Ahora ¿Cómo ignoramos los signos?
Con esto " \ " , así: 
```php
    $output = "Hola \$name, con una edad de \$age"; 
```
Entonces lo mostraría como un carácter: Hola $name, con una edad de $age.
Otro ejemplo:
```php
    $output = "Hola \"$name\", con una edad de \"$age\" "; 
```
Se mostraría así: Hola "Ignacio", con una edad de "21".

### Constantes
Hay dos tipos de constantes:
- Las globales, son las que se definen con el método 'define', por ejemplo así:
    ```php
        define('NAME', 'Ignacio'); 
    ```
    O sea que en cualquier lugar de nuestra aplicación vamos a poder utilizarla, obviamente si la intentamos llamar dos veces, nos tirará un warning.
    RECOMENDACIÓN: Hacer un archivo solamente de constantes para que no haya problemas y siempre ponerlas en mayúsculas.
- Las locales, serían a nivel de clases o a nivel de donde estamos trabajando. En este caso se definen con el método 'const', por ejemplo así:
    ```php
        const NOMBRE = "Ignacio";
    ```
    Las constantes no llevan el signo " $ " para inicializarlas.
    ```php
        <?php
            define('LOGO_PHP', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUXbDN6MjKqhEQLKobn2Ffg4goxiTe6xptfw&s');

            const NOMBRE = 'Ignacio';
        ?>

        <img src="<?= LOGO_PHP; ?>" alt="Logo PHP">
        <h1>
            <?= 
                NOMBRE;
            ?>
        </h1>
    ```

### IF en PHP
En este caso sería el típico if, así:
```php
    $name = 'Ignacio';
    $age = 21;
    $isDev = true;

    $isOld = $age > 40;

    if ($isOld) {
        echo "<h2>Eres mayor de edad</h2>";
    } else if ($isDev){
        echo "<h2>No eres viejo, eres Dev</h2>";
    } else {
        echo "<h2>Eres menor de edad</h2>";
    }
```
Lo interesante es que el "else if" se puede poner todo junto "elseif".

### Sintaxis alternativa para trabajar con los IF
Hay una sintaxis alternativa en PHP para trabajar con los if para que se utilice como un sistema de plantillas y sería básicamente con los dos puntos ( : ).
```php
    <?php if ($isOld) : ?>
        <h2>Eres mayor de edad</h2>
    <?php elseif ($isDev) : ?>
        <h2>No eres viejo, eres Dev</h2>
    <?php else : ?>
        <h2>Eres menor de edad</h2>
    <?php endif; ?>
```
Como verás, este sistema de plantillas es mucho más fácil porque podrías tener tanto HTML como quieras y necesites.
Una cosa importante, es que en esta sintaxis no podes separar el "elseif" porque se rompe.

### Ternarias
```php
    $outputAge = $isOld 
        ? 'Mayor de edad' 
        : 'Menor de edad';
```

### Match, mejor que Switch
Una cosa interesante del match es que puedes hacerlo como una asignación a una variable o sea que lo que va a ocurrir, dentro de un match, va a devolver un valor y ese valor lo guarda en una variable. Es una forma de hacer pattern matching, en el que el valor que se genera dentro de las condiciones es el que pasa dentro de la variable.
```php
    $outputAge = match ($age) {
        0, 1, 2, => "Eres un bebe, $name",
        3, 4, 5, 6, 7, 8, 9, 10, => "Eres un ninio, $name",
        11, 12, 13, 14, 15, 16, 17, 18, 19, 20, => "Eres un adolescente, $name",
        default => "Eres un adulto, $name",
    }
```
Al poner tantos años, es algo incómodo, pero la idea es que se entienda cómo funciona básicamente. Ahora lo que podríamos hacer es evaluar expresiones:
```php
    $outputAge = match (true) {
        $age < 3    => "Eres un bebe, $name",
        $age < 11   => "Eres un ninio, $name",
        $age < 19   => "Eres un adolescente, $name",
        default     => "Eres un adulto, $name",
    }
```
Lo que va a comparar es si este "true" ocurre en la primera expresión ($age < 3) y sigue comparando hasta dar con alguna verdadera o hasta llegar al default.

### Arrays
Se pueden crear de diferentes formas:
```php
    $bestLanguage = array('PHP', 'JavaScript', 'Python', 'Java');
```
```php
    $bestFood = ["Pizza", "Hamburguesa", "Hot Dog"];
```
Lo que podés hacer en este lenguaje es que podés mezclar los tipos de datos en el array, lo cual en algunos lenguajes no se puede.
```php
    $bestNumbers = [1, 2, 3, "Cuatro", "Cinco", "Seis"];
```
También, pueden crecer de forma dinámica:
```php
    $bestFood[] = "Papas";
```
Esto lo que va a hacer, sin poner ninguna posición en los [], es directamente lo va a poner al final. Si le ponés el índice, va a reemplazar el actual valor de dicha posición por el valor nuevo.
```php
    $bestFood[1] = "Papas";
```

### Foreach()
La forma de iterar los arrays es con Foreach().
```php
    <?php foreach () : ?>

    <?php endforeach; ?>
```
Un ejemplo aplicado sería así:
```php
    <ul>
        <?php foreach ($bestLanguage as $language) : ?>
            <li><?= $language; ?></li>
        <?php endforeach; ?>
    </ul>
```

### Índice del foreach
Ahora para sacar el índice podemos poner "Key" más "=>":
```php
    <ul>
        <?php foreach ($bestLanguage as $key => $language) : ?>
            <li><?= $key . " " . $language; ?></li>
        <?php endforeach; ?>
    </ul>
```
Lo que estamos haciendo es sacar de "$language" el índice.

### Crear un diccionario
Se los llama arrays asociativos donde cada índice en realidad sea una cadena de texto y por lo tanto puedas crear algo parecido a un objeto.
```php
    $person = [
        'name' => 'Ignacio',
        'age' => 21,
        'isDev' => true,
        'languages' => ['PHP', 'JavaScript', 'Python', 'Java'],
    ]
```
En este caso tenemos la key 'name' y el valor 'Ignacio'. Así es como estamos creando este enlace donde le estamos diciendo cuál es la llave y cuál es el valor.
También se puede mutar:
```php
    $person['name'] = "Lopez";
    $person['languages'][] = "C#";
```
## La primer aplicación
En esta aplicación el objetivo es que nos diga cuál es la próxima película de Marvel. Utilizando la API de [MCU-Countdown](https://github.com/DiljotSG/MCU-Countdown)

### ¿Cómo llamar a una API?
La forma más cercana al lenguaje de PHP es utilizando cURL.
Si hacemos "curl https://www.whenisthenextmcufilm.com/api", nos daría la respuesta de la llamada.
Esto sin utilizar ninguna dependencia.
```php
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

    // Cerrar la sesion de cURL
    curl_close($ch);
```

### Agregando Pico (framwork de CSS)
Utilizo este framework para que los estilos se vean bien.
Pico CSS es un framework CSS que funciona con o sin clases dependiendo de la versión, que solo te va a estilizar directamente el HTML.

### 2da Forma de llamar a una API
Una alternativa sería utilizar file_get_contents, es una forma de directamente llamar a la API, hacer un GET y quedarse con el JSON, o sea ya tendrías el resultado de una manera mucho más fácil. A comparación con la anterior forma, es que te permite hacer GET, POST, PUT y todo lo que quieras, ver mucho más fácil también los status code pero si solo querés hacer un GET de una API, esta es la forma.

```php
    const API_URL = 'https://www.whenisthenextmcufilm.com/api';
    // Inicializar una nueva sesión de cURL; ch = cURL handle
    $ch = curl_init(API_URL);
    // Indicar que queremos recibir el resultado de la petición y no mostrarla en pantalla
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    /* Ejecutar la petición 
    y guardar el resultado 
    */ 
    $result = file_get_contents(API_URL)

    // Cerrar la sesion de cURL
    curl_close($ch);
```

### ¿Cómo hacer un deploy?
Una forma para desplegar un proyecto de PHP fácil, rápido y barato (porque no hay que poner un peso) es utilizando Zeabur.