<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Cinema E Booking Website! </title>
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="../CSS/registration.css">
    <link rel="stylesheet" href="../CSS/nav-bar.css">
    <script src="../JS/registrationCheck.js"></script>
</head>


<body onload="stylePage();">
    <header> 
        <h1 class = "title">Booking Website!</h1>
    </header>
    <main>
        <div id="nav-menu">
            <ul class="one">
                <li><a href="../HTML/home.php"> Home </a></li>
                <li><a href="../HTML/select-movie.html"> Find Movie </a></li>
                <li class="active"><a href="../HTML/account.php"> Account </a></li>
            </ul>
            <form id="search-form" action="search.php" method="GET">
                <input type="search" id="search-bar" name="searchTerm" placeholder="What are you watching?">
            </form>  
        </div>

        <form action='../PHP/userInformation.php' method='POST' class = "registrationForm" onsubmit="return regis();"> 
            <fieldset>
            <p id="fNameValidity"> First Name is invalid</p>
            <p id="lNameValidity"> Last Name is invalid</p>
            <p id="emailValidity"> Email is invalid</p>
            <p id="userValidity"> Username is invalid</p>
            <p id="passValidity"> Password is invalid</p>
            <p id="cPassValidity"> Confirm Password is invalid</p><br>
            <legend>Register Your Account</legend>
            <label>First name:</label>
            <input type="text" name='uFirstName' id='uFName'>
            <label class='mand'>*</label><br><br><br>
            <label>Last name:</label>
            <input type="text" name='uLastName' id='uLName'>
            <label class='mand'>*</label><br><br><br>
            <label>Email:</label>
            <input type="text" name='uEmail' id='uEmail'>
            <label class='mand'>*</label><br><br><br>
            <label>Username:</label>
            <input type="text" name='userIden' id='uName'>
            <label class='mand'>*</label><br><br><br>
            <label>Password:</label>
            <input type="text" name='uPassword' id='uPass'>
            <label class='mand'>*</label><br><br><br>
            <label>Confirm Password:</label>
            <input type="text" name='uCPassword' id='uCPass'>
            <label class='mand'>*</label><br><br><br>
            <input id="check" type="checkbox" name="uPromo" value="1">
            <label id="checkLabel" for="uPromo"> Recieve Promotions? </label><br><br><br>
            <a href="registration-confirmation.html"><input type='submit' class='bookMovie' type='submit' value='Create Account'> </input></a>
        </fieldset>
        </form>
    </main>

</body>
</html>
