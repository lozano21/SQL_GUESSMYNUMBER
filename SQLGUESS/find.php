<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'DatabasePDO.php';
include_once 'DatabaseProc.php';
include_once 'DatabaseOOP.php';
        
        
$db = new DatabaseProc("localhost", "root", "Hockey21$", "m07uf3");
$db->connect();
$l = $db->findById($_POST['id2']);

echo "<table><tr>";

for($i = 0; $i<count($l); $i++){
    echo "<td style='background-color: Yellow; border: 2px solid black; color: black; width: 1024px'>" . $l[$i] . "</td>";
}

echo "</tr></table>";
 echo '<p><a href="index.php">Tornar a mostra la taula</a></p>';