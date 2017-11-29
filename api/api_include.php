<?php

$con=mysqli_init();
if (!$con){
  die("mysqli_init failed");
  }
  $host = "localhost";
  $database = "loyaltz4_beta";
  $user = "root";
  $password = "";
  
if (!mysqli_real_connect($con,$host,$user,$password,$database)){
  die("Connect Error: ".mysqli_connect_error());
  }
  
define('USER_CREATED_SUCCESSFULLY', 0);
define('USER_CREATE_FAILED', 1);
define('USER_ALREADY_EXISTED', 2);

define('USERNAME',"rodneyo");
define('APIKEY',"588f67cd56004f572bb576522c0afe32d151a243de866603d73df698334c1ec7");

// Firebase API Key
define('FIREBASE_API_KEY', 'AIzaSyBdAv9-bSnx8OZ0oJh9hvR_Qd5GJv94Rhs'); 

// push notification flags
define('PUSH_FLAG_OFFER', 1);
define('PUSH_FLAG_EVENT', 2);
define('PUSH_FLAG_PLACE', 3);

define('URL_UPLOADS',"uploads/");
define('URL_SERVER', "http://beta.loyaltyclub.co.ke/");

?> 