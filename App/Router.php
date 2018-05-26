<?php

namespace Website\App;

use Website\Controller\ErrorController;

class Router
{
    public function routeRequest(){
        $action = (isset($_GET['action'])) ? $_GET['action'] : 'Home';
        try{
            $this->loadController($action);
        } catch (\Exception $e){
            $errorController = new ErrorController();
            $errorController->run($e->getMessage());
        }
    }

    /**
     * @param $action
     * @throws \Exception
     */
    private function loadController($action){
        if(array_key_exists($action,ROUTES)) {
            $controllerName = 'Website\\Controller\\'.ROUTES[$action]['Controller'];
            $controllerAction = ROUTES[$action]['Action'];

            if(!class_exists($controllerName)){
                throw new \Exception('Erreur de chargement de la classe !');
            }
            $controller = new $controllerName();
            /*Run controller*/
            $controller->$controllerAction();

        }else{
            throw new \Exception('L\'action '.$action.' est introuvable');
        }

    }
}
