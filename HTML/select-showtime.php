<?php
    require("../PHP/getMovieInfo.php");
    require("../PHP/getUserInfo.php");
   
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
        <h1> SELECT SHOWTIME</h1>
        <div class="button-section">
            <button type='button' class="dateButtons" id="today" onClick='window.location="#1"'>
                <script>
                    document.getElementById("today").innerHTML = m + "/" + d + "/" + y;
                    document.write("<h4>Today</h4>");
                </script>
            </button>
            <button type='button' class="dateButtons" id="tmrw" onClick='window.location="#2"'>
                <script>
                    document.getElementById("tmrw").innerHTML =  m + "/" + tmr.getDate() + "/" + y + "<br>" + gd;
                </script>
            </button>
            <button type='button' class="dateButtons" id="2tmrw" onClick='window.location="#3"'>
                <script>
                    document.getElementById("2tmrw").innerHTML =  m + "/" + tmr2.getDate() + "/" + y + "<br>" + gd2;
                </script>
            </button>
        </div>

        <div class="showtimeDisplay">
        <h3>Showtimes </h3>
        <form action="../HTML/select-age.html" method="POST">
           
                <?php foreach ($movieInfs as $time) {
                    echo "<input type='submit' name='search' value=" .$time['showTime'] ." class='bookMovie'><br>";
                }  
                ?>
            
        </form>
        </div>

        <!-- <div class="showtimes" id="1">
            <h3>Today's Showtimes</h3>
            <ul>
                <li><a href="select-age.html" class="time">10:00am</a></li>
                <li><a href="select-age.html" class="time">11:00am</a></li>
                <li><a href="select-age.html" class="time">12:00pm</a></li>
                <li><a href="select-age.html" class="time">1:00pm</a></li>
                <li><a href="select-age.html" class="time">2:00pm</a></li>
            </ul>
        </div> <br>

        <div class="showtimes" id="2">
            <script>
                document.write('<h3>'+ gd + '</h3>');
            </script>
            <ul>
                <li><a href="select-age.html" class="time">11:00am</a></li>
                <li><a href="select-age.html" class="time">12:00pm</a></li>
                <li><a href="select-age.html" class="time">12:45pm</a></li>
                <li><a href="select-age.html" class="time">1:10pm</a></li>
                <li><a href="select-age.html" class="time">2:00pm</a></li>
            </ul>
        </div><br>
        <div class="showtimes" id="3">
            <script>
                document.write('<h3>'+ gd2 + '</h3>');
            </script>
            <ul>
                <li><a href="select-age.html" class="time">10:45am</a></li>
                <li><a href="select-age.html" class="time">11:00am</a></li>
                <li><a href="select-age.html" class="time">12:45pm</a></li>
                <li><a href="select-age.html" class="time">1:30pm</a></li>
                <li><a href="select-age.html" class="time">2:00pm</a></li>
            </ul>
        </div> -->



    </main>

</body>
</html>