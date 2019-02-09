<?php

  /*Start session*/
  session_start();
  
  /*Run Application*/
  require('App/Application.php');
  $myApp = new \Website\App\Application();
  $myApp->run();
