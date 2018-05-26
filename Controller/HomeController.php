<?php
  
  namespace Website\Controller;
  
  use Website\App\Controller;
  use Website\Model\Manager\Manager;
  
  class HomeController extends Controller {
    public function home()
    {
      //recuperation du manager
      $manager = new Manager();
      
      // recuperation du bonjour
      $donnees = $manager->getBonjour();
      $bonjour = $donnees['contenu'];
      $bonjour_l = $donnees['langue'];
      
      //recherche de la dernière visite de cette ip
      $lastVisite = $manager->getLastVisite($_SERVER['REMOTE_ADDR']);
      
      $souvenirLastVisite = ($lastVisite) ? 'Je me rappelle de vous, vous &ecirc;tes venu pour la premi&egrave;re fois le ' . $lastVisite . '.' : 'Je sais que c\'est la premi&egrave;re fois que vous visitez ce site.';
      
      //on definit la vue et on retourne le resulat
      $this->renderView('accueil', [
        'bonjour' => $bonjour,
        'bonjour_l' => $bonjour_l,
        'souvenirLastVisite' => $souvenirLastVisite,
      ]);
    }
  }
