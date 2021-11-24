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
    <link rel="stylesheet" href="../CSS/nav-bar.css">
    <link rel="stylesheet" href="../CSS/home.css">
    <!--<link rel="stylesheet" href="../CSS/admin-home.css">-->
    
</head>

<body>
    <header> 
        <h1 class = "title">Booking Website!</h1>
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
        <li><a href="../HTML/home.php"> Home </a></li>
            <li><a href="../HTML/select-movie.php"> Find Movie </a></li>
            <li><a href="../HTML/account.php"> Account </a></li>
        </ul>
        <form id="search-form" action="../PHP/searchMovies.php" method="POST">
            <input type="search" id="search-bar" name="search" placeholder="What are you watching?">
        </form>    

        <?php if ($userOnCheck && $isAdmin) :?>
        <h2 class = "adminTitle">Admin View</h2>
        <a href="../HTML/adminMenu.php" class="manage">Manage Movies and Promotions</a>
        <?php endif;?>

    </div>
        <h2>Current Movies</h2>
        <section class="trailerList">
           
            <?php 
                foreach ($movieInfs as $movieInf) {
                    if ($movieInf['comingSoon'] == 0) {
                        echo "<div class = \"trailer\">";
                            echo "<iframe width=\"350\" height=\"250\" src = " .$movieInf['trailer']. "> </iframe><br>";
                            echo "<p>".$movieInf['title']." </p>";
                            echo "<form method='POST' action='../PHP/searchMovies.php'><input type='hidden' name='search' value='". $movieInf['title']."'>";
                            echo "<button name='bookMovie' class='bookMovie' type='submit'>Select Movie</button>";
                            echo "</form>";
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
                        echo "<form method='POST' action='../PHP/searchMovies.php'><input type='hidden' name='search' value='". $movieInf['title']."'>";
                        echo "<button name='bookMovie' class='bookMovie' type='submit'>Select Movie</button>";
                        echo "</form>";
                    echo "</div>";
                }
            }
            ?>
        </section>

    </main>

</body>
</html>