<?php
    require("../PHP/getUserInfo.php");
    require("../PHP/getCardInfo.php");
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
        <div id="nav-menu">
            <ul class="one">
                <li><a href="../HTML/home.php"> Home </a></li>
                <li><a href="../HTML/select-movie.html"> Find Movie </a></li>
                <li class="active"><a href="../HTML/account.php"> Account </a></li>
            </ul>
            <form id="search-form" action="search.php" method="GET">
                <input type="search" id="search-bar" name="searchTerm" placeholder="What are you watching?">
            </form>  
        </div>
        <div id="edit">
            <div id="edit-nav">
                <ul class="one">
                    <li><a href="../HTML/edit-profile.php"> Edit Profile </a></li>
                    <li class="active"><a href="../HTML/edit-card.php"> Edit Billing Info </a></li>
                    <li><a href="../PHP/logoutUser.php"> Logout </a></li>
                </ul>
            </div>
            <div id="formDiv">
            <form action='../PHP/cardInformation.php' method='POST' class = "registrationForm"> 
                <fieldset>
                <legend>Add Card</legend>
                <label>Billing Address:</label>
                <input type="text" name='cBillingAddress'><br><br><br>
                <label>Expiraton Date:</label>
                <input type="text" name='cExpDate'><br><br><br>
                <label>Card Number:</label>
                <input type="text" name='cCardNum'><br><br><br>
                <label>CVV:</label>
                <input type="text" name='cCVV'><br><br><br>
                <label>Full Name:</label>
                <input type="text" name='cFullName'><br><br><br>
                <?php 
                 
                foreach($userInfs as $info) {
                    $userInfo = $info['userId'];
                }
                ?>
                
                <input type="hidden" name='cUserId' value="<?php echo $userInfo ?>">
                
                <?php
                    if ($cardCount < 3) {
                        echo "<a href=\"../HTML/account.php\"><input type='submit' class='bookMovie' type='submit' value='Add Card'> </input></a>";
                    } else {
                        echo "<a href=\"../HTML/account.php\"><input type='submit' class='bookMovie' type='submit' value='Add Card' disabled> </input></a>";
                    }
                ?>
                </fieldset>
            </form>
            <br><br>

            <?php 
            $counter = 1;
            foreach ($paymentCards as $card): ?>
            <form action='../PHP/editCardInfo.php' method='POST' class = "registrationForm"> 
                <fieldset>
                <legend>Card <?php echo $counter; ?></legend>
                <label>Billing Address:</label>
                <input type="text" name='new_BillingAddress' value = "<?php echo $card['billingAddress']; ?>" ><br><br><br>
                <label>Expiraton Date:</label>
                <input type="text" name='new_ExpDate' value = "<?php echo $card['expirationDate']; ?>"><br><br><br>
                <label>Card Number:</label>
                <input type="text" name='new_CardNum' value = "<?php echo $card['cardNumber']; ?>"><br><br><br>
                <label>CVV:</label>
                <input type="text" name='new_CVV' value = "<?php echo $card['cvv']; ?>"><br><br><br>
                <label>Full Name:</label>
                <input type="text" name='new_FullName' value = "<?php echo $card['fullName']; ?>"><br><br><br>
                <input type="hidden" name="card_id" value = "<?php echo $card['cardId']; ?>">
                <input type="hidden" name="user_id" value = "<?php echo $card['userId']; ?>">
                <a href="../HTML/home.php"><input class='bookMovie' type='submit' name='edit_card' value="Submit"> </a>
                </fieldset>
            </form>
            <br>
            <?php $counter++; ?>
            <?php if ($counter == 4) {
                    break;
                } 
                endforeach; ?>
            </div>
        </div>
    </main>

</body>
</html>