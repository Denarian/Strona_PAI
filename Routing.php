<?php

require_once 'Controllers//BoardController.php';
require_once 'Controllers//SecurityController.php';
require_once 'Controllers//AdminController.php';
require_once 'Controllers//MainController.php';
class Routing {
    private $routes = [];

    public function __construct()
    {
        $this->routes = [
            'board' => [
                'controller' => 'BoardController',
                'action' => 'reservations'
            ],
            'accountDetails' => [
                'controller' => 'BoardController',
                'action' => 'accountDetails'
            ],
            'passwordChange' => [
                'controller' => 'BoardController',
                'action' => 'passwordChange'
            ],
            'login' => [
                'controller' => 'SecurityController',
                'action' => 'login'
            ],
            'register' => [
                'controller' => 'SecurityController',
                'action' => 'register'
            ],
            'logout' => [
                'controller' => 'SecurityController',
                'action' => 'logout'
            ],
            'users' => [
                'controller' => 'AdminController',
                'action' => 'users'
            ],
            'main' => [
                'controller' => 'MainController',
                'action' => 'main'
            ]
            
        ];
    }

    public function run()
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 'main';

        if (isset($this->routes[$page])) {
            $controller = $this->routes[$page]['controller'];
            $action = $this->routes[$page]['action'];

            $object = new $controller;
            $object->$action();
        }
    }
}