<?php

include_once 'DatabaseConnection.php';

/**
 * Implementació de la clase DatabaseConnection segons el model OOP,
 * Object Oriented Programming.
 *
 * @author Pep
 */
class DatabaseOOP extends DatabaseConnection {

    const TABLE_START = "<table align='center'; style='border: solid 1px black;'><tr style='background: grey;'><th>Id</th><th>Modalitat</th><th>Nivell</th><th>Data</th><th>Intents</th></tr>";
    const TABLE_END = "</table>";

    private $database;

    public function __construct($servername, $username, $password, $database) {
        parent::__construct($servername, $username, $password);
        $this->database = $database;
    }

    //put your code here
    public function connect(): void {
        $this->connection = new mysqli($this->servername, $this->username, $this->password);
        // Check connection
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
            $this->connection = null;
        }
    }

    public function insert($modalitat, $nivell, $intents): int {
        $sql = "INSERT INTO estadistiques (modalitat, nivell, intents) VALUES ('$modalitat', $nivell, $intents)";
        if ($this->connection != null) {
            if ($this->connection->query($sql) === TRUE) {
                return $this->connection->insert_id;
            } else {
                return -1;
            }
        }
    }

    public function selectAll() {
        $sql = "SELECT id, modalitat, nivell, data_partida, intents FROM estadistiques";
        $result = null;
        if ($this->connection != null) {
            $result = $this->connection->query($sql, MYSQLI_USE_RESULT);
        }
        return $result;
    }
    public function showAll($sql) {
        for ($i = 0; $i < count($sql); $i++) {
            
            echo "<tr>";
            //var_dump($sql);
            for ($j = 0; $j < count($sql[$i]); $j++) {
                
                echo "<td style='width:150px;border:1px solid black;'>" . $sql[$i][$j] . "</td>";
            }
            echo "</tr>";
        }
    }

    public function selectByModalitat($modalitat) {
        $sql = "SELECT id, modalitat, nivell, data_partida, intents FROM estadistiques WHERE modalitat = '$modalitat'";
        $result = null;
        if ($this->connection != null) {
            $result = $this->connection->query($sql, MYSQLI_USE_RESULT);
        }
        return $result;
    }

    public function delete($id){
        $sql = "DELETE FROM estadistiques where id = " .$id;
        $result = null;
        if ($this->connection != null) {
            $result = mysqli_query($this->connection, $sql);
        }
    }
    
    public function findById($id) {
        $sql = "SELECT * FROM estadistiques WHERE id =" . $id;
        $result = $this->connection->query($sql, MYSQLI_USE_RESULT);
        
        if($result == TRUE){
           $r = $result->fetch_all();
           return $r[0];
        }else{
            echo $sql;
             var_dump($result);
        } 
        return $result;
  
    }
    public function update(\estadistica $estadistica) {
        
        $sql = "UPDATE estadistiques SET modalitat ='".$estadistica->modalitat."',nivell='".$estadistica->nivell."', data_partida='".$estadistica->data."',intents='".$estadistica->intents."' WHERE id=". $estadistica->id;
        if ($this->connection != null) {
            $result = $this->connection->query($sql, MYSQLI_USE_RESULT);
        }
        
    }

}
