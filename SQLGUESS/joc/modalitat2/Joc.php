<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Joc
 *
 * @author urii2
 */
class Joc {

    public $Max;
    public $Min;
    public $torn;
    public $num;
    public $numero;
    public $modalitat;
    public $nivell;
    public $intents = 0;

    function __construct($Max, $Min,$modalitat,$nivell,$intents) {
        $this->Max = $Max;
        $this->Min = $Min;
        $this->NumRandom();
        $_SESSION['numIntents'] = 0;
        $this->modalitat = $modalitat;
        $this->nivell = $nivell;
        $this->intents = $intents;
    }

    public function NumRandom() {
        $this->num = rand($this->Min, $this->Max);
    }

    function Metode2() {
        
        if (isset($_POST['comencar'])) {
            $this->intents ++;
            $this->numero = ($this->Max) / 2;
            echo '<p>El número és: ' . $this->numero . '</p>';
        } elseif (isset($_POST['gran'])) {
            $this->intents ++;
            $this->Min = $this->numero;
            $this->numero = round(($this->Max + $this->Min ) / 2);
            echo '<p>El número és: ' . $this->numero . '</p>';
            $_SESSION['numIntents'] ++;
            echo '<p>El número és més gran</p>';
            echo "<p>numero d'intents: " . $_SESSION['numIntents'] . "</p>";
        } elseif (isset($_POST['petit'])) {
            $this->intents ++;
            $this->Max = $this->numero;
            $this->numero = round(($this->Max + $this->Min ) / 2);
            echo '<p>El número és: ' . $this->numero . '</p>';
            $_SESSION['numIntents'] ++;
            echo '<p>El número és més petit</p>';
            echo "<p>numero d'intents: " . $_SESSION['numIntents'] . "</p>";
        } elseif (isset($_POST['si'])) {
            echo 'FELICITATS! Has decobert el número';
            include_once '../../DatabaseProc.php';
            include_once '../../DatabaseOOP.php';
            $db = new DatabaseProc("localhost", "root", "Hockey21$", "m07uf3");
            $db->connect();
            $db->insert($this->modalitat, $this->nivell, $this->intents);
            session_unset();
            session_destroy();
        }
    }

}
