<?php 
    require("../PHP/getCardInfo.php"); 
    require("../PHP/getUserInfo.php");
    #$showMovieId = $_POST['movieId'];
    #$showInfo = $_POST['showId'];
    #$numAdult = $_POST['numAdult'];
    #$numChild = $_POST['numChild'];
    #$numSenior = $_POST['numSenior'];
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
            <input type="hidden" name="movieId" value="<?php echo $showMovieId; ?>">
            <input type="hidden" name="showId" value="<?php echo $showInfo; ?>">
            <input type="hidden" name="numAdult" value="<?php echo $numAdult; ?>">
            <input type="hidden" name="numChild" value="<?php echo $numChild; ?>">
            <input type="hidden" name="numSenior" value="<?php echo $numSenior; ?>">
            <input type="hidden" name="promoId" value="<?php echo $promoId; ?>">
            <input type="hidden" name="total" value="<?php echo $total; ?>">
            <?php 
                
            foreach($userInfs as $info) {
                $userInfo = $info['userId'];
            }
            ?>
            
            <input type="hidden" name='cUserId' value="<?php echo $userInfo ?>">
            
            <?php
                if ($cardCount < 3) {
                    echo "<input type='submit' class='manageButton' name='addCard' >";
                } else {
                    echo "<input type='submit' class='manageButton' name='addCard' disabled>";
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
        <div id="formDiv">
            <h2 class="selectCard">Select cards</h2><br><br>
        <form action='../PHP/addBooking.php' method='POST'>
            <input type="hidden" name="movieId" value="<?php echo $showMovieId; ?>">
            <input type="hidden" name="showId" value="<?php echo $showInfo; ?>">
            <input type="hidden" name="numAdult" value="<?php echo $numAdult; ?>">
            <input type="hidden" name="numChild" value="<?php echo $numChild; ?>">
            <input type="hidden" name="numSenior" value="<?php echo $numSenior; ?>">
            <input type="hidden" name="promoId" value="<?php echo $promoId; ?>">
            <input type="hidden" name="total" value="<?php echo $total; ?>">
            <?php 
                if ($cardCount > 0) {
                    $counter = 1;
                    foreach($paymentCards as $card) {
                        echo "
                        <h4 style='display:inline-block; text-align: left; '>". $counter ."</h4>
                        <p style='color:white; display:inline-block; padding-left:10px; padding-right:10px; font-size: 14pt;'>".  $card['cardNumber']. "</p>"
                        ."<input type='hidden' name='cardId".$counter."' value=". $card['cardId'] .">
                        <input class='manageButton' type='submit' name='submit".$counter."' value='checkout'><br><br>"; 
                        $counter++;
                    } 
                } else {
                    echo "<p style='color:white;'> no cards saved </p>";
                }
                
            ?>
        </form>
            

        </div>
        
    </div>
    <footer>
    <div id="btn">
        <a href="../HTML/home.php"><button type="button" class="manageButton">Cancel Order</button></a>
        <!--<input type="submit" class="purchaseButton" value="purchase tickets" name="getTickets">-->   
    </div>
    </footer>
</main>    
</body>
</html>