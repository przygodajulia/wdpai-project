<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script type="text/javascript" src="./public/js/show_menu.js" defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Pacepal - My Account</title>
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
                <li><a class="nav-link mark-current" href="my_account">My Account</a></li>
                <?php if ($_SESSION['isAdmin']): ?>
                    <li><a class="nav-link" href="admin_view">Admin</a></li>
                <?php endif; ?>
            </ul>
        </div>
        <img class="mobile-menu-icon" src="public/img/menu.png" alt="menu icon">
        <div class="mobile-menu-container">
            <ul>
                <li><a href="races">> Races Calendar</a></li>
                <li><a href="my_races">> My Races</a></li>
                <li><a href="my_account">> My Account</a></li>
                <?php if ($_SESSION['isAdmin']): ?>
                    <li><a href="admin_view">> Admin</a></li>
                <?php endif; ?>
                <li><a href="my_account">> Close</a></li>
            </ul>
        </div>
    </nav>

    <main>
        <div class="my-account-main-container my-account-mobile-box">
            <div class="my-account-header-container">
                <img class="my-account-icon" src="public/img/teamwork.png" alt="user icon">
                <h2 class="my-account-name-header-mobile"><?php echo $currentUser->getName() . ' ' . $currentUser->getSurname(); ?></h2>
            </div>
            <div class="my-account-user-data-container light-gray-box-style my-account-form">
                <h2 class="my-account-name-header-desktop"><?php echo $currentUser->getName() . ' ' . $currentUser->getSurname(); ?></h2>
                <div class="separator"></div>
                <form class="my-account-form" action="logout" method="GET">
                    <h3 class="my-account-header">Email</h3>
                    <input name="email" type="text" placeholder="<?php echo $currentUser->getEmail(); ?>" readonly>
                    <h3 class="my-account-header">Location</h3>
                    <input name="location" type="text" placeholder="<?php echo $currentUser->getLocation(); ?>" readonly>
                    <h3 class="my-account-header">Password</h3>
                    <input name="password" type="text" placeholder="*****" readonly>
                    <button type="submit" class="blue-button my-account-button my-account-button-2">Log out</button>
                </form>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Pacepal. All rights reserved.</p>
    </footer>
    
</body>
</html>