<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$text = 'credits.txt';
$open = fopen($text,'r');

$texto = fread($open, filesize($text));


$a = nl2br($texto);
echo $a;
echo '<p><a href="index.php">Tornar a mostrar la taula</a></p>';


