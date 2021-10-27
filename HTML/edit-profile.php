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
                <li><a href="../HTML/home.html"> Home </a></li>
                <li><a href="../HTML/select-movie.html"> Find Movie </a></li>
                <li><a href="../HTML/login.php"> Login </a></li>
                <li class="active"><a href="../HTML/edit-profile.php"> Edit Profile </a></li>
            </ul>
            <form id="search-form" action="search.php" method="GET">
                <input type="search" id="search-bar" name="searchTerm" placeholder="What are you watching?">
            </form>  
        </div>
        <?php foreach ($userInfs as $userInf) : ?>
            <form class = "registrationForm"> 
                <fieldset>
                    <legend>Edit Profile</legend>
                    <label>First name:</label>
                    <input type="text" value = <?php echo $userInf['firstName']; ?>><br><br><br>
                    <label>Last name:</label>
                    <input type="text" value = <?php echo $userInf['lastName']; ?>><br><br><br>
                    <label>Email:</label>
                    <input type="text" value = <?php echo $userInf['email']; ?> disabled ><br><br><br>
                    <label>Username:</label>
                    <input type="text" value = <?php echo $userInf['userId']; ?>><br><br><br>
                    <input class = "bookMovie" type="submit" value="Submit">
            </fieldset>
            </form>

            <form class = "registrationForm" action = "../PHP/editAccount.php" method = "POST"> 
                <fieldset>
                <legend>Reset Password</legend>
                <label>Current Password:</label>
                <input type="text" style="-webkit-text-security: circle;" name = "old_password"><br><br><br>
                <label>New Password:</label>
                <input type="text" style="-webkit-text-security: circle;" name = "new_password"><br><br><br>
                <label>Confirm Password:</label>
                <input type="text" style="-webkit-text-security: circle;" name = "confirm_new_pw"><br><br><br>
                <input class = "bookMovie" type="submit" value="Submit">
            </fieldset>
            </form>
        <?php endforeach; ?>

    </main>

</body>
</html>