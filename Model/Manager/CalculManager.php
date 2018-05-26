<?php
  
  namespace Website\Model\Manager;
  
  
  class CalculManager
  {
    public function calcul($request)
    {
      $scriptId = !empty($request['scriptid']) ? $request['scriptid'] : 0;
      if(empty($scriptId)){
        return [
          'erreur' => 'erreur script',
        ];
      }
      $method = 'calculScript'.$scriptId;
      if(method_exists($this,$method)){
        return $this->$method($request);
      } else{
        return [
          'erreur' => 'erreur script',
        ];
      }
    }
    
    private function calculScript1($request)
    {
      return 'test001';
    }
  }