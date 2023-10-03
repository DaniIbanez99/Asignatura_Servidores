<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica</title>
</head>
<body>
    <?php
        //Ejercicio 1
            //a
            echo "Ejercicio 1";
            echo "<br>";
            echo "a)";

                $var = "Hola";
                $var2 = "Mundo";
                $var3 = $var." ".$var2;
                
                echo $var3;

                //Aquí ponemos dos variables para la frase donde están separados, entonces ponemos una variable más para poder juntarlas con doble comilla y un punto al principio y al final.
            //b
            echo "<br>";
            echo "<br>";
            echo "b)";

                  $var4 = True;
                  
                  echo $var4;
            
                  // Ponemos una variable donde ponemos True sin comillas para que sea booleano.
            //c
            echo "<br>";
            echo "<br>";
            echo "c)";

                    $var5 = 3.14;

                    echo $var5;

                    //Ponemos la variable con valor float.

            //d
            echo "<br>";
            echo "<br>";
            echo "d)";

                    $var6 = array("valor1"=>"1","valor2"=>"2","valor3"=>"3");

                    print_r($var6);
            
                    //Un valor donde está puesto el array y entre comilla puesto los valores.

            //Ejercicio 2
            echo "<br>";
            echo "<br>";
            echo "Ejercicio 2";
            echo "<br>";
            echo "<br>";
            echo "-";

                    $var4 = False;
                    
                    echo $var4;

                    //Aqui modificamos el booleano de antes donde en vez de ser true es false.

            //Ejercicio 3
            echo "<br>";
            echo "<br>";
            echo "Ejercicio 3";
            echo "<br>";
            echo "<br>";
            echo "-";

                    $var3 = str_replace(" ","",$var3);

                    echo $var3;
                    
                    //Con la función "str_replace" podemos cambiar en una variable cualquier carácter
            
             //Ejercicio 4
             echo "<br>";
             echo "<br>";
             echo "Ejercicio 4";
             echo "<br>";
             echo "<br>";
             echo "-";

                    $var8 = "El operador “+“ sirve para sumar el valor de variables. Con la “/”podemos
                    dividir valores entre variables. El símbolo del dólar “\$“ indica que estamos
                    utilizando variables pero no lo usaremos en las constantes o globales";

                    echo $var8;

                    //Ponemos una variable con el texto.   

            //Ejercicio 5
            echo "<br>";
             echo "<br>";
             echo "Ejercicio 5";
             echo "<br>";
             echo "<br>";
             echo "-";

                    $var8 = strlen($var8);

                    echo $var8;

                    //Creamos una variable donde ponemos la función "strlen" para ver la longitud del string.

            //Ejercicio 6
            echo "<br>";
            echo "<br>";
            echo "Ejercicio 6";
            echo "<br>";
            echo "<br>";
            echo "-";

                    $var9 = array("a","e","i","o","u");
                    $var10 = str_replace($var9,"","Hello World");
                    echo $var10;

                    //Ponemos una variable en forma de array con todas las vocales, para despues con la función ("str_replace") para decir que con la variable del array todas esas vocales se quiten en dicha frase. 
            
           //Ejercicio 7
           echo "<br>";
           echo "<br>";
           echo "Ejercicio 7";
           echo "<br>";
           echo "<br>";
           echo "-"; 
           
                    $var11 = "";
                    $var12 = empty($var11);

                    echo $var12;

                    //utlizamos la función "empty" en dicha variable para saber si esta vacio o no, la varible que hemos puesto anteriormente.


            
          //Ejercicio 8
          echo "<br>";
          echo "<br>";
          echo "Ejercicio 8";
          echo "<br>";
          echo "<br>";
          echo "-"; 
                    $var13 ="Hello world";
                    $var14 = intval("$var13");

                    echo $var14;
                    
                    //Hacemos que la variable que es string, lo transformamos en entero con la función "intval"

         //Ejercicio 9
            //a
            echo "<br>";
            echo "<br>";
            echo "Ejercicio 9";
            echo "<br>";
            echo "<br>";
            echo "a)"; 

                    $var15 = sqrt(144);

                    echo $var15;

                    //Con la función "sqrt" hacemos la raíz cuadrada.

            echo "<br>";
            echo "<br>";
            echo "b)"; 

                    $var16 = pow(2,8);

                    echo $var16;

                    //Con la función "pow" se eleva el numero 2 por 8

            echo "<br>";
            echo "<br>";
            echo "c)"; 

                    $var17 = 100%6;

                    echo  $var17;

                    //En la variable "100%6" lo que hace es darnos el resto de dicha división

            echo "<br>";
            echo "<br>";
            echo "d)";
            
                    function mcd($a,$b) {
                        if($b==0)
                            return $a;
                        else 
                            return mcd($b,$a%$b);
                    }

                    echo mcd(3,6);

                    //En esta función lo llamamos "mcd" donde pondremos dos varibles "$a,$b", donde con una condicional le dices que si b es igual a 0 devuelva la variable a,
                    //pero con "else" que significa que si no se ha hecho esa condicional se tendrá que hacer de la otra manera. Que lo que devuelve es la variable "$b" con el resto de la división de "$a y $b"

    ?>
</body>
</html>