<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <title> Descobrindo seu IMC </title>

    </head>

    <body>
        <p> Cálculo IMC: </p>
             <form>  
                Peso <input name="peso">
                <br />   
                Altura <input name="altura">
                <br />

                <button>Converter para IMC </button>
                  </form>
        <?php

         if (isset($_GET["peso"]) & isset($_GET["altura"]) ) {

         $peso = $_GET["peso"];
         $altura = $_GET["altura"];
         $imc = ($peso / ($altura * $altura));

        
         echo  "<p>O seu IMC é $imc</p>";

         if ($imc <= 18.5) {
            echo "<p> Muito magro </p>";
        } else if ($imc < 24.9) {
            echo "<p> Normal </p>";
        } else if ($imc < 29.9) {
            echo "<p> Sobrepeso </p>";
        } else if ($imc < 34.9) {
            echo "<p> Obeso grau I </p>";
        } else if ($imc < 39.9) {
            echo "<p> Obeso grau II </p>";
        } else {
            echo "<p> Obesidade mórbida </p>";
        }
       } 

         ?>

    </body>

    </html>  