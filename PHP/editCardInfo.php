<?php 
    require("../PHP/database.php");
    require("../PHP/getCardInformation.php");
    $cardIden = filter_input(INPUT_POST, 'edit_card');
    #echo($cardIden);

    #foreach ($paymentCards as $card) {
    #    if ($card == )
        $changequery = "SELECT billingAddress FROM payment_card
                            WHERE cardId = '$cardIden'
                            ";
        $changestatement = $db->prepare($changequery);
        $changestatement->execute();
        #$rowcount = $changestatement->rowCount();

        $billAdd = filter_input(INPUT_POST, 'new_BillingAddress');
        $changeFirstName = "UPDATE payment_card
                            SET billingAddress = '$billAdd' WHERE cardId = '$cardIden' ";
        $db->exec($changeFirstName);
    #}
?>