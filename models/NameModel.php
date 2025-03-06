<?php
require_once(__DIR__ . "/../connections/database.php");

class NameModel {
    private $conn;

    public function __construct() {
        $db = new dbConfig();
        $this->conn = $db->getConnection();
    }

    public function getNames() {
        $sql = "SELECT * FROM names";
        $result = mysqli_query($this->conn, $sql);

        if (!$result) {
            die("Query failed: " . mysqli_error($this->conn));
        }

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function addName($name) {
        // echo "Model: ".$name;exit;
        try {
            $this->conn->begin_transaction();
    
            $sql = "INSERT INTO names(name) VALUES(?)";
            $stmt = mysqli_prepare($this->conn, $sql);
    
            if (!$stmt) {
                throw new Exception("Prepare failed: " . mysqli_error($this->conn));
            }
    
            mysqli_stmt_bind_param($stmt, "s", $name);
            $result = mysqli_stmt_execute($stmt);
    
            if (!$result) {
                throw new Exception("Insert failed: " . mysqli_error($this->conn));
            }
    
            $this->conn->commit();
            mysqli_stmt_close($stmt);
    
            return true;
    
        } catch (Exception $e) {
            $this->conn->rollback();
            error_log("Database Error: " . $e->getMessage());
            return false;
        }
    }
    
}

?>
