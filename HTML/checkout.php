<?php 
    require("../PHP/getCardInfo.php"); 
    require("../PHP/getUserInfo.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Cinema E Booking Website! </title>
    <link rel="stylesheet" href="../CSS/checkout.css">
    <link rel="stylesheet" href="../CSS/nav-bar.css">
    <script src="../JS/cardCheck.js"></script>
</head>
<body onload="stylePage();">
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
    <h1>Checkout</h1>
    <div class="main-container">
    <div class="checkout" style="padding-right: 5%;">
        <h2>New card</h2>
        <!--<form name="checkoutForm" action="" method="POST">
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
        </form> -->
    <form action='../PHP/cardInformation.php' method='POST' onsubmit="return addCard();"> 
            <fieldset>
            <label>Billing Address:</label>
            <input id = "cardBill" type="text" name='cBillingAddress'><br><br><br>
            <label>Expiraton Date:</label>
            <input id = "cardExDate" type="text" name='cExpDate'><br><br><br>
            <label>Card Number:</label>
            <input id = "cardNumb" type="text" name='cCardNum'><br><br><br>
            <label>CVV:</label>
            <input id = "cardVV" type="text" name='cCVV'><br><br><br>
            <label>Full Name:</label>
            <input id = "cardFlName" type="text" name='cFullName'><br><br><br>
            <?php 
                
            foreach($userInfs as $info) {
                $userInfo = $info['userId'];
            }
            ?>
            
            <input type="hidden" name='cUserId' value="<?php echo $userInfo ?>">
            
            <?php
                if ($cardCount < 3) {
                    echo "<input type='submit' class='bookMovie' name='addCard' >";
                } else {
                    echo "<input type='submit' class='bookMovie' name='addCard' disabled>";
                }
            ?>
            <p id="billingValidity"> Billing Address is invalid</p>
            <p id="exDateValidity"> Expiration Date is invalid</p>
            <p id="cardNumValidity"> Card Number is invalid</p>
            <p id="cvvValidity"> CVV is invalid</p>
            <p id="nameValidity"> Name is invalid</p>
            </fieldset>
        </form>
    </div>
        <div>
            <h2 class="p">Select cards</h2>
            <form action="../PHP/addBooking.php" method="POST">
            <input type="hidden" name="movieId" value="<?php echo $showMovieId; ?>">
            <input type="hidden" name="showId" value="<?php echo $showInfo; ?>">
            <?php 
                if ($cardCount > 0) {
                    $counter = 1;
                    foreach($paymentCards as $card) {
                        echo "<h4 style='display:inline;'>". $counter ."</h4>"
                        ."<p style='color:white; display:inline; padding-left:10px; padding-right:10px;'>".  $card['cardNumber']. "</p>"
                        ."<input type='checkbox' name='checkBox' value=". $card['cardId'] ."><br>"; 
                        $counter++;
                    } 
                } else {
                    echo "<p style='color:white;'> no cards saved </p>";
                }
                
            ?>
            <div id="btn">
                <a href="home.php"><button type="button" class="cancelButton">Cancel Order</button></a>
                <input type="submit" class="purchaseButton" value="purchase tickets" name="getTickets">
                </form>
            </div>

        </div>
    </div>
    
</main>    
</body>
</html>