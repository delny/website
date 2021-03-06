<?php
  
  namespace Website\Model\Entity;
  class Form {
    
    use MyTrait;
    
    private $nom;
    private $courriel;
    private $sujet;
    private $message;
    private $accept;
    
    
    /**
     * Form constructor.
     * @param $donnees
     */
    public function __construct($donnees)
    {
      $this->hydrate($donnees);
    }
    
    /**
     * @return mixed
     */
    public function getNom()
    {
      return $this->nom;
    }
    
    /**
     * @param mixed $nom
     * @return Form
     */
    public function setNom($nom)
    {
      $this->nom = $nom;
      return $this;
    }
    
    /**
     * @return mixed
     */
    public function getCourriel()
    {
      return $this->courriel;
    }
    
    /**
     * @param mixed $courriel
     * @return Form
     */
    public function setCourriel($courriel)
    {
      $this->courriel = $courriel;
      return $this;
    }
    
    /**
     * @return mixed
     */
    public function getSujet()
    {
      return $this->sujet;
    }
    
    /**
     * @param mixed $sujet
     * @return Form
     */
    public function setSujet($sujet)
    {
      $this->sujet = $sujet;
      return $this;
    }
    
    /**
     * @return mixed
     */
    public function getMessage()
    {
      return $this->message;
    }
    
    /**
     * @param mixed $message
     * @return Form
     */
    public function setMessage($message)
    {
      $this->message = $message;
      return $this;
    }
    
    /**
     * @return mixed
     */
    public function getAccept()
    {
      return $this->accept;
    }
    
    /**
     * @param mixed $accept
     * @return Form
     */
    public function setAccept($accept)
    {
      $this->accept = $accept;
      return $this;
    }
    
    
    
  }
