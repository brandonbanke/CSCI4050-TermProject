<?php
    require("../PHP/getTicketInfo.php"); 
    $showMovieId = $_POST['movieId'];
    $showInfo = $_POST['showId'];  
    $numAdult = $_POST['numAdult'];
    $numChild = $_POST['numChild'];
    $numSenior = $_POST['numSenior'];

    #CALCULATE TOTAL HERE + TAX + PROMOTION
    $convFee = 2.00;
    $totalCost = .92* (10*$numAdult + 5*$numChild + 7*$numSenior);
    $newTotalCost = round($totalCost, 2);
    $tax = .08 * $totalCost;
    $tax = round($tax, 2);
    $newTotalCost += $convFee;

    $promoId = NULL;
    #promo checking
    if (isset($_POST['promotionCode'])) {
        $promoCode = $_POST['promotionCode'];
        require("../PHP/getPromotion.php");
        
        foreach($promInfs as $info) {
            if ($info['code'] == $promoCode) {
                $promoId = $info['id'];
                $newTotalCost -= $info['discount'];
                break;
            }
        }
    }
?>

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
        <div class="content">
            <div>
            <h1>Tickets</h1>
             
            <table>
                <tbody>
                <tr>
                        <td>
                            <p>Adult Ticket </p>
                        </td>
                        <td>
                            <p><?php echo $numAdult;?> x $10</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Child Ticket </p>
                        </td>
                        <td>
                            <p><?php echo $numChild;?> x $5</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Senior Ticket </p>
                        </td>
                        <td>
                            <p><?php echo $numSenior;?> x $7</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Convenience Fees</p>
                        </td>
                        <td>
                            <p>$ <?php echo $convFee?></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Taxes</p>
                        </td>
                        <td>
                            <p>$ <?php echo $tax?></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Total </p>
                        </td>
                        <td>
                            <p>$ <?php echo $newTotalCost?></p>
                        </td>
                    </tr>
                </tbody>
            </table>
            </div>
            <div class="promo">
            <form action="order-total.php" method="POST">  
                <label>Enter Promotion</label>
                <input type="hidden" name="movieId" value="<?php echo $showMovieId; ?>">
                <input type="hidden" name="showId" value="<?php echo $showInfo; ?>">
                <input type="hidden" name="numAdult" value="<?php echo $numAdult; ?>">
                <input type="hidden" name="numChild" value="<?php echo $numChild; ?>">
                <input type="hidden" name="numSenior" value="<?php echo $numSenior; ?>">
                <input type="hidden" name="promoId" value="<?php echo $promoId; ?>">
                <input type="hidden" name="total" value="<?php echo $newTotalCost; ?>">
                <input type="text" name="promotionCode">
            </form>
        </div>
        </div>

        
    </main>
    
    <footer>
    <form action="../PHP/checkoutProxy.php" method="POST" id="continue">
        <input type="hidden" name="movieId" value="<?php echo $showMovieId; ?>">
        <input type="hidden" name="showId" value="<?php echo $showInfo; ?>">
        <input type="hidden" name="numAdult" value="<?php echo $numAdult; ?>">
        <input type="hidden" name="numChild" value="<?php echo $numChild; ?>">
        <input type="hidden" name="numSenior" value="<?php echo $numSenior; ?>">
        <input type="hidden" name="promoId" value="<?php echo $promoId; ?>">
        <input type="hidden" name="total" value="<?php echo $newTotalCost; ?>">
        <input class="continueButton" type="submit" value="Continue">
        </form>
    </footer>
</body>

</html>