<?php
// so the data base name is the name of the file
require 'databaseinfo.php';
session_start();


$file = $_FILES['csvfile']['tmp_name'];
$filename= explode(".",$_FILES['csvfile']['name']);
$dbName = str_replace(' ', '', $filename[0]);
$_SESSION["dbName"] = $dbName;

$conn = mysqli_connect($servername, $username, $password);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$creatSql = "CREATE DATABASE $dbName";
if (mysqli_query($conn,$creatSql)) {
  mysqli_close($conn);
  $conn = mysqli_connect($servername,$username,$password,$dbName);
  // if the file is csv work if not do nothing
  if ($filename[1] == 'csv') {
    $handle = fopen($file,"r");
    $i = 0;
    while ($data = fgetcsv($handle)) {
      $client = mysqli_real_escape_string($conn, $data[0]);
      $deal = mysqli_real_escape_string($conn, $data[1]);
      $hour = mysqli_real_escape_string($conn, $data[2]);
      $accepted = mysqli_real_escape_string($conn, $data[3]);
      $refused = mysqli_real_escape_string($conn, $data[4]);

      if ($i==0) {
        $sql = "CREATE TABLE CSV ($client VARCHAR(50), $deal VARCHAR(50), $hour VARCHAR(50), $accepted VARCHAR(50), $refused VARCHAR(50))";

      }
      else {
        $sql ="INSERT INTO CSV  VALUES ('$client','$deal','$hour','$accepted','$refused')";
      }
      mysqli_query($conn, $sql);
      $i++;
    }
    fclose($handle);
    mysqli_close($conn);
    header("location: ../index2.php");
  }


}
else {
  die("Error creating database: " . $conn->error);
}
