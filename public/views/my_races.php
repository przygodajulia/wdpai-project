<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Pacepal - My Races</title>
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
                    <button class="big-purple-button" type="button">Upcoming</button>
                    <button class="big-purple-button" type="button">Finished</button>
                </div>
            </div>



                <div class="displayed-races">
                    <div class="displayed-races-main-container light-gray-box-style">
                        <?php foreach ($registeredRaces as $race): ?>
                        <div class="my-races-single-container dark-gray-box-style gray-mobile-box">
                            <img class="my-races-img" src="<?php echo $race->getImagePath(); ?>" alt="race image">
                            <h2 class="my-races-header"><?php echo $race->getRaceTitle(); ?></h2>
                            <div class="icon-text-container my-races-icon-text">
                                <?php
                                $raceDate = DateTime::createFromFormat('Y.m.d', $race->getRaceDate());
                                $currentDate = new DateTime();
                                if ($raceDate > $currentDate): ?>
                                    <img class="my-races-small-icon" src="public/img/upcoming.png" alt="race status icon">
                                    <p class="my-races-text">Upcoming</p>
                                <?php else: ?>
                                    <img class="my-races-small-icon" src="public/img/checked.png" alt="race status icon">
                                    <p class="my-races-text">Finished</p>
                                <?php endif; ?>
                            </div>
                            <!--                        <button class="yellow-button my-races-button" type="button">Add details</button>-->
                        </div>
                        <?php endforeach; ?>

                    </div>
<!--            </section>-->

        </div>
    </main>

    <footer>
        <p>&copy; 2024 Pacepal. All rights reserved.</p>
    </footer>
    
</body>
</html>