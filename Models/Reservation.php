<?php
require_once "Room.php";
require_once  __DIR__.'//..//Repository//RoomRepository.php';
class Reservation
{
    private int $id;
    private string $from;
    private string $to;
    private Room $room;
    private int $user_id;
    
    public function __construct(int $id, string $from, string $to, int $room, int $user_id)
    {
        $roomRepo = new roomRepository();
        $this->id = $id;
        $this->from = $from;
        $this->to = $to;
        $this->room = $roomRepo->getRoom($room);
        $this->user_id = $user_id;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getFrom()
    {
        return $this->from;
    }
    public function getTo()
    {
        return $this->to;
    }
    public function getRoom()
    {
        return $this->room;
    } 
    public function getUserId()
    {
        return $this->user_id;
    }
}
?>