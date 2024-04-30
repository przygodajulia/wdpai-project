<?php

class Race 
{
    private $id;
    private $raceTitle;
    private $raceLocation;
    private $raceDate;
    private $racePrice;
    private $raceDescription;
    private $imagePath;

    public function __construct(
        int $id,
        string $raceTitle, 
        string $raceLocation, 
        string $raceDate, 
        float $racePrice, 
        string $raceDescription,
        string $imagePath
    ){
        $this->id = $id;
        $this->raceTitle = $raceTitle;
        $this->raceLocation = $raceLocation;
        $this->raceDate = $raceDate;
        $this->racePrice = $racePrice;
        $this->raceDescription = $raceDescription;
        $this->imagePath = $imagePath;
    }

    public function getId(): int 
    {
        return $this->id;
    }

    public function getRaceTitle(): string 
    {
        return $this->raceTitle;
    }

    public function getRaceLocation(): string 
    {
        return $this->raceLocation;
    }

    public function getRaceDate(): string 
    {
        return $this->raceDate;
    }

    public function getRacePrice(): float 
    {
        return $this->racePrice;
    }

    public function getRaceDescription(): string 
    {
        return $this->raceDescription;
    }

    public function getImagePath(): string 
    {
        return $this->imagePath;
    }
}