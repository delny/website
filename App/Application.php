<?php

namespace Website\App;

class Application
{
    public function run (){
        /*load autoloader*/
        require('App/Autoloader.php');
        \Website\App\Autoloader::register();

        /*load Configuration*/
        require ('Config/parameters.php');
        require ('Config/routing.php');

        /*routeRequest*/
        $router = new Router();
        $router->routeRequest();
    }
}
