<?php
    include "tabla.php";

    if (isset($_GET['id'])) { //Se verifica si se proporcionó un ID en la URL
        $id = $_GET['id']; //Se obtiene el ID del usuario de la URL
        $stmt = $pdo->prepare('SELECT * FROM evelyn WHERE id = :id'); //Se prepara una consulta SQL para seleccionar la información del usuario con el ID proporcionado
        $stmt->bindParam(':id', $id, PDO::PARAM_INT); //Se vincula el parámetro :id en la consulta SQL al valor de $id
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC); //Se obtiene la información del usuario como un array asociativo

    if (!$usuario) {
    echo "Usuario no encontrado.";
    exit;
    }
    } else {
    echo "Se necesita un ID válido.";
    exit;
    }

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $career = $_POST['career'];
        $state = $_POST['state'];
        $registration_date = $_POST['registration_date'];

    $stmt = $pdo->prepare('UPDATE evelyn
        SET name = :name,
            surname = :surname,
            career = :career,
            state = :state,
            registration_date = :registration_date
        WHERE id = :id');
    $stmt->bindParam(':name', $name, PDO::PARAM_STR); // Se vinculan los parámetros de la consulta a las variables PHP.
    $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
    $stmt->bindParam(':career', $career, PDO::PARAM_STR);
    $stmt->bindParam(':state', $state, PDO::PARAM_STR);
    $fechaFormateada = date('Y-m-d', strtotime($registration_date));
    $stmt->bindParam(':registration_date', $fechaFormateada, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    try {
    $stmt->execute();
    echo "Usuario actualizado exitosamente.";
    } catch (PDOException $error) {
    echo "Error al actualizar el usuario: " . $error->getMessage();
    }
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Editar Usuario</title>
<link rel="stylesheet" href="update.css">

</head>
<body>
<h2>Editar Usuario</h2>
<form method="post">
<label for="nombre">Name</label>
<input type="text" name="name" value="<?php echo htmlspecialchars($usuario['Name']); ?>"> <!--Cada campo de entrada está prellenado con la información actual del usuario -->

<label for="animal">Surname</label>
<input type="text" name="surname" value="<?php echo htmlspecialchars($usuario['Surname']); ?>">

<label for="hobby">career</label>
<input type="text" name="career" value="<?php echo htmlspecialchars($usuario['Career']); ?>">

<label for="nacionalidad">state</label>
<input type="text" name="state" value="<?php echo htmlspecialchars($usuario['State']); ?>">

<label for="fecha">registration_date</label>
<input type="date" name="registration_date" value="<?php echo htmlspecialchars($usuario['Registration_Date']); ?>">

<input type="submit" name="submit" value="Editar">
</form>
<a href="tabla.php">Volver</a>
</body>
</html>