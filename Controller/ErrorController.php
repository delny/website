<?php
  
  namespace Website\Controller;
  
  use Website\App\Controller;
  
  class ErrorController extends Controller
  {
    /**
     * @param $error
     */
    public function run($error)
    {
      $this->renderView('erreur', [
        'error' => $error,
      ]);
    }
  }
  