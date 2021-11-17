
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
            <li class="active"><a href="../HTML/select-movie.html"> Find Movie </a></li>
            <li><a href="../HTML/account.php"> Account </a></li>
        </ul>
        <form id="search-form" action="../PHP/searchMovies.php" method="POST">
            <input type="search" id="search-bar" name="search" placeholder="What are you watching?">
        </form>  
    </div>
    <h1>Book a Movie</h1>
        <div id="filter"> 
        <p>Filter Search</p>
            <form action="../PHP/searchMovies.php" method="POST">
                <fieldset>
                    <p>category</p>
                    <?php foreach ($movieInfs as $cats) {
                        echo "<input type='submit' name='search' value=" .$cats['category'] ." class='bookMovie'><br>";
                    }  ?>
                </fieldset>
            </form>
                <br>
                <p>Filter Date</p>
            <form action="../PHP/searchMovies.php" method="POST">
                <fieldset>
                    <p>Date</p>
                    <?php foreach ($movieInfs as $info) {
                        echo "<input type='submit' name='search' value=" .$info['showDate'] ." class='bookMovie'><br>";
                    }  ?>
                </fieldset>
            </form>
        </div>
        <div id= "content">
      
        <section class="trailerList">
            
            <?php 
                foreach ($information as $movieInf) {
                    // if ($movieInf['comingSoon'] == 0) {
                        echo "<div class = \"trailer\">";
                            echo "<iframe width=\"350\" height=\"250\" src = " .$movieInf['trailer']. "> </iframe><br>";
                            // echo "<div class = \"info\">";
                                echo "<p class = \"info\"> Title: ".$movieInf['title']." </p>";
                                echo "<p class = \"info\"> Category: ".$movieInf['category']." </p>";
                                if($movieInf['comingSoon'] == 0) {
                                    echo "<p class = \"info\">Released</p>";
                                } else {
                                    echo "<p class = \"info\">Coming Soon</p>";
                                }
                                echo "<p class = \"info\"> Cast: ".$movieInf['movieCast']." </p>";
                                echo "<p class = \"info\"> Director: ".$movieInf['director']." </p>";
                                echo "<p class = \"info\"> Rating: ".$movieInf['ratingCode']." </p>";
                            echo "<a href=\"select-showtime.html\"><button class='bookMovie' type='button'>Book Movie </button></a>";
                            // echo "<div>";
                        echo "</div>";
                        
                            // }
                }
            ?>
        </section>

        </div>

    </main>

</body>
</html>