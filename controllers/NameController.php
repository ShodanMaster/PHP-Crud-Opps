<?php

require_once("models/NameModel.php");

class NameController{

    private $nameModel;
    public function __construct() {
        $this->nameModel = new NameModel();
    }

    public function listUsers() {
        return $this->nameModel->getNames();
    }

    public function addName($name) {  
        $this->nameModel->addName($name);
    }


    public function handleRequest() {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
            $name = $_POST['name'] ?? '';
            echo $name;exit;
            if (!empty($name)) {
                $success = $this->addName($name);

                if ($success) {
                    header("Location: index.php?success=User Added");
                    exit();
                } else {
                    header("Location: index.php?error=Failed to add user");
                    exit();
                }
            }
        }
    }
}