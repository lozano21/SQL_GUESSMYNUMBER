<?php
include_once 'Joc.php';
require_once 'Joc.php';
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="../style.css" type="text/css" rel="stylesheet"/>
    </head>
    <body>
        <h2>MODALITAT 2</h2>
        <div>
            <?php

            $nivell = "Nivell 3";
            echo "<h1>Benvingut al " . $nivell . "</h1>";
            ?>

            <form action="nivell3-2.php" method="POST">
                <input type="submit" id='comencar' name='comencar' value="COMENÇAR"/>
                <br>
                <input type="submit" id='si' name='si' value="SI"/>
                <input type="submit" id="gran" name='gran' value="MÉS GRAN"/>
                <input type="submit" id="petit" name='petit' value="MÉS PETIT"/>
            </form>


            <?php
                if(!isset($_SESSION['joc'])){

               $num = new Joc(100, 1,"Maquina",3,0);
              
                
                $_SESSION['joc'] = serialize($num);
                
                }else{
                    $num = unserialize($_SESSION['joc']);
                   
                    
                    
                    //$n = $_POST['si'];
                    
                    
                    $num->Metode2(/*intval($n)*/);
                    
                    
                    $_SESSION['joc'] = serialize($num);
                }
                
           
            
            ?>
            <h3><a href="../index.php">Tornar a la pàgina d'inici</a></h3>
        </div>
    </body>
</html>