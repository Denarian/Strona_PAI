<?php

require_once 'AppController.php';
require_once __DIR__.'//..//Models//User.php';
require_once __DIR__.'//..//Repository//UserRepository.php';
require_once __DIR__.'//..//Models//Reservation.php';
require_once __DIR__.'//..//Repository//ReservationRepository.php';

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
    public function currentResevations()
    {
        $reservationRepo = new ReservationRepository();
        if($this->isPost() and $_SESSION['role'] != 0)
        {
            foreach($_POST['id'] as $id)
                {
                    $reservationRepo->removeReservation($id);
                }
        } 
        $reservations = $reservationRepo->getReservationsCurrent();

        $this->render('currentResevations', ['reservations' => $reservations] );
    }
}