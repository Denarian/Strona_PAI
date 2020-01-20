<?php

require_once 'AppController.php';
require_once __DIR__.'//..//Models//User.php';
require_once __DIR__.'//..//Repository//UserRepository.php';

class SecurityController extends AppController {

    public function login()
    {   
        $userRepository = new UserRepository();

        if ($this->isPost()) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $userRepository->getUser($email);

            if (!$user) {
                $this->render('login', ['messages' => ['User with this email not exist!']]);
                return;
            }

            if (!password_verify($password,$user->getPassword()) ) {
                $this->render('login', ['messages' => ['Wrong password!']]);
                return;
            }

            $_SESSION['email'] = $user->getEmail();
            $_SESSION["role"] = $user->getRole();
            $_SESSION["id"] = $user->getId();

            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=board");
            return;
        }

        $this->render('login');
    }

    public function logout()
    {
        session_unset();
        session_destroy();

        $this->render('login', ['messages' => ['You have been successfully logged out!']]);
    }
    public function register()
    {
        $userRepository = new UserRepository();
        if ($this->isPost()) {
            $email = $_POST['email'];
            $password = password_hash($_POST['password'],PASSWORD_DEFAULT) ;
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $zipcode = $_POST['zipcode'];

            $user = $userRepository->getUser($email);

            if ($user) {
                $this->render('register', ['messages' => ['This email is taken!']]);
                return;
            }
            $user = new User(
                $email,
                $password,
                $name,
                $surname,
                null,
                null,
                $address,
                $city,
                $zipcode
            );
            $userRepository->newUser($user);

            $user = $userRepository->getUser($email);
            
            $_SESSION['email'] = $user->getEmail();
            $_SESSION["role"] = $user->getRole();
            $_SESSION["id"] = $user->getId();

            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=board");
            return;
        }

        $this->render('register');
    }
}