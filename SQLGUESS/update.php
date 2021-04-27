<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'DatabaseProc.php';
include_once 'DatabaseOOP.php';
include_once 'estadistiques.php';

$db = new DatabaseProc("localhost", "root", "Hockey21$", "m07uf3");
$db->connect();
$db->update(new estadistica($_POST['id3'], $_POST['moda'], $_POST['nivell'], $_POST['date'], $_POST['intents']));

sleep(1.5);
header("Location: ./index.php");

