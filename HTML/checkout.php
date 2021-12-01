<?php require("../PHP/getCardInfo.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Cinema E Booking Website! </title>
    <link rel="stylesheet" href="../CSS/checkout.css">
    <link rel="stylesheet" href="../CSS/nav-bar.css">
</head>
<body>
    <header> 
        <h1 class = "title">Booking Website!</h1>
    </header>
    <main>
    <div id="nav-menu">
        <ul class="one">
            <li><a href="../HTML/home.php"> Home </a></li>
            <li><a href="../HTML/select-movie.html"> Find Movie </a></li>
            <li><a href="../HTML/account.php"> Account </a></li>
        </ul>
        <form id="search-form" action="search.php" method="GET">
            <input type="search" id="search-bar" name="searchTerm" placeholder="What are you watching?">
        </form>  
    </div>
    <h1>Checkout</h1>
    <div class="main-container">
    <div class="checkout">
        <h2>New card</h2>
        <form name="checkoutForm" action="" method="POST">
            <h4>Contact Info</h4>
            <input type="text" id="email" placeholder="Email">
            <h4>Payment Info</h4>
            <input type="text" id="cardNum" placeholder="Card Number">
            <input type="text" id="CVV" placeholder="CVV"><br>
            <select>
                <option value="" selected="selected">Exp. Month</option>
                <option value="january">January</option>
                <option value="february">February</option>
                <option value="march">March</option>
                <option value="april">April</option>
                <option value="may">May</option>
                <option value="june">June</option>
                <option value="july">July</option>
                <option value="august">August</option>
                <option value="september">September</option>
                <option value="october">October</option>
                <option value="november">November</option>
                <option value="december">December</option>
            </select> 
            <input type="text" id="expYear" placeholder="Exp. Year">
            <input type="text" id="zip" placeholder="Zip Code">
        </form>
    </div>
        <div>
            <p>this</p>
            <h2 class="p">Select cards</h2>
            <?php 
                if ($cardCount > 0) {
                    $counter = 1;
                    foreach($paymentCards as $card) {
                        echo "<p style='color:white;'>". $counter. " ". $card['cardNumber']. "</p>"; #echo a checkbox 
                        $counter++;
                    } 
                } else {
                    echo "<p style='color:white;'> no cards saved </p>";
                }
                
            ?>
        </div>
    </div>
<div id="btn">
            <a href="home.php"><button type="button" class="cancelButton">Cancel Order</button></a>
            <a href="order-confirmation.php"><button type="button" class="purchaseButton">Purchase Tickets</button></a>
        </div>
</main>    
</body>
</html>