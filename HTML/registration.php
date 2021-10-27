<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Cinema E Booking Website! </title>
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="../CSS/registration.css">
    <link rel="stylesheet" href="../CSS/nav-bar.css">
</head>


<body>
    <header> 
        <h1 class = "title">Booking Website!</h1>
    </header>
    <main>
        <div id="nav-menu">
            <ul class="one">
                <li><a href="home.html"> Home </a></li>
                <li><a href="select-movie.html"> Find Movie </a></li>
                <li><a href="login.php"> Login </a></li>
                <li class="active"><a href="edit-profile.html"> Edit Profile </a></li>
            </ul>
            <form id="search-form" action="search.php" method="GET">
                <input type="search" id="search-bar" name="searchTerm" placeholder="What are you watching?">
            </form>  
        </div>

        <form action='../PHP/userInformation.php' method='POST' class = "registrationForm"> 
            <fieldset>
            <legend>Register Your Account</legend>
            <label>First name:</label>
            <input type="text" name='uFirstName'><br><br><br>
            <label>Last name:</label>
            <input type="text" name='uLastName'><br><br><br>
            <label>Email:</label>
            <input type="text" name='uEmail'><br><br><br>
            <label>Username:</label>
            <input type="text" name='userIden'><br><br><br>
            <label>Password:</label>
            <input type="text" name='uPassword'><br><br><br>
            <label>Confirm Password:</label>
            <input type="text"><br><br><br>
            <input type="checkbox" name="uPromo" value="1">
            <label for="uPromo"> Recieve Promotions? </label><br><br><br>
            <a href="registration-confirmation.html"><input type='submit' class='bookMovie' type='submit' value='Create Account'> </input></a>
        </fieldset>
        </form>
    </main>

</body>
</html>
