<?php
  function OpenCon(){
    $user ="root";
    $password="root";
    $host="localhost";
    $port="3307";
    $db="harina";
    $link = mysqli_init();
    $conn = mysqli_real_connect($link,$host,$user,$password,$db,$port);

    if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    $con=mysqli_connect($host,$user,$password,$db,$port);

    return $con;
  }

  function CloseCon($con){
    $con -> close();
  }
?>