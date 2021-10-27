<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Cinema E Booking Website! </title>
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="../CSS/login.css">
    <link rel="stylesheet" href="../CSS/nav-bar.css">
</head>

<body>
    <header> 
        <h1 class = "title">Booking Website!</h1>
    </header>
    <main>
    <div id="nav-menu">
        <ul class="one">
            <li><a href="../HTML/home.html"> Home </a></li>
            <li><a href="../HTML/select-movie.html"> Find Movie </a></li>
            <li class="../HTML/active"><a href="login.php"> Login </a></li>
            <li><a href="../HTML/edit-profile.html"> Edit Profile </a></li>
        </ul>
        <form id="search-form" action="search.php" method="GET">
            <input type="search" id="search-bar" name="searchTerm" placeholder="What are you watching?">
        </form>  
    </div>
    <form action='../PHP/userLogin.php' method='POST' class = "loginForm"> 
            <h2> Login </h2>
            <label>Username:</label><br>
            <input type="text" name='userIdent'><br><br>
            <label>Password:</label><br>
            <input type="text" name='uPasswor'><br><br>
            <a href="../HTML/home.html"><input type='submit' class='loginButton' type='submit' value='Submit'> </input></a>
            <input class = "loginButton" type="button" onclick="window.location.href='../HTML/registration.html';" value="Create Account">
        </form>
    </main>
    <footer>
        <a href="admin-home.html">Continue to Admin Home</a>
    </footer>
</body>
</html>