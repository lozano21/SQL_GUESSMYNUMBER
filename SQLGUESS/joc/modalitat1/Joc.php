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

    //put your code here
    public $Max;
    public $num;
    public $modalitat;
    public $nivell;
    public $intents = 0;

    function __construct($Max,$modalitat,$nivell,$intents) {
        $this->Max = $Max;
        $this->NumRandom();
        $_SESSION['numIntents'] = 0;
        $this->modalitat = $modalitat;
        $this->nivell = $nivell;
        $this->intents = $intents;
    }

    public function NumRandom() {
        $this->num = rand(1, $this->Max);
    }

    function Metode1($numero) {
        $this->intents ++;
        if (($numero > 0) && ($numero <= $this->Max)) {
            if ($numero != $this->num) {
                if ($numero > $this->num) {
                    $this->Mayor();
                } elseif ($numero < $this->num) {
                    $this->Menor();
                }
            } else {
                echo 'FELICITATS! Has decobert el número';
                include_once '../../DatabaseProc.php';
                include_once '../../DatabasePDO.php';
                $db = new DatabaseProc("localhost", "root", "Hockey21$", "m07uf3");
                $db->connect();
                
                $a =  $db -> insert($this->modalitat, $this->nivell, $this->intents);
                //var_dump($a);
                //echo $a;
               // echo $this->modalitat;
                session_unset();
                session_destroy();
            }
        } else {
            echo '<script>';

            echo"    alert('Introdueix un número entre 1 i 10.')";

            echo'</script>';
        }
    }

    function Mayor() {
        $_SESSION['numIntents'] ++;
        echo '<p>El número és més petit</p>';
        echo "<p>numero d'intents: " . $_SESSION['numIntents'] . "</p>";
    }

    function Menor() {
        $_SESSION['numIntents'] ++;
        echo '<p>El número és mes gran</p>';
        echo "<p>numero d'intents: " . $_SESSION['numIntents'] . "</p>";
    }

}

?>