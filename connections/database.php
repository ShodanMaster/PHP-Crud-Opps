<?php 

class dbConfig{
    public $connection;

    public function __construct() {
        $this->dbConnect();
    }
    public function dbConnect(){
        $this->connection = mysqli_connect("localhost", "root","","crud");

        if(mysqli_connect_error()){
            die("Error: ".mysqli_connect_error());
        }
    }

    public function getConnection() {
        return $this->connection;
    }
}

$db = new dbConfig();
$conn = $db->getConnection();