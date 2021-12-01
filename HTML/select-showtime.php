<?php
    require("../PHP/getMovieInfo.php");
    require("../PHP/getUserInfo.php");
    $showMovieId = $_POST['movieId'];
    include("../PHP/getShowTimeInfo.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Cinema E Booking Website! </title>
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="../CSS/select-showtime.css">
    <link rel="stylesheet" href="../CSS/nav-bar.css">
    <script>
        n =  new Date();
        y = n.getFullYear();
        m = n.getMonth() + 1
        d = n.getDate();
        var weekday = new Array(7);
        weekday[0] = "Sunday";
        weekday[1] = "Monday";
        weekday[2] = "Tuesday";
        weekday[3] = "Wednesday";
        weekday[4] = "Thursday";
        weekday[5] = "Friday";
        weekday[6] = "Saturday";
        var tmr = new Date(n);
        tmr.setDate(tmr.getDate() + 1);
        var gd = weekday[tmr.getDay()];
        var tmr2 = new Date(n);
        tmr2.setDate(tmr2.getDate() + 2);
        var gd2 = weekday[tmr2.getDay()];
    </script>
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
            <form id="search-form" action="search.php" method="GET">
                <input type="search" id="search-bar" name="searchTerm" placeholder="What are you watching?">
            </form>  
        </div>
        <h3 style="text-align: center;"> SELECT SHOWTIME</h3>

        <div class="button-section">
        <form action="select-age.php" method="POST"> 
        <input type="hidden" value="<?php echo $showMovieId; ?>" name="movieId">
            <?php 
            if ($rowCount == 0) echo"<p>No showtimes yet!</p>";
            foreach ($specificShowInfs as $info) :?>
                <input type="hidden" value="<?php echo $info['showId']?>" name="showInfoId"> 
                <button type='submit' class="dateButtons">
                <?php echo $info['date'] ." ". $info['time'];?>
                </button>
                
            <?php endforeach; ?>
        </div>
        </form>
        
    </main>

</body>
</html>