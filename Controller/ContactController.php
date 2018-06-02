<?php
  
  namespace Website\Controller;
  
  use Website\App\Controller;
  use Website\Model\Manager\FormManager;
  
  class ContactController extends Controller
  {
    public function contact()
    {
      //manager formulaire
      $formManager = new FormManager();
      $formulaire = FALSE;
      
      // Traitement du formulaire de contact
      if ($form = $formManager->isSubmitted()) {
        $formulaire = TRUE;
        $formManager->ValidFormulaire($form);
        if ($formManager->getError() != '') {
          $erreur = $formManager->getError();
        } elseif ($retour = $formManager->sendForm($form)) {
          $_SESSION['reponse_contact'] = $retour;
          //redirection vers contact
          header('Location: index.php?action=contact');
          exit;
        } else {
          $erreur = 'Votre message n\' a pas été envoyé, veuillez recommencer';
        }
      }
      //on definit la vue et on retourne le resulat
      $this->renderView('contact', [
        'formulaire' => $formulaire,
        'form' => $form,
        'erreur' => (isset($erreur)) ? $erreur : null,
      ]);
    }
    
  }
