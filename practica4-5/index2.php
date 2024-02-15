<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Segunda Página</title>
</head>
<body>
<form action="index2.php" method="get">
        <input type="submit" name="obtener_ayuda" value="Obtener Ruta Actual">
    </form>
<?php
 session_start();
    //formulario
    // Verifica si se han enviado los campos 'login' y 'password' a través del método POST
    if (isset($_POST['login']) && isset($_POST['password'])) {
        $usuario = $_POST['login'];
        $password = $_POST['password'];
         // Llama a la función 'validar' para comprobar las credenciales
        if (validar($usuario, $password)) {
            //Para poner el rol del usuario
                $_SESSION['usuario'] = $usuario;
                if ($usuario == 'admin'){
                    $_SESSION["rol"] = "jefe";
                }else{
                    $_SESSION["rol"] = "normal";
                }
                 echo 'La ';
                 fecha();
        } else {
                echo 'incorrecto';
                header('Location: index.php');
                exit();
        }
        }
            // Función para validar el usuario y la contraseña
            function validar($usuario, $password) {
                // Comprueba que lo que introducimos es correcto
                if (($usuario == 'admin' && $password == '1234') || ($usuario == 'cliente1' && $password == '5678')) {
                return true;
                }else {
                return false;
                }}
        
         //Tiene que mostrar la fecha y la hora de acceso al usuario.

            function fecha(){
                $fecha = date("d-m-Y h:i:s");
                echo " fecha y la hora es: " . $fecha;
            }
            if(isset($_SESSION['usuario'])){
    //Ejercicio1
   // Verifica si se ha enviado un parámetro 'obtener_ayuda' a través de la URL (GET)
    if(isset($_GET['obtener_ayuda'])){
         // Obtiene la ruta actual de la página desde getcwd().
        $ruta_actual= getcwd();
        // Muestra la ruta actual al usuario
        echo "La ruta actual es: " . $ruta_actual;
    }}
    ?>
    <!--Ejercicio 2-->
    <form  method="post">
        <input type="text" name="nombre_archivo" placeholder="Nombre del Archivo">
        <input type="submit" value="Busca el Fichero">
    </form>
    <?php
    // Verificar si se ha enviado un nombre de archivo a través del formulario
    if(isset($_POST['nombre_archivo'])){
         // Obtener el nombre del archivo desde el formulario
        $nombre_archivo = $_POST['nombre_archivo'];

        // Verificar si el archivo con el nombre proporcionado existe
        if(file_exists($nombre_archivo)){
            echo "El archivo $nombre_archivo existe.";
        } else{
            echo "El archivo $nombre_archivo no existe";
        }
    }
    ?>
    <!--Ejercicio 3-->
    <?php
        if($_SESSION["rol"] == "jefe"){
    
    ?>
    <form action="index2.php" method="post">
        <label for="nombres_archivo">Nombre del Archivo:</label>
        <input type="text" name="nombres_archivo" id="nombres_archivo" required>
        <br>
        <label for="contenido">Contenido:</label>
        <textarea name="contenido" id="contenido" rows="5" required></textarea>
        <br>
        <label for="permisos">Permisos (octal):</label>
        <input type="text" name="permisos" id="permisos" value="0644">
        <br>
        <input type="submit" value="Crear y Escribir en el Archivo">
    </form>

    <?php
        }
if (isset($_POST['nombres_archivo'], $_POST['contenido'], $_POST['permisos'])) {
    $nombres_archivo = $_POST['nombres_archivo']; // Cambiado de 'nombre_archivo' a 'nombres_archivo'
    $contenido = $_POST['contenido'];
    $permisos = octdec($_POST['permisos']); // Convierte los permisos octales a decimal

    // Abre o crea el archivo en modo de escritura ('w')
    $archivo = fopen($nombres_archivo, 'w');

    if ($archivo) {
        // Escribe el contenido en el archivo
        fwrite($archivo, $contenido);

        // Cierra el archivo
        fclose($archivo);

        // Configura los permisos
        chmod($nombres_archivo, $permisos);

        echo "El archivo $nombres_archivo ha sido creado y escrito con éxito.";
    } else {
        echo "No se pudo abrir el archivo $nombres_archivo.";
    }
}
?>
<!--Practica 5-->
        <form action="cerrar.php" method="post">
            <input type="submit" name="cerrar_sesion" value="log out">
        </form>
</body>
</html>