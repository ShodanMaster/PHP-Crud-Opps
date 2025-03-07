<?php

require_once('../controllers/NameController.php');

// print_r($_REQUEST);exit;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';
    // echo $action;exit;
    // print_r($_POST);exit;

    $nameController = new NameController();
    if(empty($action)){
        return json_encode(array('status'=> 400,'msg'=> 'Something Went Wrong!'));
    }

    if($action == 'create'){
        // echo "INSIDE";exit;

        $name = $_POST['name'];
        // echo $name;exit;

        $response = $nameController->addName($name);
        
        header(('Content-Type: application/json'));
        echo json_encode($response); 
    }

    if($action == 'update'){

        $id = $_POST['id'];
        $name = $_POST['name'];
        // echo $name;exit;

        $response = $nameController->updateName($id, $name);
        
        header(('Content-Type: application/json'));
        echo json_encode($response); 
    }

    if($action == 'delete'){

        $id = $_POST['id'];
        // echo $name;exit;

        $response = $nameController->deleteName($id);
        
        header(('Content-Type: application/json'));
        echo json_encode($response); 
    }
}
