<?php

class DisplayedResult {
    private $raceTitle;
    private $name;
    private $surname;
    private $time;
    private $place;

    public function __construct($raceTitle, $name, $surname, $time, $place) {
        $this->raceTitle = $raceTitle;
        $this->name = $name;
        $this->surname = $surname;
        $this->time = $time;
        $this->place = $place;
    }

    public function getRaceTitle() {
        return $this->raceTitle;
    }

    public function getName() {
        return $this->name;
    }

    public function getSurname() {
        return $this->surname;
    }

    public function getTime() {
        return $this->time;
    }

    public function getPlace() {
        return $this->place;
    }
}
