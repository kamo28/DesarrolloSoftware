<?php
  function OpenCon(){
    // $dbhost = "localhost";
    // $dbuser = "root";
    // $dbpass = "root";
    // $db = "harina";
    // // $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
    // $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);


    $user ="root";
    $password="root";
    $host="localhost";
    $port="3307";
    $db="harina";
    $link = mysqli_init();
    $con = mysqli_real_connect($link,$host,$user,$password,$db,$port);

    if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $con=mysqli_connect($host,$user,$password,$db,$port);

    return $con;
  }

  function CloseCon($conn){
    $conn -> close();
  }
?>