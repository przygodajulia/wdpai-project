<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Pacepal - Welcome</title>
</head>
<body>

    <div class="simple-login-header">
        <header>
            <img class="header-img" src="public/img/running_girl.png" alt="main logo image">
            <div class="logo-login-page"><h1 class="default-header-text">Pacepal</h1></div>
        </header>
    </div>

    <main>
        <div class="login-forms-main-container">

            <div class=" single-login-form single-login-form-style single-login-form-1">
                <img class="login-icon" src="public/img/sign-in.png" alt="sign in icon">
                <h2 class="simple-login-header">Welcome!</h2>
                <form action="login" method="POST">
                    <div class="messages">
                        <?php if(isset($loginMessages))
                        {
                            foreach ($loginMessages as $message)
                            {
                                echo $message;
                            }
                        } 
                        ?>
                    </div>
                    <input name="email" type="text" placeholder="E-mail">
                    <input name="password" type="password" placeholder="Password">
                    <button type="submit" class="blue-button">Login</button>
                </form>
            </div>

            <div class=" single-login-form single-login-form-style single-login-form-2">
                <img class="login-icon" src="public/img/user.png" alt="user icon">
                <h2 class="simple-login-header">Create account!</h2>
                <form action="register" method="POST">
                    <div class="messages">
                        <?php if(isset($registerMessages))
                        {
                            foreach ($registerMessages as $message)
                            {
                                echo $message;
                            }
                        }
                        ?>
                    </div>
                    <input name="fullName" type="text" placeholder="Full name">
                    <input name="email" type="text" placeholder="E-mail">
                    <input name="password" type="password" placeholder="Password">
                    <input name="location" type="text" placeholder="Location">
                    <button type="submit" class="blue-button">Create</button>
                </form>
            </div>

            <div class="mobile-additional-login-page">
                <p class="create-subtitle">If you don't have an account yet</p>
                <button type="button" class="blue-button bigger-button-size">Create</button>
            </div>

        </div>
    </main>

    <footer>
        <p>&copy; 2024 Pacepal. All rights reserved.</p>
    </footer>

</body>
</html>
