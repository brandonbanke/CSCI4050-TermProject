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
                <li class="active"><a href="../HTML/account.php"> Account </a></li>
            </ul>
            <form id="search-form" action="search.php" method="GET">
                <input type="search" id="search-bar" name="searchTerm" placeholder="What are you watching?">
            </form>  
        </div>

        <div>
            <ul>
                <li><a href="../HTML/edit-profile.php"> Edit Profile </a></li>
                <li><a href="../HTML/edit-card.php"> Edit Billing Info </a></li>
            </ul>
        </div>

        <?php foreach ($userInfs as $userInf) : ?>
            <form class = "registrationForm" action = "../PHP/editCardInfo.php" method = "POST"> 
                <fieldset>
                    <legend>Edit Billing Info</legend>
                    <label>Billing Address:</label>
                    <input type="text" name = "new_firstName" value = <?php echo $userInf['firstName']; ?>><br><br><br>
                    <label>Expriation Date:</label>
                    <input type="text" name = "new_lastName" value = <?php echo $userInf['lastName']; ?>><br><br><br>
                    <label>Card Number:</label>
                    <input type="text" name = "new_lastName" value = <?php echo $userInf['lastName']; ?>><br><br><br>
                    <label>CVV:</label>
                    <input type="text" name = "new_lastName" value = <?php echo $userInf['lastName']; ?>><br><br><br>
                    <label>Full Name:</label>
                    <input type="text" name = "new_lastName" value = <?php echo $userInf['lastName']; ?>><br><br><br>

                    <input class = "bookMovie" type="submit" value="Submit">
                </fieldset>
            </form>
        <?php endforeach; ?>




    </main>

</body>
</html>