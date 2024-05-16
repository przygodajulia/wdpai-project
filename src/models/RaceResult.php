<?php

class RaceResult {
    private $raceId;
    private $userId;
    private $time;
    private $place;

    public function __construct($raceId, $userId, $time, $place) {
        $this->raceId = $raceId;
        $this->userId = $userId;
        $this->time = $time;
        $this->place = $place;
    }

    public function getRaceId() {
        return $this->raceId;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function getTime() {
        return $this->time;
    }

    public function getPlace() {
        return $this->place;
    }
}
