<?php 
    $title = 'Borrar Registro';

    require_once 'includes/header.php';
    require_once 'db/conn.php';
    if(!isset($_GET['id'])){
       include 'includes/errormessage.php'; 
       header("Location: viewrecords.php");
    } else {
        $id = $_GET['id'];
        $result = $crud->deleteAttendee($id);
        if($result){
            header("Location: viewrecords.php");
        } else {
            echo 'Error';
        }
    }
?>