<?php 
    require("../PHP/database.php");
    require("../PHP/getCardInfo.php");
    $cardIden = filter_input(INPUT_POST, 'card_id');

        $changequery = "SELECT billingAddress FROM payment_card
                            WHERE cardId = '$cardIden'
                            ";
        $changestatement = $db->prepare($changequery);
        $changestatement->execute();

        $billAdd = filter_input(INPUT_POST, 'new_BillingAddress');
        $changeFirstName = "UPDATE payment_card
                            SET billingAddress = '$billAdd' WHERE cardId = '$cardIden' ";
        $db->exec($changeFirstName);
        include("../HTML/home.html");
?>