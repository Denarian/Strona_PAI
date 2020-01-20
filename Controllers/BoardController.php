<?php

require_once 'AppController.php';
require_once __DIR__.'//..//Models//User.php';
require_once __DIR__.'//..//Models//Reservation.php';
require_once __DIR__.'//..//Models//Room.php';
require_once __DIR__.'//..//Repository//RoomRepository.php';
require_once __DIR__.'//..//Repository//UserRepository.php';
require_once __DIR__.'//..//Repository//ReservationRepository.php';

class BoardController extends AppController {

    public function reservations()
    {   
        $userRepo = new userRepository();
        $user = $userRepo->getUser(($_SESSION['email']));
        $reservationRepo = new reservationRepository();
        $resevations = $reservationRepo->getReservationsByUser($user->getId());
        if($resevations != null){
            foreach($resevations as $res)
            {           
                $data[] = [
                    'from' => $res->getFrom(),
                    'to' => $res->getTo(),
                    'standard' => $res->getRoom()->getStandard()
                ];
            }
        }else
        {
            $data = null;
        }
        $this->render('board',['subview' => 'reservations', 'resevations' => $data]);
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
        
            $userRepo-> updateAccountDetails($user, $_SESSION['email']);
            $data['messages'] = ['Account details updated'];
        } 
        $user = $userRepo->getUser(($_SESSION['email']));
        $data['user'] = [
            'email' => $user->getEmail(),
            'name' => $user->getName(),
            'surname' => $user->getSurname(),
            'address' => $user->getAddress(),
            'city' => $user->getCity(),
            'zipcode' => $user->getZipcode()
        ];
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
            $user = $usersRepo->getUser($_SESSION['email']);

            if(password_verify($oldPassword,$user->getPassword()))
            {
                $usersRepo->changePassword($newPassword,$_SESSION['email']);
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