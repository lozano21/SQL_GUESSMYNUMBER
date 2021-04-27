<?php
include_once 'DatabaseOOP.php';
        include_once 'DatabaseProc.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$db = new DatabaseProc("localhost", "root", "Hockey21$", "m07uf3");
$db->connect();
var_dump($_POST['id']);
$db -> delete($_POST['id']);

sleep(1);
header("Location: index.php");