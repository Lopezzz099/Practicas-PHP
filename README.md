# Practicas-PHP

Repositorio dedicado a prácticas de desarrollo en PHP, diseñado para explorar y aprender conceptos clave de este lenguaje de programación. Incluye ejercicios, proyectos y recursos útiles para mejorar habilidades en la creación de aplicaciones web dinámicas utilizando PHP.

Lo siguiente es el proceso en como fui aprendiendo PHP.

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