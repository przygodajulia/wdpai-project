<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Pacepal - Admin Page</title>
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
            <?php if ($_SESSION['isAdmin']): ?>
                <li><a class="nav-link mark-current" href="admin_view">Admin</a></li>
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
                <li><a class="mark-current" href="admin_view">Admin</a></li>
            <?php endif; ?>
            <li><a href="my_races">> Close</a></li>
        </ul>
    </div>
</nav>

<main>
    <div class="races-main-container">

        <div class="displayed-races">
            <div class="messages">
                <?php if(isset($messages))
                {
                    foreach ($messages as $message)
                    {
                        echo $message;
                    }
                }
                ?>
            </div>
            <div class="displayed-races-main-container light-gray-box-style">
                <?php foreach ($finishedRaces as $race): ?>
                    <div class="admin-view-single-container">
                        <h2 class="admin-header"><?php echo $race->getRaceTitle(); ?></h2>
                        <p class="admin-p">Upload file</p>
                        <form class="admin-form" action="upload" method="POST" enctype="multipart/form-data">
                            <input class="admin-input" type="file" name="file"/><br/>
                            <button class="admin-button blue-button" type="submit">Submit</button>
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

