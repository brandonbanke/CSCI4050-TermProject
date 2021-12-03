<?php
    require("../PHP/getUserInfo.php");
    require("../PHP/getOrderHistory.php");
    $userId = $userInfs[0]['userId'];
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
                        echo "<li><a href='../HTML/home.php'> Home </a></li>"; 
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
                    <li><a href="../HTML/edit-profile.php"> Edit Profile </a></li>
                    <li><a href="../HTML/edit-card.php"> Edit Billing Info </a></li>
                    <li class="active"><a href="../HTML/order-history.php">Order History</a></li>
                    <li><a href="../PHP/logoutUser.php"> Logout </a></li>
                </ul>
            </div>
            
            <div id="formDiv">
                <?php 
                    $counter = 1;
                    foreach ($bookingInfs as $bookingInf) : ?>
                        <h4>Order <?php echo $counter;?></h4>
                        <p>Title: <?php echo $bookingInf['title'];?></p>
                         <p>Show Date: <?php echo $bookingInf['date'];?></p>
                         <p>Show Time: <?php echo $bookingInf['time'];?></p>
                        <p>Booking Number: <?php echo $bookingInf['bookingNumber'];?></p>
                        <p>Ticket Number: <?php echo $bookingInf['ticketNumber'];?></p> 
                        <br>
                        <?php $counter++; ?>    
                <?php endforeach; ?> 
            </div>
        </div>
    </main>

</body>
</html>