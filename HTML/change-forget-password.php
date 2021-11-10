<?php
    require("../PHP/getUserInfo.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Cinema E Booking Website! </title>
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="../CSS/edit-profile.css">
    <link rel="stylesheet" href="../CSS/nav-bar.css">
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
                <li class="active"><a href="../HTML/account.php"> Account </a></li>
            </ul>
            <form id="search-form" action="search.php" method="GET">
                <input type="search" id="search-bar" name="searchTerm" placeholder="What are you watching?">
            </form>  
        </div>
        <div id="edit">
            <div id="edit-nav">
                <ul class="one">
                    <li class="active"><a href="../HTML/edit-profile.php"> Edit Profile </a></li>
                    <li><a href="../HTML/edit-card.php"> Edit Billing Info </a></li>
                    <li><a href="../PHP/logoutUser.php"> Login </a></li>
                </ul>
            </div>
            
            <div id="formDiv">
                <?php foreach ($userInfs as $userInf) : ?>
                    <form class = "resetPass" action = "../PHP/changeForgottenPassword.php" method = "POST"> 
                        <fieldset>
                        <legend>Make New Password</legend>
                        <label>Username:</label>
                        <input type="text" name = "useName"><br><br><br>
                        <label>New Password:</label>
                        <input type="text" style="-webkit-text-security: circle;" name = "new_password"><br><br><br>
                        <label>Confirm New Password:</label>
                        <input type="text" style="-webkit-text-security: circle;" name = "confirm_new_pw"><br><br><br>
                        <input class = "bookMovie" type="submit" value="Submit">
                    </fieldset>
                    </form>
                <?php endforeach; ?>
            </div>
        </div>
    </main>

</body>
</html>