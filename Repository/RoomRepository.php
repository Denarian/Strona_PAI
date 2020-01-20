<?php
require_once "Repository.php";
require_once __DIR__.'//..//Models//Room.php';

class RoomRepository extends Repository 
{
    public function getRoom(int $roomId)
    {
        $stmt = $this->database->connect()->prepare(
            'SELECT *
            FROM displayRooms
            WHERE id  =  ?;
            ');
            $stmt->execute([$roomId]);
            $room = $stmt->fetch(PDO::FETCH_ASSOC);
            if($room == false) {
                return null;
            }
        return new Room(
            $room['id'],
            $room['type'],
            $room['location']    
        );
    }
    public function getRooms()
    {
        $stmt = $this->database->connect()->prepare(
            'SELECT *
            FROM displayRooms');
            $stmt->execute([$roomId]);
            $rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($rooms as $room) {
                $result[] = new Room(
                    $room['id'],
                    $room['type'],
                    $room['location']    
                );
            }
    
            return $result;
    }
    public function checkRoomState(int $roomId)
    {
        $stmt = $this->database->connect()->prepare(
            'SELECT id
            FROM rooms 
            WHERE id  =  ? AND `lock_timestamp` IS NOT NULL;
            ');
            $stmt->execute([$roomId]);
            $room = $stmt->fetch(PDO::FETCH_ASSOC);
            if($room == false) {
                return FALSE;
            }
            return TRUE;

    }
}
