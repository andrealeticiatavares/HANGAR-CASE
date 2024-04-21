<?php
class Sql extends PDO {
    
    private $conn;
    private $servername = "192.168.1.11";
    private $username = "hangar";
    private $password = "abc@1234";
    private $database = "bigbang";

    public function __construct(){

        $this->conn = new PDO("mysql:host=" .$this->servername. ";dbname=". $this->database, $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    private function set_params($statment, $parameters = array()){
        foreach($parameters as $key => $value){

            $this->set_param($statment, $key, $value);

        }

    }

    private function set_param($statment, $key, $value){
        $statment->bindParam($key, $value);

    }

    public function generic_query($rawQuery, $params = array()){

        $stmt = $this->conn->prepare($rawQuery);

        $this->set_params($stmt, $params);

        $stmt->execute();

        return $stmt;

    }

    public function select($rawQuery, $params = array()):array{

        $stmt = $this->generic_query($rawQuery, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function insert($rawQuery, $params){
        $stmt = $this->conn->prepare($rawQuery);

        $this->set_params($stmt, $params);

        $stmt->execute();

        return $this->conn->lastInsertId();
    }

    public function update($rawQuery, $params){
        $stmt = $this->conn->prepare($rawQuery);

        $this->set_params($stmt, $params);

        $stmt->execute();

        return $this->conn->lastInsertId();
    }

    public function count_rows($rawQuery, $params = array()){

        $stmt = $this->generic_query($rawQuery, $params);
        //$rowC= $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $stmt->rowCount(); 

    }
}

?>