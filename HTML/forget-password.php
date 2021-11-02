<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Cinema E Booking Website! </title>
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="../CSS/nav-bar.css">
    <link rel="stylesheet" href="../CSS/edit-profile.css">
</head>
<body>
    <header> 
        <h1 class = "title">Booking Website!</h1>
    </header>
    <main>
        <div id="nav-menu">
            <ul class="one">
                <li><a href="../HTML/home.php"> Home </a></li>
                <li><a href="../HTML/select-movie.html"> Find Movie </a></li>
                <li><a href="../HTML/account.php"> Account </a></li>
            </ul>
            <form id="search-form" action="search.php" method="GET">
                <input type="search" id="search-bar" name="searchTerm" placeholder="What are you watching?">
            </form>  
        </div>

        <form class="registrationForm" action="../PHP/forget-password.php" method="POST">
            <fieldset>
                <legend>Forgot Password</legend>
                <p>Please enter your email. We will send an email with your password in it</p><br>
                <label>Email:</label>
                <input type="text" name="input_email"><br><br>
                <input class="bookMovie" type="submit" value="submit">
            </fieldset>
        </form>

    </main>
</body>
</html>