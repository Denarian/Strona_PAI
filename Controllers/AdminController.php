<?php

require_once 'AppController.php';
require_once __DIR__.'//..//Models//User.php';
require_once __DIR__.'//..//Repository//UserRepository.php';


class AdminController extends AppController {

    public function users()
    {   
        $userRepository = new UserRepository();
        if($this->isPost() and $_SESSION['role'] != 0)
        {
            foreach($_POST['id'] as $id)
                {
                    $userRepository->removeUser($id);
                }
        } 
        $users = $userRepository->getUsers();

        $this->render('users', ['users' => $users]);
    }
}