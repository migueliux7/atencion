<?php
   //LOCAL
  // $host = 'localhost:3307';
   // $db = 'attendance_db';
   // $user = 'root';
   // $pass = '';
    
    $host = 'remotemysql.com';
     $db = 'lcehMllQSX';
     $user = 'lcehMllQSX';
     $pass = 'fhlW1q7yA0';

    $charset = 'utf8mb4';
    //PROD
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try {
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
    } catch (PDOException $th) {
        throw new PDOException($th->getMessage());
    }
    require_once 'crud.php';
    require_once 'user.php';
    $crud = new crud($pdo);
    $user = new user($pdo);
    $user->insertUser("admin", "password");
?>