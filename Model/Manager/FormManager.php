<?php
  
  namespace Website\Model\Manager;
  
  use Website\Model\Entity\Form;
  
  class FormManager
  {
    private $error;
    private $dest;
    
    public function __construct()
    {
      $this->error = '';
      $this->dest = 'delgado.anthony@gmail.com';
    }
    
    public function getError()
    {
      return $this->error;
    }
    
    /**
     * @return bool|Form
     */
    public function isSubmitted()
    {
      if (isset($_POST['nom'], $_POST['courriel'], $_POST['sujet'], $_POST['message'])) {
        $accept = (!empty($_POST['accept']) && $_POST['accept'] == 'on') ? TRUE : FALSE;
        return new Form([
          "nom" => $_POST['nom'],
          "courriel" => $_POST['courriel'],
          "sujet" => $_POST['sujet'],
          "message" => $_POST['message'],
          "accept" => $accept,
        ]);
      } else {
        return FALSE;
      }
    }
    
    /**
     * Envoie le formulaire
     * Param array
     **/
    public function sendForm(Form $form)
    {
      //envoi du message
      $objet = '[anthonydelgado.fr via contact.php]';
      $contenu = '<p>Nom: ' . $form->getNom() . '</p>';
      $contenu .= '<p>Courriel: ' . $form->getCourriel() . '</p>';
      $contenu .= '<p>sujet: ' . $form->getSujet() . '</p>';
      $contenu .= '<p>Message: ' . $form->getMessage() . '</p>';
      $headers = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
      //ini_set ( "SMTP", "smtp.free.fr" );
      if (mail($this->dest, $objet, $contenu, $headers)) {
        return 'Votre message a &eacute;t&eacute; envoy&eacute;';
      } else {
        return FALSE;
      }
    }
    
    /**
     * @param Form $form
     */
    public function ValidFormulaire(Form $form)
    {
      try {
        $this->verifNom($form->getNom());
        $this->verifCourriel($form->getCourriel());
        $this->verifSujet($form->getSujet());
        $this->verifMessage($form->getMessage());
        $this->verifAccept($form->getAccept());
        
        $this->verifCaptcha();
      } catch (\Exception $e) {
        $this->error = $e->getMessage();
      }
    }
    
    /**
     * @param $nom
     * @throws \Exception
     */
    private function verifNom($nom)
    {
      if (empty($nom)) {
        throw new \Exception("Le Nom ne doit pas être vide !");
      }
    }
    
    /**
     * @param $courriel
     * @throws \Exception
     */
    private function verifCourriel($courriel)
    {
      if (empty($courriel)) {
        throw new \Exception("Le Courriel ne doit pas être vide !");
      }
      
      if (!preg_match("#^[A-Za-z0-9._-]+@[A-Za-z0-9._-]{2,}\.[a-z]{2,4}$#", $courriel)) {
        throw new \Exception("Le courriel n'est pas correct");
      }
    }
    
    /**
     * @param $sujet
     * @throws \Exception
     */
    private function verifSujet($sujet)
    {
      if (empty($sujet)) {
        throw new \Exception("Le Sujet ne doit pas être vide !");
      }
    }
    
    /**
     * @param $message
     * @throws \Exception
     */
    private function verifMessage($message)
    {
      if (empty($message)) {
        throw new \Exception("Le Message ne doit pas être vide !");
      }
    }
    
    /**
     * @param $accept
     * @throws \Exception
     */
    private function verifAccept($accept)
    {
      if (empty($accept)) {
        throw new \Exception("Il faut accepter les conditions d'utilisation du formulaire");
      }
    }
    
    /**
     * @throws \Exception
     */
    private function verifCaptcha()
    {
      /*google ReCaptcha*/
      $captcha = 0;
      $key = API_RECAPTCHA;
      $response = $_POST['g-recaptcha-response'];
      $ip = $_SERVER['REMOTE_ADDR'];
      $gapi = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $key . '&response=' . $response . '&remoteip=' . $ip . '';
      $json = json_decode(file_get_contents($gapi), TRUE);
      /*Fin Google ReCaptcha*/
      
      if (!$json['success']) {
        $error = 'Erreur ReCaptcha : ';
        foreach ($json['error-codes'] as $codeerror => $errorValue) {
          $error .= $errorValue;
        }
        throw new \Exception($error);
      }
    }
  }
