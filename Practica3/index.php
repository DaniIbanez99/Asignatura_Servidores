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
               <input type="number" id="name" name="valorcesta" value="">
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
               <input type="number" id="name" name="valorcesta" value="" >
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
    <!--Ejercicio 3-->
    <div id="titulo">
        <h1>Ejercicio 3</h1>
    </div>
    <form action="index.php" method="post">
            <div class="grupos">
                <label for="name">Pon 5 números</label>
               <input type="number" id="name" name="valorcesta1" value="" >
               <input type="number" id="name" name="valorcesta2" value="" >
               <input type="number" id="name" name="valorcesta3" value="" >
               <input type="number" id="name" name="valorcesta4" value="" >
               <input type="number" id="name" name="valorcesta5" value="" >
               <input type="submit" id="calculo" name="calculo">
            </div>
        </form>
    <?php
        if(isset($_POST["calculo"])){
            $valores = array(
                $_POST["valorcesta1"],
                $_POST["valorcesta2"],
                $_POST["valorcesta3"],
                $_POST["valorcesta4"],
                $_POST["valorcesta5"]
            );
            $mayor = $valores[0];

            for ($i = 0; $i < 5; $i++ ){
                if($valores[$i] > $mayor){
                    $mayor = $valores[$i];
                }
            }
           echo "El número mayor es $mayor";
        }   
    ?>
     <!--Ejercicio 4-->
     <div id="titulo">
        <h1>Ejercicio 4</h1>
    </div>
    <form action="index.php" method="post">
    <input type="submit" id="calculo" name="calculo1">
    </form>
    <?php
     if(isset($_POST["calculo1"])){
        $valores =array(array(3,1), array(2,0));

        foreach ($valores as $fila){
           foreach ($fila as $elemento){
                echo "$elemento";
           }
               echo "<br>" ;
        }
     }
    ?>
     <!--Ejercicio 5-->
     <div id="titulo">
        <h1>Ejercicio 5</h1>
    </div>
    <form action="index.php" method="post">
    <input type="submit" id="calculo" name="calculo2">
    </form>
    <?php
     if(isset($_POST["calculo2"])){
        $valores =array(array(1,0), array(0,1));

        foreach ($valores as $fila){
           foreach ($fila as $elemento){
                echo "$elemento" + "$elemento";
           }
               echo "<br>" ;
        }
     }
    ?>
</body>
</html>