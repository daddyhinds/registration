<?php

    //Development Connection
   // $host = '127.0.0.1';
   // $db = 'registration_db';
   // $user ='root';
    //$pass = '';
   //$charset = 'utf8mb4';
   //$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    //Remote Connection
    $host = 'remotemysql.com';
    $db = '9Xf7jXXzSt';
    $user ='9Xf7jXXzSt';
    $pass = 'o0uJzeeEo8';
    $charset = 'utf8mb4';
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try{
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    } catch(PDOException $e) {
        //echo "<h1 class = 'text- danger'>No Database Found</h1>";
        throw new PDOException($e-> getMessage());
    }

    require_once 'crud.php';
    require_once 'user.php';
    $crud = new crud($pdo);
    $user = new user($pdo);

    $user->insertUser("admin","password");

?>