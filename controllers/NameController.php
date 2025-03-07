<?php

// include_once("../models/NameModel.php");
include_once(__DIR__ . "/../models/NameModel.php");

class NameController{

    private $nameModel;
    public function __construct() {
        $this->nameModel = new NameModel();
    }

    public function listNames() {
        return $this->nameModel->getNames();
    }

    public function addName($name) {  
        $transaction = $this->nameModel->addName($name);
    
        if ($transaction) {
            return [
                'status' => 200,
                'message' => 'Value Inserted!',
            ];
        }
    
        return [
            'status' => 400,
            'message' => 'Value Not Inserted',
        ];
    }    

    public function updateName($id,$name) {

        $transaction = $this->nameModel->updateName($id, $name);
        if ($transaction) {
            return [
                'status'=> 200,
                'message'=> 'Name Updated',
            ];
        }
        return [
            'status'=> 400,
            'message'=> 'Name Not Upated',
        ];
    
    }

    public function deleteName($id) {

        $transaction = $this->nameModel->deleteName($id);
        if ($transaction) {
            return [
                'status'=> 200,
                'message'=> 'Name Deleted',
            ];
        }
        return [
            'status'=> 400,
            'message'=> 'Name Not Deleted',
        ];
    
    }
}