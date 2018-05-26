<?php
  
  namespace Website\Controller;
  
  
  use Website\App\Controller;
  use Website\Model\Manager\CalculManager;

  class ApiController extends Controller
  {
    private $calculManager;
    
    public function __construct()
    {
      $this->calculManager = new CalculManager();
    }
  
    public function api(){
      $request = $_POST;
      $data = $this->calculManager->calcul($request);
      echo json_encode($data);
    }
  }