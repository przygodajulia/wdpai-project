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
        $registeredRaces = $this->raceRepository->getAllRaces($userId);
        $this->render("my_races", ['registeredRaces' => $registeredRaces]);

    }







}