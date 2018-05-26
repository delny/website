<?php
  
  namespace Website\Controller;
  
  use Website\App\Controller;
  
  class CreditsController extends Controller
  {
    public function credits()
    {
      //on definit la vue et on retourne le resulat
      $this->renderView('credits', []);
    }
    
  }
