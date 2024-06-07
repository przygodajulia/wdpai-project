<?php


require_once 'Repository.php';
require_once __DIR__.'/../models/Race.php';
require_once __DIR__.'/../models/RaceResult.php';
require_once __DIR__.'/../models/DisplayedResult.php';

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
                $race['distance'],
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
            $race['distance'],
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
                $race['distance'],
                $race['imageurl']
            );
        }

        return $races;

    }

    public function getAllDistances()
    {
        $stmt = $this->database->connect()->prepare('SELECT DISTINCT distance FROM races;');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getAllLocations()
    {
        $stmt = $this->database->connect()->prepare('SELECT DISTINCT location FROM races;');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getFinishedRaces()
    {
        // Get all races as objects
        $allRaces = $this->getRaces();

        // Get the current date
        $currentDate = new DateTime();

        // Filter the races to get just the finished ones
        $finishedRaces = array_filter($allRaces, function($race) use ($currentDate) {
            $raceDate = DateTime::createFromFormat('Y-m-d', $race->getRaceDate());
            return $raceDate <= $currentDate;
        });

        return $finishedRaces;
    }

    public function getRaceResults($raceId)
    {
        $stmt = $this->database->connect()->prepare(
            'SELECT r.title as title, u.name as name, u.surname as surname, res.time as time_str, res.place as place
        FROM race_results res 
        INNER JOIN users u ON res.userid = u.userid
        INNER JOIN races r ON res.raceid = r.raceid
        WHERE res.raceid = ?
        ORDER BY res.place DESC;');
        $stmt->execute([$raceId]);

        $results = [];

        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $results[] = new DisplayedResult(
                $result['title'],
                $result['name'],
                $result['surname'],
                $result['time_str'],
                $result['place']
            );
        }

        return $results;
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

    public function addRaceResult($raceResult)
    {
        $stmt = $this->database->connect()->prepare('
        INSERT INTO race_results (raceid, userid, time, place)
        VALUES (?, ?, ?, ?)');

        $stmt->execute([
            $raceResult->getRaceid(),
            $raceResult->getUserId(),
            $raceResult->getTime(),
            $raceResult->getPlace()
        ]);
    }

    public function getRaceByTitle(string $title) {
        $searchString = '%' . strtolower($title) . '%';

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM races WHERE LOWER(title) LIKE :search OR LOWER(description) LIKE :search
        ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}