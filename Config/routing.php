<?php

/*
 *  Routes Configuration
 */

/*Compatible only with php 7 or higher*/
define('ROUTES', [
    /**
     * To add a route, follow this example :
     * '{Name on the action}' => ['Controller' => '{controller name}','Action' => ' method of controller to call'],
     */
    'Home' => ['Controller' => 'HomeController','Action' => 'home'],
    'contact' => ['Controller' => 'ContactController','Action' => 'contact'],
    'credits' => ['Controller' => 'CreditsController','Action' => 'credits'],
    'game' => ['Controller' => 'GameController','Action' => 'game'],
    'parcours' => ['Controller' => 'ParcoursController','Action' => 'parcours'],
    'script' => ['Controller' => 'ScriptController','Action' => 'script'],
    'scriptgenformcontact' => ['Controller' => 'ScriptGenerateFormContactController','Action' => 'ScriptGenerateFormContact'],
    'api' => ['Controller' => 'ApiController','Action' => 'api'],
]);
