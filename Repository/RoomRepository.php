<?php
require_once "Repository.php";
require_once __DIR__.'//..//Models//Room.php';

class RoomRepository extends Repository 
{
    public function getRoom(int $roomId)
    {
        $stmt = $this->database->connect()->prepare(
            'SELECT r.id, s.type, b.name as `building`, f.name as `floor`
            FROM rooms r, floor f, standards s, buildings b
            WHERE r.standard_id = s.id and r.floor_id = f.id and f.building_id = b.id and r.id  =  ?;
            ');
            $stmt->execute([$roomId]);
            $room = $stmt->fetch(PDO::FETCH_ASSOC);
            if($room == false) {
                return null;
            }
        return new Room(
            $room['id'],
            $room['type'],
            $room['building'].' '.$room['floor']    
        );
    }
    public function getRooms()
    {
        $stmt = $this->database->connect()->prepare(
            'SELECT r.id, s.type, b.name, f.name
            FROM rooms r, floor f, standards s, buildings b
            WHERE r.standard_id = s.id and r.floor_id = f.id and f.building_id = b.id');
            $stmt->execute([$roomId]);
            $rooms = $stmt->fetch(PDO::FETCH_ASSOC);

            foreach ($rooms as $room) {
                $result[] = new Room(
                    $room['id'],
                    $room['type'],
                    $room['b.name'].' '.$room['f.name']    
                );
            }
    
            return $result;
    }
}
