<?php
  
  namespace Website\Controller;
  
  use Website\App\Controller;
  use Website\Model\Manager\JeuManager;
  
  class GameController extends Controller
  {
    public function game()
    {
      //appel du jeuManager
      $jeuManager = new JeuManager();
      
      // on verif existance variables
      if (isset($_GET['nombre'])) { // premier jeu  : deviner un nombre
        $reponse = $jeuManager->devinezUnNombre($_GET['nombre']);
      } elseif (isset($_GET['result'])) { //second jeu : calcul
        $reponse = $jeuManager->jeuCalcul($_GET['result']);
      } else { // aucun des deux jeux
        $reponse = 'Entrez un nombre';
      }
      
      //on definit la vue et on retourne le resulat
      $this->renderView('jeu', [
        'reponse' => $reponse,
      ]);
    }
  }
