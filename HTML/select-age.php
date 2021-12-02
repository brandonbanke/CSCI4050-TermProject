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

            <p id="test"></p>
        <!--
            <form action="../PHP/ticketInformation.php" method="POST">
            
                    <label>Category</label>
                    <input class="modInput" type="text" name="showtime" >
                    
                    <label>Duration</plabel>
                    <input class="modInput" type="text" name="age" >
                    
                    <label>Cast</label>
                    <input class="modInput" type="text" name="ticketNum" >
                    
                    <a href="../HTML/select-age.php"><input type='submit' class='bookMovie' type='submit' value='Add ticket'> </input></a>
              
            </form>
            -->
            
        
        <div class="formAge">
            <form action="../PHP/ticketInformation.php" method="POST" class="selectAge">
                
                <label>Adult</label>
                <input type="text" name='numAdult1'> <br><br>
                <label>Child</label>
                <input type="text" name='numChild1'><br><br>
                <label>Senior</label>
                <input type="text" name='numSenior1'><br><br>
                <input type="hidden" name="movieId" value="<?php echo $showMovieId; ?>">
                <input type="hidden" name="showId" value="<?php echo $showInfo; ?>">
                <input type="submit" value="continue" onclick="ticketNum()" class="input" >
                <!-- <a href="select-seat.php">Continue</a> -->
            </form>
        </div>
        </main>
    </body>
</html>