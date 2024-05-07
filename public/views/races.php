<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script type="text/javascript" src="./public/js/races_filters.js" defer></script>
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
                <li><a class="nav-link" href="races">Races Calendar</a></li>
                <li><a class="nav-link" href="my_races">My Races</a></li>
                <li><a class="nav-link" href="my_account">My Account</a></li>
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
                    <button class="big-purple-button" type="button" id="filter-distance">Distance</button>
                    <div class="distance-options">
                        <?php foreach ($distances as $distance):?>
                            <button class="distance-option" type="button"><?php echo ucfirst($distance['distance']);?></button>
                        <?php endforeach; ?>
                    </div>
                    <button class="big-purple-button" type="button" id="filter-location">Location</button>
                    <div class="location-options">
                        <?php foreach ($locations as $location):?>
                            <button class="location-option" type="button"><?php echo $location['location'];?></button>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="displayed-races">
                <h2 class="default-smaller-header">Upcoming races</h2>

                <div class="displayed-races-main-container light-gray-box-style">

                    <section class="races">

                        <?php foreach ($races as $race):?>
                            <div class="displayed-races-single-container dark-gray-box-style gray-mobile-box" data-distance="<?php echo $race->getDistance(); ?>"
                                 data-location="<?php echo $race->getRaceLocation(); ?>">
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
                    </section>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Pacepal. All rights reserved.</p>
    </footer>
</body>
</html>
