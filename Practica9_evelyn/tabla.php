<?php
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
</head>
<body>

<h2>Usuarios</h2>

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
            <input type="text" name="registration_date" placeholder="Registration Date">
            <input type="submit" class="create" value="Create">
        </form>
    </div>
</div>
<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $career = $_POST['career'];
        $state = $_POST['state'];
        $registrationDate = $_POST['registration_date'];

        $stmtInsert = $pdo->prepare('INSERT INTO evelyn (Name, Surname, Career, State, `Registration Date`) VALUES (:name, :surname, :career, :state, :registrationDate)');
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
            <th>Hobby</th>
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
                <td><?php echo $usuario['Registration Date']; ?></td>
                <td>
                    <!-- Mueve esta sección dentro de la celda correspondiente -->
                    <form method="post" action="">
                        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
                        <input type="submit" name="delete_user" value="Eliminar">
                    </form>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

</body>
</html>
