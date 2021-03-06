
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Cinema E Booking Website! </title>
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="../CSS/nav-bar.css">
    <link rel="stylesheet" href="../CSS/order-summary.css">
</head>

<body>
    <header>
        <h1 class="title">Booking Website!</h1>
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
        
        <div id="summaryContent">
        <div class="orderSummary">
            <h2>Summary</h2>
            <p>Movie: <?php echo $title;?></p>
            <p>Date: <?php echo $movieDate;?></p>
            <p>Time: <?php echo $movieTime;?></p>
            <p>Booking #: <?php echo $bookingNumber;?></p>
            <p>Total: $<?php echo $total;?></p>
        </div>
    </div>
    </main>
    
    <footer>
       
    <form action="../HTML/order-confirmation.php" method="POST" id="continue">
        <input class="manageButton" id="summaryCont" type="submit" value="Continue">
        </form>
    </footer>
</body>

</html>