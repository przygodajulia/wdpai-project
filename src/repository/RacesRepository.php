<?php


require_once 'Repository.php';
require_once __DIR__.'/../models/Race.php';

class RacesRepository extends Repository
{

    public function getRaces()
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('SELECT * FROM races;');
        $stmt->execute();
        $races = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($races as $race) {
            $result[] = new Race(
                $race['raceid'],
                $race['title'],
                $race['location'],
                $race['date'],
                $race['price'],
                $race['description'],
                $race['imageurl']
            );
        }

        return $result;
    }

    public function getsingleRace(int $id)
    {
        $stmt = $this->database->connect()->prepare('SELECT * FROM races WHERE raceid = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $race = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$race) {
            return null;
        }

        return new Race(
            $race['raceid'],
            $race['title'],
            $race['location'],
            $race['date'],
            $race['price'],
            $race['description'],
            $race['imageurl']
        );
    }

    public function getAllRaces(int $userid)
    {
        $stmt = $this->database->connect()->prepare('SELECT r.* FROM races r INNER JOIN user_race_registration urr ON r.raceid = urr.raceid WHERE urr.userid = :userid');
        $stmt->bindParam(':userid', $userid, PDO::PARAM_INT);
        $stmt->execute();

        $races = [];

        while ($race = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $races[] = new Race(
                $race['raceid'],
                $race['title'],
                $race['location'],
                $race['date'],
                $race['price'],
                $race['description'],
                $race['imageurl']
            );
        }

        return $races;

    }

    public function addRegistration(int $userId, int $raceId)
    {

        # check if the user is not already signed in
        $stmt = $this->database->connect()->prepare('SELECT * FROM user_race_registration WHERE userid = ? and raceid = ?');
        $stmt->execute([$userId, $raceId]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($rows) > 0) {
            // There is already an entry for the user and race
            return false;
        } else {
            // There is no existing entry for the user and race
            $stmt = $this->database->connect()->prepare('
                INSERT INTO user_race_registration (userid, raceid, finished) 
                VALUES (?, ?, ?)');

            $stmt->execute([$userId, $raceId, 'N']);
            return true;
        }

    }

}