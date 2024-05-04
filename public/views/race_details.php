<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Pacepal - Race Details</title>
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
        <div class="messages">
            <?php if(isset($registrationMessages))
            {
                foreach ($registrationMessages as $message)
                {
                    echo $message;
                }
            }
            ?>
        </div>
        <div class="race-details-main-container dark-gray-box-style gray-mobile-box">
            <div class="smaller-padding-and-margin displayed-races-single-container">
                <img class="race-details-smaller-img default-race-img" src="<?php echo $race->getImagePath(); ?>" alt="race image">
                <h2 class="default-smaller-header race-details-header"><?php echo $race->getRaceTitle(); ?></h2>
                <div class="icon-text-container race-details-icon-text-1">
                    <img class="race-details-small-icon" src="public/img/location.png" alt="location icon">
                    <p class="race-details-text"><?php echo $race->getRaceLocation(); ?></p>
                </div>
                <div class="icon-text-container race-details-icon-text-2">
                    <img class="race-details-small-icon" src="public/img/timetable.png" alt="date icon">
                    <p class="race-details-text"><?php echo $race->getRaceDate(); ?></p>
                </div>
                <div class="icon-text-container race-details-icon-text-3">
                    <img class="race-details-small-icon" src="public/img/tag.png" alt="price icon">
                    <p class="race-details-text"><?php echo '$' . $race->getRacePrice(); ?></p> 
                </div>
<!--                <button class="smaller-race-details-button blue-button" type="button">Sign Up!</button>-->
                    <form class="race-details-form" action="sign_up" method="GET">
                        <input type="hidden" name="race_id" value="<?php echo $race->getId(); ?>">
                        <button class="smaller-race-details-button blue-button" type="submit">Sign Up!</button>
                    </form>
            </div>
            <div class="race-details-add-description">
                <h2 class="default-smaller-header">Details</h2>
                <p class="race-details-paragraph">
                    <?php echo $race->getRaceDescription(); ?>
                </p>
            </div>
        </div>

    </main>

    <footer>
        <p>&copy; 2024 Pacepal. All rights reserved.</p>
    </footer>
    
</body>
</html>
