<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="formulario.css">
    <title>Formulario</title>
</head>
<body>
    <!--Ejercicio 1
    PDO(PHP Data Objects), es una extensión de PHP que proporciona una interfaz uniforme para 
    acceder a diversas bases de datos relacionales. Facilita la escritura de código que es independiente
    del tipo de base de datos que estamos utilizando.

    Ofrece una capa de abstracción que permite trabajar con diferentes bases de datos 
    utilizando el mismo conjunto de funciones.

    Algunas de sus características son (Abstracción de bases de datos, soporte para múltiples 
    bases de datos, consultas preparadas...).
    -->
    <form>
        <div class="register-page">
            <div class="form">
            <div class="title">
                <h1>Formulario</h1>
            </div>
                <form class="register-form">
                    <input type="text" placeholder="Name">
                    <input type="text" placeholder="Surname">
                    <input type="career" placeholder="Career">
                    <input type="state" placeholder="State">
                    <input type="registration date" placeholder="Registration Date">
                    <input type="button" class="create" value="Create">
                </form>
                
            </div>
        </div>
    </form>
</body>
</html>