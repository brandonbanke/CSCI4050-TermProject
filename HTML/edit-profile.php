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
        <?php foreach ($userInfs as $userInf) : ?>
        <div id="nav-menu">
            <ul class="one">
                <?php 
                    if ($userInf['isAdmin'] == 1) {
                        echo "<li><a href='../HTML/admin-home.php'> Home </a></li>"; 
                    } else {
                        echo "<li><a href='../HTML/home.php'> Home </a></li>";
                    }
                ?>
                <li><a href="../HTML/select-movie.php"> Find Movie </a></li>
                <li class="active"><a href="../HTML/account.php"> Account </a></li>
            </ul>
            <form id="search-form" action="search.php" method="GET">
                <input type="search" id="search-bar" name="searchTerm" placeholder="What are you watching?">
            </form>  
        </div>
        <?php endforeach; ?>
        <div id="edit">
            <div id="edit-nav">
                <ul class="one">
                    <li class="active"><a href="../HTML/edit-profile.php"> Edit Profile </a></li>
                    <li><a href="../HTML/edit-card.php"> Edit Billing Info </a></li>
                    <li><a href="../PHP/logoutUser.php"> Logout </a></li>
                </ul>
            </div>
            
            <div id="formDiv">
                <?php foreach ($userInfs as $userInf) : ?>
                    <form class = "editProf" action = "../PHP/editAccount.php" method = "POST"> 
                        <fieldset>
                            <legend>Edit Profile</legend>
                            <label>First name:</label>
                            <input type="text" name = "new_firstName" value = <?php echo $userInf['firstName']; ?>><br><br><br>
                            <label>Last name:</label>
                            <input type="text" name = "new_lastName" value = <?php echo $userInf['lastName']; ?>><br><br><br>
                            <label>Email:</label>
                            <input type="text" value = <?php echo $userInf['email']; ?> disabled ><br><br><br>
                            <label>Username:</label>
                            <input type="text" name = "new_userId" value = <?php echo $userInf['userId']; ?>><br><br><br>
                            <?php
                                $checked = ($userInf['receiveProm'] == 1 ? ' checked':'');
                            ?>
                            <input id="check" type="checkbox" name="new_promotion" <?php echo $checked;?>/>
                            <label id="checkLabel"> Recieve Promotions? </label><br><br><br>   
                            <input class = "bookMovie" type="submit" value="Submit">
                        </fieldset>
                    </form>
                    <br>

                    <form class = "resetPass" action = "../PHP/editPassword.php" method = "POST"> 
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
            </div>
        </div>
    </main>

</body>
</html>