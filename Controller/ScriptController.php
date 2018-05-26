<?php
  
  namespace Website\Controller;
  
  use Website\App\Controller;
  
  class ScriptController extends Controller
  {
    public function script()
    {
      //on definit la vue et on retourne le resulat
      $this->renderView('script', []);
    }
  }
