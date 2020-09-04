<?php
    include 'databaseinfo.php';
    session_start();
    $dbName = $_SESSION["dbName"];
    unset($_SESSION["dbName"]);
    $conn = mysqli_connect($servername,$username,$password,$dbName);
    $sql ="DROP DATABASE $dbName";
    mysqli_query($conn,$sql);
    header("location: ../index.php");

 ?>
