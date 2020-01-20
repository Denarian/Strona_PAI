<?php

require_once 'AppController.php';
require_once __DIR__.'//..//Models//Reservation.php';
require_once __DIR__.'//..//Repository//ReservationRepository.php';
require_once __DIR__.'//..//Models//Room.php';
require_once __DIR__.'//..//Repository//RoomRepository.php';


class ReservationController extends AppController {

    public function reservation()
    {
        if ($this->isPost()) 
        {
            $reservationRepo = new ReservationRepository();
            $from = $_POST['from'];
            $to = $_POST['to'];
            $lockedRoms = $reservationRepo->startReservation($from, $to);
            if($lockedRoms == null)
            {
                $data['messages'] = ['Unfortunately all rooms are taken'];
                $data['from'] = $from;
                $data['to'] = $to;
                $this->render('reservation',$data);
            }
            else
            {   
                $roomRepo = new RoomRepository;
                foreach($lockedRoms as $roomId)
                {
                    $room = $roomRepo->getRoom($roomId['id']);
                    $data['rooms'][] = 
                    [
                        'id' => $room->getId(),
                        'standard' =>$room->getStandard()
                    ];
                    $_SESSION['reservation']['rooms'][] = $room->getId();
                }
                $data['from'] = $from;
                $data['to'] = $to;
                $_SESSION['reservation']['from'] = $from;
                $_SESSION['reservation']['to'] = $to;

                $this->render('roomChoice',$data);   
            }
        }else
        {   
            $data['from'] = date("Y-m-d");
            $data['to'] = date("Y-m-d",time() + 86400);
            $this->render('reservation',$data);
        }

        
    }
    public function roomChoice()
    {   
        $data=[];
        if ($this->isPost()) 
        {
            $roomId = $_POST['roomId'];
            if(isset( $_SESSION['reservation']) and in_array($roomId, $_SESSION['reservation']['rooms']))
            {   
                $reservationRepo = new ReservationRepository();
                $reservation = new Reservation(
                    0,
                    $_SESSION['reservation']['from'],
                    $_SESSION['reservation']['to'],
                    $roomId,
                    $_SESSION['id'] 
                );
                $reservationRepo->finalizeReservation($reservation,$_SESSION['reservation']['rooms']);

                $url = "http://$_SERVER[HTTP_HOST]/";
                header("Location: {$url}?page=board");

                unset($_SESSION['reservation']);

                return;
            }else
            {
                $url = "http://$_SERVER[HTTP_HOST]/";
                header("Location: {$url}?page=forbidden");
                return;
            }
        }
        $this->render('roomChoice',$data);
    }
   
}