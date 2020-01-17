<?php

class User {
    private $id;
    private $email;
    private $password;
    private $name;
    private $surname;
    private $role = 0;
    private $address;
    private $city;
    private $zipcode;

    public function __construct(
        string $email,
        string $password,
        string $name,
        string $surname,
        int $id = null,
        int $role = null,
        string $address = null,
        string $city = null,
        string $zipcode = null
    ) {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->id = $id;
        $this->role = $role;
        $this->address = $address;
        $this->city = $city;
        $this->zipcode = $zipcode;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getEmail(): string
    {
        return $this->email;
    }


    public function getRole(): int
    {
        return $this->role;
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function getSurname(): string
    {
        return $this->surname;
    }
    public function getAddress(): string
    {
        return $this->address;
    }
    public function getCity(): string
    {
        return $this->city;
    }
    public function getZipcode(): string
    {
        return $this->zipcode;
    }
}