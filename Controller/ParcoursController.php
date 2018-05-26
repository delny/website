<?php
  
  namespace Website\Controller;
  
  use Website\App\Controller;
  
  class ParcoursController extends Controller
  {
    public function parcours()
    {
      //on definit la vue et on retourne le resulat
      $this->renderView('parcours', []);
    }
  }
