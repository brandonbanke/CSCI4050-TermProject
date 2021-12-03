<?php
    require("../PHP/getUserInfo.php");

    $query = "SELECT DISTINCT date FROM showinfo";
    $statement = $db->prepare($query);
    $statement->execute();
    $showtimes = $statement->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Cinema E Booking Website! </title>
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="../CSS/nav-bar.css">
    <link rel="stylesheet" href="../CSS/select-movie.css">
</head>

<body>
    <header> 
        <h1 class = "title">Booking Website!</h1>
    </header>
    <main>
    <div id="nav-menu">
        <ul class="one">
            <li><a href="../HTML/home.php"> Home </a></li>
            <li class="active"><a href="../HTML/select-movie.php"> Find Movie </a></li>
            <li><a href="../HTML/account.php"> Account </a></li>
        </ul>
        <form id="search-form" action="../PHP/searchMovies.php" method="POST">
            <input type="search" id="search-bar" name="search" placeholder="What are you watching?">
        </form>  
    </div>
    <h1>Book a Movie</h1>
        <div id="filter"> 
            <form action="../PHP/searchMovies.php" method="POST">
                <fieldset>
                    <p>Filter by Category</p>
                    <?php foreach ($movieInfs as $cats) {
                        echo "<input type='submit' name='search' value=" .$cats['category'] ." class='bookMovie'><br>";
                    }  ?>
                </fieldset>
            </form>
                <br>
                
            <form action="../PHP/searchMovies.php" method="POST">
                <fieldset>
                    <p>Filter By Date</p>
                    <?php foreach ($showtimes as $info) {
                        echo "<input type='submit' name='date' value=" .$info['date'] ." class='bookMovie'><br>";
                    }  ?>
                </fieldset>
            </form>
        </div>
        <div id= "content">
      
        <section class="trailerList">
            <div class="disp" style="padding-top:47px;">
            <?php 
                foreach ($information as $movieInf) {
                    
                    echo "<div class = \"trailer\">"; 
                    echo "<iframe width=\"350\" height=\"250\" src = " .$movieInf['trailer']. "> </iframe><br>";
                    // echo "<div class = \"info\">";
                    echo "<p class = \"info title\">".$movieInf['title']." </p>";
                    echo "<p class = \"info minorInfo\">".$movieInf['category']." </p>";
                    if($movieInf['comingSoon'] == 0) {
                        echo "<p class = \"info minorInfo\">Released</p>";
                    } else {
                        echo "<p class = \"info minorInfo\">Coming Soon</p>";
                    }
                    echo "<p class = \"info minorInfo\"> Cast: ".$movieInf['movieCast']." </p>";
                    echo "<p class = \"info minorInfo\"> Director: ".$movieInf['director']." </p>";
                    echo "<p class = \"info minorInfo\"> Rating: ".$movieInf['ratingCode']." </p>";
                    echo "<form method='POST' action='../HTML/select-showtime.php'><input type='hidden' name='movieId' value='". $movieInf['id']."'>";
                    echo "<button name='bookMovie' class='bookMovie' type='submit'>Book Movie </button>";
                    echo "</form>";
                    echo "</div>";
                        
                           
                }
            ?>
            </div>
        </section>

        </div>

    </main>

</body>
</html>