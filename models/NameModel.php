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
        $sql = "INSERT INTO names(name) values(?)";
        $stmt = mysqli_prepare($this->conn, $sql);

        if (!$stmt) {
            die("Prepare failed: " . mysqli_error($this->conn));
        }

        mysqli_stmt_bind_param($stmt, "s", $name);
        $result = mysqli_stmt_execute($stmt);

        if (!$result) {
            die("Insert failed: " . mysqli_error($this->conn));
        }
        mysqli_stmt_close($stmt);


        return $result;
    }
}
$controller = new NameController();
$controller->handleRequest();

?>
