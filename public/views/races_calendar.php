<?php
// TODO -> when reading from db where should this part be placed?
require_once __DIR__.'../../../index.php';
$races = array(
    new Race(1, "Roma-Ostia Half Marathon", "Rome", "2024.05.01", 50.00, "Description 1", "public/img/run1.jpeg"),
    new Race(2, "Cracovia Marathon", "Cracow", "2024.05.15", 60.00, "Description 2", "public/img/run1.jpeg"),
);
?>
 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Pacepal - Races Calendar</title>
</head>
<body>
    <nav>
        <div class="default-nav-header">
            <img class="header-img" src="public/img/running_girl.png" alt="main logo image">
            <h1 class="default-header-text">Pacepal</h1>
        </div>
        <div class="default-nav-list">  
            <ul>
                <li><a class="nav-link" href="#">Races Calendar</a></li>
                <li><a class="nav-link" href="#">My Races</a></li>
                <li><a class="nav-link" href="#">My Account</a></li>
            </ul>
        </div>
        <img class="mobile-menu-icon" src="public/img/menu.png" alt="menu icon">
    </nav>

    <main>
        <div class="races-main-container">

            <div class="filtres-races">
                <h2 class="default-smaller-header">Filters</h2>
                <div class="box-filters-race-calendar light-gray-box-style gray-mobile-box">
                    <button class="big-purple-button" type="button">Dates</button>
                    <button class="big-purple-button" type="button">Distance</button>
                    <button class="big-purple-button" type="button">Location</button>
                </div>
            </div>

            <div class="displayed-races">
                <h2 class="default-smaller-header">Upcoming races</h2>

                <div class="displayed-races-main-container light-gray-box-style">
 
                    <?php foreach($races as $race): ?>
                    <div class="displayed-races-single-container dark-gray-box-style gray-mobile-box">
                        <img class="default-race-img" src="<?php echo $race->getImagePath(); ?>" alt="race image">
                        <h2 class="default-smaller-header race-calendar-header"><?php echo $race->getRaceTitle(); ?></h2>
                        <div class="icon-text-container icon-text-container-1">
                            <img class="race-details-small-icon" src="public/img/location.png" alt="location icon">
                            <p class="race-details-text"><?php echo $race->getRaceLocation(); ?></p>
                        </div>
                        <div class="icon-text-container icon-text-container-2">
                            <img class="race-details-small-icon" src="public/img/timetable.png" alt="date icon">
                            <p class="race-details-text"><?php echo $race->getRaceDate(); ?></p>
                        </div>
                        <div class="icon-text-container icon-text-container-3">
                            <img class="race-details-small-icon" src="public/img/tag.png" alt="price icon">
                            <p class="race-details-text"><?php echo '$' . $race->getRacePrice(); ?></p> 
                        </div>
                        <form action="race_details" method="GET">
                            <input type="hidden" name="race_id" value="<?php echo $race->getId(); ?>">
                            <button class="blue-button smaller-button races-calendar-button" type="submit">More</button>
                        </form>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Pacepal. All rights reserved.</p>
    </footer>
</body>
</html>
