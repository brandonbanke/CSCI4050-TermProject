<?php 
    $showMovieId = $_POST['movieId'];
    $showInfo = $_POST['showInfoId'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Cinema E Booking Website! </title>
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="../CSS/nav-bar.css">
    <link rel="stylesheet" href="../CSS/select-age.css">
    <script src="../JS/selectingSeats.js"></script>
</head>
    <body>
        <header> 
            <h1 class = "title">Booking Website!</h1>
        </header>
        <main>
            <div id="nav-menu">
                <ul class="one">
                    <li><a href="../HTML/home.php"> Home </a></li>
                    <li><a href="../HTML/select-movie.php"> Find Movie </a></li>
                    <li><a href="../HTML/account.php"> Account </a></li>
                </ul>
                <form id="search-form" action="search.php" method="GET">
                    <input type="search" id="search-bar" name="searchTerm" placeholder="What are you watching?">
                </form>  
            </div>
            <h1>Number of Tickets</h1>
            <div class="tickets">
            <!--
                <script type="text/javascript">
                    var adultCount = 0;
                    var childCount = 0;
                    var seniorCount = 0;
                    function addAdult(){
                        adultCount++;
                        div = document.getElementById('displayAdult');
                        div.innerHTML = '<p class="text">'+adultCount+'</p>'
                    }
                    function subAdult(){
                        if (adultCount != 0) {
                            adultCount--;
                        }
                        div = document.getElementById('displayAdult');
                        div.innerHTML = '<p class="text">'+adultCount+'</p>'
                    }
                    function addChild(){
                        childCount++;
                        div = document.getElementById('displayChild');
                        div.innerHTML = '<p class="text">'+childCount+'</p>'
                    }
                    function subChild(){
                        if (childCount != 0) {
                            childCount--;
                        }
                        div = document.getElementById('displayChild');
                        div.innerHTML = '<p class="text">'+childCount+'</p>'
                    }
                    function addSenior(){
                        seniorCount++;
                        div = document.getElementById('displaySenior');
                        div.innerHTML = '<p class="text">'+seniorCount+'</p>'
                    }
                    function subSenior(){
                        if (seniorCount != 0) {
                            seniorCount--;
                        }
                        div = document.getElementById('displaySenior');
                        div.innerHTML = '<p class="text">'+seniorCount+'</p>'
                    }
                    function getTicketNum() {
                        return adultCount + childCount + seniorCount;
                    }
                </script>
                -->
                <h3> <button style = "color: #e7e7e7; margin-top: 2rem; font-family: 'Roboto', sans-serif; font-size: 30pt; border: none;" onclick="subAdult()">-</button> &emsp;Adult&emsp; <button style = "color: #e7e7e7; margin-top: 2rem; font-family: 'Roboto', sans-serif; font-size: 30pt; border: none;" onclick="addAdult()">+</button></h3> 
                <div id="displayAdult"><p> 0</p></div>
                <h3> <button style = "color: #e7e7e7; margin-top: 2rem; font-family: 'Roboto', sans-serif; font-size: 30pt; border: none;" onclick="subChild()">-</button> &emsp;Child&emsp; <button style = "color: #e7e7e7; margin-top: 2rem; font-family: 'Roboto', sans-serif; font-size: 30pt; border: none;" onclick="addChild()">+</button></h3> 
                <div id="displayChild"><p>0</p></div>
                <h3> <button style = "color: #e7e7e7; margin-top: 2rem; font-family: 'Roboto', sans-serif; font-size: 30pt; border: none;" onclick="subSenior()">-</button> &emsp;Senior&emsp; <button style = "color: #e7e7e7; margin-top: 2rem; font-family: 'Roboto', sans-serif; font-size: 30pt; border: none;" onclick="addSenior()">+</button></h3> 
                <div id="displaySenior"><p>0</p></div>
            </div>
        </main>
        <footer style="text-align: center;">
            <form action="select-seat.php" method="POST">
                <input type="hidden" name="movieId" value="<?php echo $showMovieId; ?>">
                <input type="hidden" name="showId" value="<?php echo $showInfo; ?>">
                
                <input type="submit" value="continue" onclick="ticketNum()" class="input" >
                <!-- <a href="select-seat.php">Continue</a> -->
            </form>
        </footer>
    </body>
</html>