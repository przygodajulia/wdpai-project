<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script type="text/javascript" src="./public/js/races_filters.js" defer></script>
    <script type="text/javascript" src="./public/js/show_menu.js" defer></script>
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
            <li><a class="nav-link mark-current" href="races">Races Calendar</a></li>
            <li><a class="nav-link" href="my_races">My Races</a></li>
            <li><a class="nav-link" href="my_account">My Account</a></li>
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
            <li><a href="races">> Close</a></li>
        </ul>
    </div>
</nav>

<main>
    <div class="races-results">
        <h2>Race Results</h2>
        <table>
            <thead>
            <tr>
                <th>Race Title</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Time</th>
                <th>Place</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($results as $result): ?>
                <tr>
                    <td><?php echo $result->getRaceTitle(); ?></td>
                    <td><?php echo $result->getName(); ?></td>
                    <td><?php echo $result->getSurname(); ?></td>
                    <td><?php echo $result->getTime(); ?></td>
                    <td><?php echo $result->getPlace(); ?></td>
                </tr>
                <tr class="spacer-row">
                    <td colspan="5" class="spacer-cell"></td> <!-- Create a spacer row with colspan 5 to span all columns -->
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>




<footer>
    <p>&copy; 2024 Pacepal. All rights reserved.</p>
</footer>
</body>
</html>
