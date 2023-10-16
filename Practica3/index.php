<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="index.css">
    <title>Practica3</title>
</head>
<body>
    <!--Ejercicio 1-->
    <div id="titulo">
        <h1>Ejercicio 1</h1>
    </div>
    <div id="todo">
        <form action="index.php" method="post">
            <div class="grupos">
                <label for="name">Total de lo gastado</label>
               <input type="text" id="name" name="valorcesta" value="" type="text">
               <input type="submit" id="calculo" name="calculo">
            </div>
        </form>
    </div>
    <?php
        if(isset($_POST["valorcesta"])){
            $valorcesta = $_POST["valorcesta"];
            if($valorcesta < 50){
                echo "Los gastos de envío serán de 3'95€";
            }else if($valorcesta > 50 && $valorcesta < 75){
                echo "Los gastos de envío serán de 2'95€";
            }else if($valorcesta > 75 && $valorcesta < 100){
                echo "Los gastos de envío de 1'95";
            }else if($valorcesta > 100){
                echo "Los gastos de envío serán gratuitos";
            }
        } 
    ?>
     <!--Ejercicio 2-->
    <div id="titulo">
        <h1>Ejercicio 2</h1>
    </div>
    <div id="todo">
        <form action="index.php" method="post">
            <div class="grupos">
                <label for="name">Total de lo gastado</label>
               <input type="text" id="name" name="valorcesta" value="" type="text">
               <input type="submit" id="calculo" name="calculo">
            </div>
        </form>
    </div>
    <?php
      if(isset($_POST["valorcesta"])){
        $valorcesta = $_POST["valorcesta"];
        
        switch (true) {
            case $valorcesta < 50:
                echo "Los gastos de envío serán de 3'95€";
                break;
            case $valorcesta >= 50 && $valorcesta < 75:
                echo "Los gastos de envío serán de 2'95€";
                break;
            case $valorcesta >= 75 && $valorcesta < 100:
                echo "Los gastos de envío de 1'95€";
                break;
            case $valorcesta >= 100:
                echo "Los gastos de envío serán gratuitos";
                break;
            default:
                echo "Valor no válido";
        }
    }
    ?>
    
</body>
</html>