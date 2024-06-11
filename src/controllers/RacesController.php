<?php


require_once 'AppController.php';
require_once __DIR__ . '/../models/Race.php';
require_once __DIR__ . '/../repository/RacesRepository.php';

class RacesController extends AppController
{
    private $message = [];
    private $raceRepository;

    public function __construct()
    {
        parent::__construct();
        $this->raceRepository = new RacesRepository();
    }

    public function races()
    {
        session_start();
        $months = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];
        $races = $this->raceRepository->getRaces();
        $distances = $this->raceRepository->getAllDistances();
        $locations = $this->raceRepository->getAllLocations();
        $this->render('races', ['races' => $races, 'distances' => $distances, 'locations' => $locations, 'months'=>$months]);
    }

    public function race_details()
    {
//        if (!$this->isPost()) {
//            return $this->render('races');
//        }

        $race = $this->raceRepository->getsingleRace($_GET['race_id']);
        $this->render("race_details", ['race' => $race]);
    }

    public function sign_up()
    {
//        if(isset($_SESSION['user_id'])) {
//            // User is logged in, retrieve user details from database
//            $userId = $_SESSION['user_id'];
//            // Query database to get user details using $userId
//        } else {
//            // User is not logged in, handle accordingly (e.g., redirect to login page)
//        }

        session_start();
        $userId = $_SESSION['userid'];
        if ($userId == null)
        {
            return $this->render('info_message', ['message' => 'Please log in first!']);
        }
        $raceId = $_GET['race_id'];

        // add this to the new database table
        $registrationAdded = $this->raceRepository->addRegistration($userId, $raceId);

        if (!$registrationAdded)
        {
            $race = $this->raceRepository->getsingleRace($_GET['race_id']);
            return $this->render('race_details', ['race' => $race, 'registrationMessages' => ['You are already signed in for this race!']]);

        }
        else
        {
            // extract saved data and render proper template
            $registeredRaces = $this->raceRepository->getAllRaces($userId);
            $this->render("my_races", ['registeredRaces' => $registeredRaces]);

        }


    }

    public function my_races()
    {
        session_start();
        $userId = $_SESSION['userid'];

        if ($userId == null)
        {
            return $this->render('info_message', ['message' => 'Please log in first!']);
        }

        $registeredRaces = $this->raceRepository->getAllRaces($userId);
        $this->render("my_races", ['registeredRaces' => $registeredRaces]);

    }

    public function view_results()
    {

        session_start();
        $raceId = $_GET['race_id'];
        $userId = $_SESSION['userid'];

        // fetch records from database for the correspoding races
        $results = $this->raceRepository->getRaceResults($raceId);


        return $this->render("results", ['results' => $results]);


    }

    public function search() {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->raceRepository->getRaceByTitle($decoded['search']));
        }
    }







}