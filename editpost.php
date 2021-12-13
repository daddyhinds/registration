<?php 
require_once 'db/conn.php';


//Get values from post operation
if(isset($_POST['submit'])){
    //extract values from the $_POST array
    $id = $_POST['id'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $address = $_POST['homeaddress'];
    $dop = $_POST['dop'];
    $email = $_POST['email'];
    $trn = $_POST['trn'];
    $mtype = $_POST['mtype'];


//Call crud function
    $result = $crud->editRegistrant($id,$fname, $lname, $gender, $address, $dop, $email,$trn, $mtype);

//Redirect to index.php
    if($result){
        header("Location: viewrecords.php");  
    }
    else{
        include 'includes/errormessage.php';

    }
}
else{
    include 'includes/errormessage.php';

}


?>