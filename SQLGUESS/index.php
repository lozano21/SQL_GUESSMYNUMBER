<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title>Mòdul 07 UF's 3 i 4</title>
        <link rel="stylesheet" href="mystyle.css" >
        <script src="js/my_functions.js"></script>
    </head>
    <body onload="showEstadistiques('Totes')">
        <?php
        include_once 'DatabaseOOP.php';
        include_once 'DatabaseProc.php';
        include_once 'DatabasePDO.php';
        include_once 'EstadistiquesRow.php';
        ?>
        <form action="credits.php">
            <input type="submit" value="Credits" />
        </form>
        <?php
        echo "<a style='float:right' href='joc/index.php'>Anar al Joc</a>";
        echo "<h1>GUESS NUMBER</h1>";
        echo "<h2>Estadistiques</h2>";
        $db = new DatabaseProc("localhost", "root", "Hockey21$", "m07uf3");
        $db->connect();
        try {

            echo DatabaseProc::TABLE_START;
            $a = $db->selectAll();
            ?>
        <form  method="POST" style="">
            <p> Eliminar: <input type="Text" name="id"><input type="submit" id="delete" value="Esborrar" formaction="delete.php" ></p>
                    <br>
                    <p>      Buscar: <input type="number" placeholder="id" name="id2"><input type="submit" value="Ejecutar" formaction="find.php"> </p>
                    <br>
                    <p>Modificar: <input type="number" placeholder="id" name="id3">
                    <select name="moda">
                        <option value="HUMA">HUMA</option>
                        <option value="MAQUINA">MAQUINA</option>
                    </select>
                    <input type="number" placeholder="Nivell" name="nivell" max="3" min="1">
                    <input type="date" placeholder="Data" name="date">
                    <input type="number" placeholder="Intents" name="intents" min="1">
                    <input type="submit" value="Ejecutar" formaction="update.php"></p>
            </form>
                    <?php
                    $db->showAll($a);
                } catch (Exception $error) {
                    echo "connection failed: " . $error->getMessage();
                }
                DatabaseProc::TABLE_END
                ?>
                </body>
                </html>
