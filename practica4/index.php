<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">   
    <title>Formulario</title>
    <style>
        .contenedor{
            background-color: #cfcfcf;
            width: 15%;
            margin-left: 40%;
            margin-top: 10%;
        }
        .titulo{
            text-align: center;
        }
        .texto{
            margin-left: 20%;
            margin-top: 1%;
        }
        .contraseña{
            margin-left: 20%;
            margin-top: 2%;
        }
        .boton{
            margin: 10%;
            margin-left: 33%;
            margin-top: 2%;
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <form class="formulario" action="index2.php" method="post">
            <p class="titulo">Iniciar Sesión</p>
            <input type="text" id="texto" name="login" class="texto"  placeholder="Usuario"/>
            <input type="password" id="contraseña" name="password" class="contraseña" placeholder="Contraseña">
            <p><input type="submit" class="boton" value="Iniciar Sesión"/></p>
        </form>
    </div>
</body>
</html>