<?php 
    require("../PHP/database.php");
    require("../PHP/getCardInfo.php");

    #cardId for wanted card
    $cardIden = filter_input(INPUT_POST, 'card_id');

    #userId using the card
    $userId = filter_input(INPUT_POST, 'user_id');

    
        # billingAddress
        $changequery1 = "SELECT billingAddress FROM payment_card
                        WHERE cardId = '$cardIden' AND userId = '$userId'
                        ";
        $changestatement1 = $db->prepare($changequery1);
        #$changestatement1->execute();

        if ($changestatement1->execute() == 1) {
            $billAdd = filter_input(INPUT_POST, 'new_BillingAddress');
            $change = "UPDATE payment_card
                        SET billingAddress = '$billAdd' 
                        WHERE cardId = '$cardIden' AND userId = '$userId' ";
            $db->exec($change);
        }
        # expDate
        $changequery2 = "SELECT expirationDate FROM payment_card
                        WHERE cardId = '$cardIden' AND userId = '$userId'
                        ";
        $changestatement2 = $db->prepare($changequery2);
        #$changestatement2->execute();
        
        if ($changestatement2->execute() == 1) {
        $expDate = filter_input(INPUT_POST, 'new_ExpDate');
        $change = "UPDATE payment_card
                    SET expirationDate = '$expDate' 
                    WHERE cardId = '$cardIden' AND userId = '$userId' ";
        $db->exec($change);
        }
        #cardNumber
        $changequery3 = "SELECT cardNumber FROM payment_card
                        WHERE cardId = '$cardIden' AND userId = '$userId'
                        ";
        $changestatement3 = $db->prepare($changequery3);
        #$changestatement3->execute();

        if ($changestatement3->execute() == 1) {
            $cNum = filter_input(INPUT_POST, 'new_CardNum');
            $change = "UPDATE payment_card
                                SET cardNumber = '$cNum' 
                                WHERE cardId = '$cardIden' AND userId = '$userId' ";
            $db->exec($change);
        }

        #cvv
        $changequery4 = "SELECT cvv FROM payment_card
                        WHERE cardId = '$cardIden' AND userId = '$userId'
        ";
        $changestatement4 = $db->prepare($changequery4);
        #$changestatement4->execute();

        if ($changestatement4->execute() == 1) {
            $cvv = filter_input(INPUT_POST, 'new_CVV');
            $change = "UPDATE payment_card
                                SET cvv = '$cvv' 
                                WHERE cardId = '$cardIden' AND userId = '$userId' ";
            $db->exec($change);
        }

        #full name
        $changequery5 = "SELECT cvv FROM payment_card
                        WHERE cardId = '$cardIden' AND userId = '$userId'
        ";
        $changestatement5 = $db->prepare($changequery5);
        #$changestatement5->execute();
        
        if ($changestatement5->execute() == 1) {
            $fName = filter_input(INPUT_POST, 'new_FullName');
            $change = "UPDATE payment_card
                        SET fullName = '$fName' 
                        WHERE cardId = '$cardIden' AND userId = '$userId'";
            $db->exec($change);
        }
        include("../HTML/edit-card.php");
    #} # if
?>