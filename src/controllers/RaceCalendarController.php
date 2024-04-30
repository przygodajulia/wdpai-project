<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Race.php';




class RaceCalendarController extends AppController {

        public function race_details()
        {   
            // Retrieve the race ID from the GET parameters
            $raceId = isset($_GET['race_id']) ? $_GET['race_id'] : null;
            
            // Ensure a race ID is provided
            if (!$raceId) {
                // Handle case when race ID is not provided
                // You can redirect the user to an error page or back to the races calendar
                // For example:
                $url = "http://$_SERVER[HTTP_HOST]";
                header("Location: {$url}/races_calendar");
                exit; // Make sure to exit after redirecting
            }
    
            // Fetch race details based on the race ID (for now hard-coded as 1)
            // You should implement the logic to fetch details from your data source
            // Here, let's just create a dummy Race object
            $race = new Race(1, "Roma-Ostia Half Marathon", "Rome", "2024.05.01", 50.00, "Description 1", "public/img/run1.jpeg");
    
            // Render the race details view, passing the race object
            $this->render('race_details', ['race' => $race]);
        }
}
    
