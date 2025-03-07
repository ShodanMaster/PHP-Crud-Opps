<?php

require_once('../controllers/NameController.php');

$action = $_REQUEST['action'] ??'';

$nameController = new NameController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if(empty($action)){
        return json_encode(array('status'=> 400,'msg'=> 'Something Went Wrong!'));
    }
    
    if($action == 'create'){

        $name = $_POST['name'];

        $response = $nameController->addName($name);
        
        header(('Content-Type: application/json'));
        echo json_encode($response); 
    }

    if($action == 'update'){

        $id = $_POST['id'];
        $name = $_POST['name'];

        $response = $nameController->updateName($id, $name);
        
        header(('Content-Type: application/json'));
        echo json_encode($response); 
    }

    if($action == 'delete'){

        $id = $_POST['id'];

        $response = $nameController->deleteName($id);
        
        header(('Content-Type: application/json'));
        echo json_encode($response); 
    }
}
