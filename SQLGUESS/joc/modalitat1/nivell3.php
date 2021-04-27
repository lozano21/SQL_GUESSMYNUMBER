<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
        <h2>MODALITAT 1</h2>
        <div>
            <?php
            
            $nivell = "Nivell 3";
            echo "<h1>Benvingut al " . $nivell . "</h1>";
            
            ?>

            <form action="nivell3.php" method="POST">
                <input type="text" id="descobrir" name="descobrir"/>
                <input type="submit" id='enviar' name='enviar'/>
            </form>


            <?php
            
            
                if(!isset($_SESSION['joc'])){

                $joc = new Joc(100,"Huma",3,0);
              
                
                $_SESSION['joc'] = serialize($joc);
                
                }else{
                    $joc = unserialize($_SESSION['joc']);
                   
                    
                    
                    $n = $_POST['descobrir'];
                    
                    $joc->Metode1(intval($n));
                    
                    
                    $_SESSION['joc'] = serialize($joc);
                }
                
           
            ?>
            
            <h3><a href="../index.php">Tornar a la pàgina d'inici</a></h3>
        </div>
    </body>
</html>
