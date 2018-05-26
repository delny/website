<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  /*Start session*/
  session_start();
  
  /*Run Application*/
  require('App/Application.php');
  $myApp = new \Website\App\Application();
  $myApp->run();
