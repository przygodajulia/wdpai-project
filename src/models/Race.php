<?php

class Race 
{
    private $id;
    private $raceTitle;
    private $raceLocation;
    private $raceDate;
    private $racePrice;
    private $raceDescription;
    private $raceDistance;
    private $imagePath;

    public function __construct(
        int $id,
        string $raceTitle, 
        string $raceLocation, 
        string $raceDate, 
        float $racePrice, 
        string $raceDescription,
        string $raceDistance,
        string $imagePath
    ){
        $this->id = $id;
        $this->raceTitle = $raceTitle;
        $this->raceLocation = $raceLocation;
        $this->raceDate = $raceDate;
        $this->racePrice = $racePrice;
        $this->raceDescription = $raceDescription;
        $this->raceDistance = $raceDistance;
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
    public function getDistance(): string {
        return $this->raceDistance;
    }

    public function getImagePath(): string 
    {
        return $this->imagePath;
    }

    public function getMonth(): string
    {
        // Extracting the month from the stored date
        $dateParts = explode('.', $this->raceDate);
        $monthNumber = (int) ltrim($dateParts[1], '0');

        // Converting month number to full name
        $monthNames = [
            1 => 'January',
            2 => 'February',
            3 => 'March',
            4 => 'April',
            5 => 'May',
            6 => 'June',
            7 => 'July',
            8 => 'August',
            9 => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December'
        ];

        return $monthNames[$monthNumber];
    }

}