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
            <li><a class="nav-link" href="login">Login</a></li>
        </ul>
    </div>
    <img class="mobile-menu-icon" src="public/img/menu.png" alt="menu icon">
    <div class="mobile-menu-container">
        <ul>
            <li><a href="login">> Login</a></li>
            <li><a href="info_message">> Close</a></li>
        </ul>
    </div>
</nav>

<main>
        <div class="my-account-user-data-container light-gray-box-style my-account-form">
            <h1 class="info-mess-text"> <?php echo $message; ?> </h1>
        </div>

</main>

<footer>
    <p>&copy; 2024 Pacepal. All rights reserved.</p>
</footer>

</body>
</html>