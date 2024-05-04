<?php

class User 
{

    private $userId;
    private $email;
    private $password;
    private $name;
    private $surname;
    private $location;

    public function __construct(
        int $userId,
        string $email, 
        string $password,
        string $name, 
        string $surname,
        string $location
    ){
        $this->userId = $userId;
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->location = $location;

    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getEmail(): string 
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getLocation(): string
    {
        return $this->location;
    }


}