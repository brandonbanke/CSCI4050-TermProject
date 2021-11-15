<?php 
    require("../PHP/getUserInfo.php");
    require("../PHP/getMovieInfo.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Cinema E Booking Website! </title>
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="../CSS/home.css">
    <link rel="stylesheet" href="../CSS/nav-bar.css">
    <link rel="stylesheet" href="../CSS/admin-home.css">
</head>

<body>
    <header> 
        <h1 class = "title">Booking Website!</h1>
        <!-- add "Welcome back, 'user's name'" here-->
        <?php 
        if ($userOnCheck == 1) {
        foreach($userInfs as $userInfo) {
            $name = $userInfo['firstName'];
        } 
            
        echo "<p style=\"align-text: center; padding-left:60px; color: #d6d5d6;\">Welcome back, " .$name ."</p>";
        } ?>
    </header>
    <main>
        <div id="nav-menu">
            <ul class="one">
                <li class="active"><a href="../HTML/admin-home.php"> Home </a></li>
                <li><a href="../HTML/select-movie.html"> Find Movie </a></li>
                <li><a href="../HTML/account.php"> Account </a></li>
            </ul>
            <form id="search-form" action="search.php" method="GET">
                <input type="search" id="search-bar" name="searchTerm" placeholder="What are you watching?">
            </form>  
        </div>
        <h2 class = "adminTitle">Admin View</h2>
            <a href="../HTML/adminMenu.php" class="manage">Manage Movies and Promotions</a>
        <h2>Current Movies</h2>
        <section class="trailerList">
        <?php 
            foreach ($movieInfs as $movieInf) {
                if ($movieInf['comingSoon'] == 0) {
                    echo "<div class = \"trailer\">";
                        echo "<iframe width=\"350\" height=\"250\" src = " .$movieInf['trailer']. "> </iframe><br>";
                        echo "<p>".$movieInf['title']." </p>";
                        echo "<a href=\"select-showtime.html\"><button class='bookMovie' type='button'>Book Movie </button></a>";
                    echo "</div>";
                }
            }
        ?>
        </section>
        <h2>Coming Soon</h2>
        <section class="trailerList">
        <?php 
            foreach ($movieInfs as $movieInf) {
                if ($movieInf['comingSoon'] == 1) {
                    echo "<div class = \"trailer\">";
                        echo "<iframe width=\"350\" height=\"250\" src = " .$movieInf['trailer']. "> </iframe><br>";
                        echo "<p>".$movieInf['title']." </p>";
                        echo "<a href=\"select-showtime.html\"><button class='bookMovie' type='button'>Book Movie </button></a>";
                    echo "</div>";
                }
            }
        ?>
        </section>
    </main>

</body>
</html>