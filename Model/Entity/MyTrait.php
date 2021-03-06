<?php
  namespace Website\Model\Entity;
  Trait MyTrait {
    
    /**
     * @param array $donnees
     */
    public function hydrate(array $donnees)
    {
      foreach($donnees as $key => $value)
      {
        $method = 'set'.ucfirst($key);
        if (method_exists($this,$method))
        {
          $this->$method($value);
        }
      }
    }
    
  }
