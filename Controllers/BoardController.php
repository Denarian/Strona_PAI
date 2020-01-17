<?php

require_once 'AppController.php';
require_once __DIR__.'//..//Models//Post.php';
require_once __DIR__.'//..//Database.php';

class BoardController extends AppController {

    public function reservations()
    {   
        $database = new Database();
        $database->connect();

        $this->render('board',['subview' => 'reservations']);
    }
    public function AccountDetails()
    {
        $data = ['subview' => 'account'];
        $userRepo = new UserRepository();
        if ($this->isPost()) 
        {   
            $email = $_POST['email'];
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $zipcode = $_POST['zipcode'];
            
            $user = new User(
                $email,
                '',
                $name,
                $surname,
                null,
                null,
                $address,
                $city,
                $zipcode
            );
        
            $userRepo-> updateAccountDetails($user, $_SESSION['id']);
            $data['messages'] = ['Account details updated'];
        } 
        
        $this->render('board',$data);
    }
    public function passwordChange()
    {
        

        $data = ['subview' => 'passwordChange'];
        array_push($data, ['messages' => ['Wrong']]);
        if ($this->isPost()) 
        {

            $oldPassword = $_POST['old_pass'];
            $newPassword = $_POST['new_pass'];
            
            $usersRepo = new UserRepository();
            $user = $usersRepo->getUser($_SESSION['id']);

            if(password_verify($oldPassword,$user->getPassword()))
            {
                $usersRepo->changePassword($newPassword,$_SESSION['id']);
                $data['messages'] = ['Password changed'];
            }
            else
            {
                $data['messages'] = ['Wrong password'];
            }
        }

        $this->render('board',$data);
    }
}