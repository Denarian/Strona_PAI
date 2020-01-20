<?php
require_once "Repository.php";
require_once __DIR__.'//..//Models//Reservation.php';

class ReservationRepository extends Repository 
{   
    public function startReservation(string $from, string $to)
    {
        $stmt = $this->database->connect()->prepare(
            'CALL GetFreeRoomsForNewReservation(?, ?);
            ');
            $stmt->execute([$from, $to]);
            $roomsIDs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($roomsIDs == false) {
                return null;
            }
            return $roomsIDs;
    }
    public function finalizeReservation(Reservation $reservation, array $roomsToFree)
    {
       
        $from = $reservation->getFrom();
        $to = $reservation->getTo();
        $userId = $reservation->getUserId();
        $roomId = $reservation->getRoom()->getId();

        $dbCon = $this->database->connect();
        $dbCon->beginTransaction();

        $stmt = $dbCon->prepare(
            'INSERT INTO `reservations` (`from`, `to`, `room_id`, `user_id`) VALUES(?,?,?,?);
            ');
        $stmt->execute([$from, $to,$roomId, $userId]);

        $stmt = $dbCon->prepare(
            'UPDATE rooms SET `lock_timestamp` = null where `id` = ?'
            );
        foreach($roomsToFree as $id)
        {
            $stmt->execute([$id]);
        }
        $dbCon->commit();
    }


    public function getReservation(int $Id)
    {
        $stmt = $this->database->connect()->prepare(
            'SELECT *
            FROM reservations
            WHERE id =  ?;
            ');
            $stmt->execute([$Id]);
            $reservation = $stmt->fetch(PDO::FETCH_ASSOC);
            if($reservation == false) {
                return null;
            }
        return new Reservation(
            $reservation['id'],
            $reservation['from'],
            $reservation['to'],
            $reservation['room_id'],
            $reservation['user_id']    
        );
    }
    public function getReservations()
    {
        $stmt = $this->database->connect()->prepare(
            'SELECT *
            FROM reservations
            ');
            $stmt->execute();
            $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($reservations == false) {
                return null;
            }
            foreach ($reservations as $reservation) {
                $result[] = new Reservation(
                    $reservation['id'],
                    $reservation['from'],
                    $reservation['to'],
                    $reservation['room_id'],
                    $reservation['user_id']    
                );
            }
    
            return $result;
    }
    public function getReservationsByUser(int $user_id)
    {
        $stmt = $this->database->connect()->prepare(
            'SELECT *
            FROM reservations
            WHERE user_id = ?
            ');
            $stmt->execute([$user_id]);
            $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($reservations == false) {
                return null;
            }
           
            foreach ($reservations as $reservation) {
                $result[] = new Reservation(
                    $reservation['id'],
                    $reservation['from'],
                    $reservation['to'],
                    $reservation['room_id'],
                    $reservation['user_id']    
                );
            }
            
            return $result;
    }
    public function getReservationsByRoom(int $room_id)
    {
        $stmt = $this->database->connect()->prepare(
            'SELECT *
            FROM reservations
            WHERE room_id = ?
            ');
            $stmt->execute([$room_id]);
            $reservations = $stmt->fetch(PDO::FETCH_ASSOC);
            if($reservations == false) {
                return null;
            }
            foreach ($reservations as $reservation) {
                $result[] = new Reservation(
                    $reservation['id'],
                    $reservation['from'],
                    $reservation['to'],
                    $reservation['room_id'],
                    $reservation['user_id']    
                );
            }
    
            return $result;
    }
    public function getReservationsFuture()
    {
        $stmt = $this->database->connect()->prepare(
            'SELECT *
            FROM reservations
            WHERE `from` > CURRENT_DATE 
            ');
            $stmt->execute([$user_id]);
            $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($reservations == false) {
                return null;
            }
            foreach ($reservations as $reservation) {
                $result[] = new Reservation(
                    $reservation['id'],
                    $reservation['from'],
                    $reservation['to'],
                    $reservation['room_id'],
                    $reservation['user_id']    
                );
            }
    
            return $result;
    }
    public function getReservationsPast()
    {
        $stmt = $this->database->connect()->prepare(
            'SELECT *
            FROM reservations
            WHERE `to` < CURRENT_DATE 
            ');
            $stmt->execute([$user_id]);
            $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($reservations == false) {
                return null;
            }
            foreach ($reservations as $reservation) {
                $result[] = new Reservation(
                    $reservation['id'],
                    $reservation['from'],
                    $reservation['to'],
                    $reservation['room_id'],
                    $reservation['user_id']    
                );
            }
    
            return $result;
    }
    public function getReservationsCurrent()
    {
        $stmt = $this->database->connect()->prepare(
            'SELECT *
            FROM reservations
            WHERE `from` < CURRENT_DATE and `to` >  CURRENT_DATE
            ');
            $stmt->execute([$user_id]);
            $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($reservations == false) {
                return null;
            }
            foreach ($reservations as $reservation) {
                $result[] = new Reservation(
                    $reservation['id'],
                    $reservation['from'],
                    $reservation['to'],
                    $reservation['room_id'],
                    $reservation['user_id']    
                );
            }
    
            return $result;
    }

}
