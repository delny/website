<?php
  
  namespace Website\Model\Manager;
  class JeuManager
  {
    
    /*Temps de jeu*/
    public function devinezUnNombre($nombre)
    {
      // si le nombre a deviner existe
      if (isset($_SESSION['nombreMystere']) AND $_SESSION['nombreMystere']) {
        $nombreMystere = $_SESSION['nombreMystere'];
      } else {
        $nombreMystere = rand(0, 100);
        $_SESSION['nombreMystere'] = $nombreMystere;
        $_SESSION['nbre_essais'] = 1;
        $_SESSION['heureDebutJeu'] = date('H:i:s');
      }
      // on compare
      if ($nombre > $nombreMystere) {
        $reponse = 'C\'est moins';
        $_SESSION['nbre_essais']++;
      } elseif ($nombreMystere > $nombre) {
        $reponse = 'C\'est plus';
        $_SESSION['nbre_essais']++;
      } else {
        $heureDebutJeu = $_SESSION['heureDebutJeu'];
        $timeplay = $this->difftime($heureDebutJeu);
        $reponse = 'C\'est gagn&eacute; en ' . $_SESSION['nbre_essais'] . ' fois et en ' . $timeplay . '. Vous pouvez rejouer tout de suite';
        $_SESSION['nombreMystere'] = FALSE;
      }
      return $reponse;
    }
    
    /*Jeu 1 : devinez un nombre*/
    
    public function difftime($heure_debut)
    {
      $heure = date('H:i:s');
      
      $timestamp = strtotime($heure);
      $timestamp_debut = strtotime($heure_debut);
      
      $difference = $timestamp - $timestamp_debut;
      
      $s = $difference % 60;
      $tmp = ($difference - $s) / 60;
      $m = $tmp % 60;
      $tmp = ($tmp - $m) / 60;
      $h = $tmp % 24;
      
      if ($h == 0) {
        if ($m == 0) {
          return $s . ' secondes';
        } elseif ($m == 1) {
          return $m . ' minute et ' . $s . ' secondes';
        } else {
          return $m . ' minutes et ' . $s . ' secondes';
        }
      } elseif ($h == 1) {
        return $h . ' heure ' . $m . ' minutes et ' . $s . ' secondes';
      } else {
        return $h . ' heures ' . $m . ' minutes et ' . $s . ' secondes';
      }
    }
    
    /*Jeu 2 : jeu de calcul*/
    
    public function jeuCalcul($result)
    {
      // si le jeu a demarre
      if (isset($_SESSION['game_statut']) && $_SESSION['game_statut'] == 1) {
        // on verifie le score du joueur
        if ($_SESSION['score'] > 0) {
          // on verifie si le joueur a bon
          $quizz = $_SESSION['quizz'];
          if ($quizz == $result) {
            $_SESSION['toto']++;
            if ($_SESSION['toto'] < 20) {
              $returnTab = $this->calculRandom();
              $_SESSION['quizz'] = $returnTab['quizz'];
              $_SESSION['quizzp'] = $returnTab['quizzp'];
            } else {
              $heure_debut = $_SESSION['heure_debut'];
              $_SESSION['quizzp'] = 'Votre score est de ' . $_SESSION['score'] . ' sur 20';
              $_SESSION['quizzp'] .= ' en un temps de ' . $this->difftime($heure_debut) . '';
              $_SESSION['game_statut'] = 0;
            }
          } else {
            $_SESSION['score'] = $_SESSION['score'] - 1;
          }
        } else {
          $_SESSION['quizzp'] = 'Votre score est de ' . $_SESSION['score'] . ' sur 20';
          $_SESSION['game_statut'] = 0;
        }
        
      } else { // on lance le jeu
        $returnTab = $this->calculRandom();
        $_SESSION['quizz'] = $returnTab['quizz'];
        $_SESSION['quizzp'] = $returnTab['quizzp'];
        $_SESSION['toto'] = 0;
        $_SESSION['score'] = 20;
        $_SESSION['game_statut'] = 1;
        $_SESSION['heure_debut'] = date('H:i:s');
      }
    }
    
    public function calculRandom()
    {
      $a = rand(2, 5);
      $b = rand(2, 5);
      
      return [
        "quizz" => $a * $b,
        "quizzp" => ' ' . $a . ' x ' . $b . ' ?',
      ];
    }
  }
