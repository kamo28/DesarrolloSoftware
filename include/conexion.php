<?php
  function OpenCon(){
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "root";
    $db = "harina";
    // $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);

    return $conn;
  }

  function CloseCon($conn){
    $conn -> close();
  }
?>