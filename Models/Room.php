<?php
class Room
{
    private int $id;
    private string $standard;
    private string $location;
    public function __construct(int $id, string $standard, string $location)
    {
        $this->id = $id;
        $this->standard = $standard;
        $this->location = $location;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getStandard()
    {
        return $this->standard;
    }
    public function getLocation()
    {
        return $this->location;
    }
}