# Practicas-PHP

Repositorio dedicado a prácticas de desarrollo en PHP, diseñado para explorar y aprender conceptos clave de este lenguaje de programación. Incluye ejercicios, proyectos y recursos útiles para mejorar habilidades en la creación de aplicaciones web dinámicas utilizando PHP.

Lo siguiente es el proceso en como fui aprendiendo PHP.

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
Tambien se pueden asignar variables a otras con condiciones.
```php
    <?php
        $name = 'Ignacio';
        $age = 21;
        $isDev = true;

        $isOld = !$isDev && $age > 40;
    ?>
```

### Que es PHP?
Es un lenguaje de tipado dinamico, debil y gradual.
Es dinamico porque no es necesario declarar el tipo de la variable, puede cambiar en tiempo de ejecucion.
Es debil porque va a intentar cambiar los tipos automaticamente, por ejemplo: $newAge = 21 + '1'; esto va a dar 22.
Pero si son dos cadenas de texto y lo queres concatenar, el simbolo '+' no sirve ya que tenemos que utilizar ' . ', por ejemplo: $newAge = '21'+ '1'; esto va a dar 22 y $newAge = '21' . '1'; esto va a dar 211. Lo mismo pasa al revez: $newAge = 21 . 1; esto va a dar 211.
Es gradual porque podes indicar explicitamente los tipos de las variables, esto se aplica solo en funciones o en clases, no tiene un tipado completo para aplicarlo en cualquier parte. Pero no es algo obligatorio ya que es opcional.
<?php
    $name = 'Ignacio';
    $age = 21;
    $isDev = true;

    $newAge = $age + '1';
    $nameComplete = $name . ' ' . 'Lopez';
?>
Para poner comentarios utilizariamos el #.
<?php
    # Esto es un comentaio.
?>
Tambien con //.
<?php
    // Esto tambien es un comentaio.
?>
Y con esto /**/.
<?php
    /* Ejecutar la peticion 
    y guardar el resultado 
    */ 
?>

### Metodos para ver los tipos de datos
El 'var_dump' te va a decir exactamente el tipo de datos y el valor del dato que tiene en ese momento una variable.
```php
    var_dump($name);
    var_dump($age);
    var_dump($isDev);
```
Como se visualiza: string(7) "Ignacio" int(21) bool(true)
IMPORTANTE: Esto se puede visualizar en produccion o sea si hay un error, un atacante lo puede utilizar en tu contra. Entonces una vez terminado quitar los var_dump.

Otro importante es el 'gettype', directamente lo que te dice es el tipo de dato.
```php
    echo gettype($name);
    echo gettype($age);
    echo gettype($isDev);
```
Como se visualiza: stringintegerboolean

Otros metodos para verificar el tipo de dato puede ser: 
```php
    is_string($name);
    is_bool($age);
    is_int($isDev);
```
Estos te devuelven un true o false.

### El 'type-casting'
Es un forzado de tipos, si por lo que sea quieres transformar un numero a un booleano lo puedes hacer con un prefijo asi: $age = (bool) 21; o sea se va a mostrar un 1 ya que eso seria el valor 'true' de un booleano.

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

### Interpolacion de cadenas
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
Eso en la salida se mostraria asi: Hola Ignacio, con una edad de 21.
Pero si tenemos esto:
```php
    <?php
        $name = 'Ignacio';
        $age = 21;
        $isDev = true;

        $output = 'Hola $name, con una edad de $age';
    ?>
```
Lo va a tomar como si fuera todo un texto, se mostraria asi:  Hola $name, con una edad de $age.
Tambien si queremos concatenar, se puede hacer un " .=  " asi: 
```php
    $output  .=  ", tienes $age anios"; 
```
Ahora como ignoramos los signos? 
Con esto " \ " , asi: 
```php
    $output = "Hola \$name, con una edad de \$age"; 
```
Entonces lo mostraria como un caracter: Hola $name, con una edad de $age. 
Otro ejemplo: 
```php
    $output = "Hola \"$name\", con una edad de \"$age\" "; 
```
Se mostraria asi: Hola "Ignacio", con una edad de "21".

### Constantes
Hay dos tipos de constantes:
- Las globales, son las que se definen con el metodo "define", por ejemplo asi: 
    ```php
        define('NAME', 'Ignacio'); 
    ```
    O sea que en cualquier lugar de nuestra aplicacion vamos a poder utilizarla, obviamente si la intentamos llamar dos veces, nos tirara un warning. 
    RECOMENDACION: Hacer un archivo de solamente de constantes para que no haya problemas y siempre ponerlas en mayusculas.
- Las locales, serian a nivel de clases o a nivel de donde estamos tabajando. En este caso se definen con el metodo "const", por ejemplo asi: 
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
En este caso seria el tipico if, asi:
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
Hay una sintaxis alternativa en php para trabajar con los if para que se utilice como un sistema de plantillas y seria basicamente con los dos puntos ( : ).
```php
    <?php if ($isOld) : ?>
        <h2>Eres mayor de edad</h2>
    <?php elseif ($isDev) : ?>
        <h2>No eres viejo, eres Dev</h2>
    <?php else : ?>
        <h2>Eres menor de edad</h2>
    <?php endif; ?>
```
Como veras, este sistema de plantillas es mucho mas facil porque podrias tener tanto html como quieras y necesites.
Una cosa importante, es que en esta sintaxis no podes separar el "elseif" porque se rompe.

### Ternarias
```php
    $outputAge = $isOld 
        ? 'Mayor de edad' 
        : 'Menor de edad';
```

### Match, mejor que Switch
Una cosa interesante del match es que puedes hacerlo como una asignacion a una variable o sea que lo que va a ocurrir, dentro de un match, va a devolver un valor y ese valor lo guarda en una variable. Es una forma de hacer pattern matching, en el que el valor que se genera dentro de las condiciones es el que pasa dentro de la variable.
```php
    $outputAge = match ($age) {
        0, 1, 2, => "Eres un bebe, $name",
        3, 4, 5, 6, 7, 8, 9, 10, => "Eres un ninio, $name",
        11, 12, 13, 14, 15, 16, 17, 18, 19, 20, => "Eres un adolescente, $name",
        default => "Eres un adulto, $name",
    }
```
Al poner tantos años, es algo incomodo pero la idea es que se entienda como funciona basicamente. Ahora lo que podriamos hacer es evaluar expresiones:
```php
    $outputAge = match (true) {
        $age < 3    => "Eres un bebe, $name",
        $age < 11   => "Eres un ninio, $name",
        $age < 19   => "Eres un adolescente, $name",
        default     => "Eres un adulto, $name",
    }
```
Lo que va a comparar es si este "true" ocurre en la primera expresion ($age < 3) y sigue comparando hasta dar con alguno verdadero o hasta llegar al default.

### Arrays
Se pueden crear de diferentes formas:
```php
    $bestLanguage = array('PHP', 'JavaScript', 'Python', 'Java');
```
```php
    $bestFood = ["Pizza", "Hamburguesa", "Hot Dog"];
```
Lo que podes hacer en este lenguaje es que podes mezclar los tipos de datos en el array, lo cual en algunos lenguajes no se pueden.
```php
    $bestNumbers = [1, 2, 3, "Cuatro", "Cinco", "Seis"];
```
Tambien, pueden crecer de forma dinamica:
```php
    $bestFood[] = "Papas";
```
Esto lo que va a hacer, sin poner ninguna posicion en los [], es directamente lo va a pone al final. Si le pones el indice, va a remplazar el actual valor de dicha posicion por el valo nuevo.
```php
    $bestFood[1] = "Papas";
```

### Foreach()
La forma de iterar los arrays es con Foreach().
```php
    <?php foreach () : ?>

    <?php endforeach; ?>
```
Un ejemplo aplicado seria asi:
```php
    <ul>
        <?php foreach ($bestLanguage as $language) : ?>
            <li><?= $language; ?></li>
        <?php endforeach; ?>
    </ul>
```

### Índice del foreach
Ahora para sacar el indice podemos poner "Key" mas "=>":
```php
    <ul>
        <?php foreach ($bestLanguage as $key => $language) : ?>
            <li><?= $key . " " . $language; ?></li>
        <?php endforeach; ?>
    </ul>
```
Lo que estamos haciendo es sacar de "$language" el indice.

### Crear un diccionario
Se los llaman arrays asociativos donde cada indice en realidad sea una cadena de texto y por lo tanto puedas crear como algo parecido a un objeto.
```php
    $person = [
        'name' => 'Ignacio',
        'age' => 21,
        'isDev' => true,
        'languages' => ['PHP', 'JavaScript', 'Python', 'Java'],
    ]
```
En este caso tenemos la key 'name' y el valor 'Ignacio' asi es como estamos creando este enlace donde le estamos diciendo cual es la llave y cual es el valor. 
Tambien se puede mutar:
```php
    $person['name'] = "Lopez";
    $person['languages'][] = "C#";
```
## La primer aplicacion
En esta aplicacion el objetivo es que nos dija cual es la proxima pelicula de marvel. Utilizando la API de [MCU-Countdown](https://github.com/DiljotSG/MCU-Countdown)

### ¿Cómo llamar a una API?
La forma mas cercana al lenguaje de php es utilizando curl.
Si hacemos "curl https://www.whenisthenextmcufilm.com/api", nos tiraria la respuesta de la llamada. 
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
Utilizo este framwork para que los estilos se vean bien.
Pico CSS es un framwork CSS que funciona con o sin clases dependiendo la version, que solo te va a estilar directamente el HTML. 

### 2da Forma de llamar a una API
Una alternativa seria utiliza file_get_contents, es una forma de directamente de llamar a la API hacer un get y quedarte con el JSON o sea ya tendrias el resultado de una mucho mas facil. A comparacion con la anterior forma, es que te permite hacer get, post, put y todo lo que quieras, ver mucho mas facil tambien los status code pero la mas si solo quieres hacer un get de una API es de esta forma.

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

### ¿Como hacer un deploy?
Una forma paa desplegar un proyecto de php facil, rapido y barato (porque no hay que poner un peso) es utilizando Zeabur.