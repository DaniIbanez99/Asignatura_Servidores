<!--
PDO(PHP Data Object) es una extensión en PHP que proporciona una interfaz consistente para interactuar 
con bases de datos. Permite la portabilidad del código al trabajar con diferentes sistemas de gestión 
de bases de datos.

PDO utiliza sentencias preparadas para prevenir ataques de inyección SQL, ofrece eficiencia en el rendimiento
y facilita la conexión, consulta y manipulación de datos en bases de datos desde PHP.
-->


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
                  
        } else {
                echo 'incorrecto';
                header('Location: tabla.php');
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
    if (isset($_SESSION["usuario"])) {

include 'config.php';

if (isset($_POST['delete_user'])) {
    $idToDelete = $_POST['id'];

    $stmtDelete = $pdo->prepare('DELETE FROM evelyn WHERE id = :id');
    $stmtDelete->bindParam(':id', $idToDelete, PDO::PARAM_INT);
    $stmtDelete->execute();
}

$stmt = $pdo->prepare('SELECT * FROM evelyn');
$stmt->execute();
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="formulario.css">
<title>CRUD con PDO</title>
<style>
    table {
        margin-left: 26%;
        width: 50%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #f5f5f5;
    }

    form {
        margin: 0;
    }

    input[type="submit"] {
        background-color: #ff0000;
        color: #fff;
        padding: 8px 12px;
        border: none;
        cursor: pointer;
    }
    #style{
        margin-left: 48.5%;
        margin-top: 2%;
    }
</style>

</head>
<body>
<!-- Elimina el formulario exterior -->
<div class="register-page">
    <div class="form">
        <div class="title">
            <h1>Formulario</h1>
        </div>
        <form class="register-form" method="post"  action="tabla.php">
            <!-- Campos del formulario -->
            <input type="text" name="name" placeholder="Name">
            <input type="text" name="surname" placeholder="Surname">
            <input type="text" name="career" placeholder="Career">
            <input type="text"  name="state" placeholder="State">
            <input type="text" name="registration_date" placeholder="Registration_Date">
            <input type="submit" class="create" name="create" value="Create">
        </form>
    </div>
</div>
<?php

    /*para insertar*/ 
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create'])) {
        // Verificar que se hayan enviado todos los datos necesarios
        if (
            isset($_POST['name']) &&
            isset($_POST['surname']) &&
            isset($_POST['career']) &&
            isset($_POST['state']) &&
            isset($_POST['registration_date'])
        ) {
            // Obtener los datos del formulario
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $career = $_POST['career'];
            $state = $_POST['state'];
            $registration_date = $_POST['registration_date'];
    
            // Verificar que $name no sea nulo o vacío
            if (!empty($name)) {
                // Preparar la consulta de inserción
                $stmt = $pdo->prepare('INSERT INTO evelyn (Name, Surname, Career, State, Registration_Date) VALUES (:name, :surname, :career, :state, :registration_date)');
                $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
                $stmt->bindParam(':career', $career, PDO::PARAM_STR);
                $stmt->bindParam(':state', $state, PDO::PARAM_STR);


                $fechaFormateada = date('Y-m-d', strtotime($registration_Date));
                $stmt->bindParam(':registration_date', $fechaFormateada, PDO::PARAM_STR);
    
                // Ejecutar la consulta de inserción
                if ($stmt->execute()) {
                    // Redirigir a la misma página después de la inserción
                    header('Location: tabla.php');
                    exit;
                } else {
                    echo "Error al insertar el usuario.";
                }
            } else {
                echo "El nombre no puede ser nulo o vacío.";
            }
        }
    }
    


    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $career = $_POST['career'];
        $state = $_POST['state'];
        $registrationDate = $_POST['registration_date'];

        $stmtInsert = $pdo->prepare('INSERT INTO evelyn (Name, Surname, Career, State, `Registration_Date`) VALUES (:name, :surname, :career, :state, :registrationDate)');
        $stmtInsert->bindParam(':name', $name, PDO::PARAM_STR);
        $stmtInsert->bindParam(':surname', $surname, PDO::PARAM_STR);
        $stmtInsert->bindParam(':career', $career, PDO::PARAM_STR);
        $stmtInsert->bindParam(':state', $state, PDO::PARAM_STR);
        $stmtInsert->bindParam(':registrationDate', $registrationDate, PDO::PARAM_STR);

        $stmtInsert->execute();

        header('location: tabla.php'); // Redirige a tu página principal después de procesar el formulario
        exit();
    }

   
?>
<!-- Tabla de usuarios -->
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Surname</th>
            <th>Career</th>
            <th>State</th>
            <th>Registration Date</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($usuarios as $usuario){ ?>
            <tr>
                <td><?php echo $usuario['Name']; ?></td>
                <td><?php echo $usuario['Surname']; ?></td>
                <td><?php echo $usuario['Career']; ?></td>
                <td><?php echo $usuario['State']; ?></td>
                <td><?php echo $usuario['Registration_Date']; ?></td>
            <td>
                    <!-- Mueve esta sección dentro de la celda correspondiente -->
                    <form method="post" action="">
                        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
                        <input type="submit" name="delete_user" value="Eliminar">
                        <a href="update.php?id=<?php echo $usuario['id']; ?>">Editar</a>
                    </form>
                </td>
            </tr>
        <?php 
        }} else{
            header('Location: tabla.php');
        }
    
        ?>
    </tbody>
</table>
            <div id="style">
                    <form action="cerrar.php" method="post">
                        <input type="submit" name="cerrar_sesion" value="log_out">
                    </form>
            </div>

</body>
</html>