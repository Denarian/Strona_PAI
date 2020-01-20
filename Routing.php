<?php

require_once 'Controllers//BoardController.php';
require_once 'Controllers//SecurityController.php';
require_once 'Controllers//AdminController.php';
require_once 'Controllers//MainController.php';
require_once 'Controllers//ReservationController.php';
require_once 'Controllers//ErrorController.php';
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
            'check_email' => [
                'controller' => 'SecurityController',
                'action' => 'check_email'
            ],
            'users' => [
                'controller' => 'AdminController',
                'action' => 'users'
            ],
            'main' => [
                'controller' => 'MainController',
                'action' => 'main'
            ],
            'reservation' => [
                'controller' => 'ReservationController',
                'action' => 'reservation'
            ],
            'roomChoice' => [
                'controller' => 'ReservationController',
                'action' => 'roomChoice'
            ],
            'forbidden' => [
                'controller' => 'ErrorController',
                'action' => 'forbidden'
            ],
            'pageNotFound' => [
                'controller' => 'ErrorController',
                'action' => 'pageNotFound'
            ]
        ];
    }

    public function run()
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 'main';

        if (!isset($this->routes[$page])) {
            $page = 'pageNotFound';
        }

            $controller = $this->routes[$page]['controller'];
            $action = $this->routes[$page]['action'];

            $object = new $controller;
            $object->$action();
    }
}