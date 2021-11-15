<?php 
    require("../PHP/database.php");
    
    $promoIden = filter_input(INPUT_POST, 'promotion_id');

    $changequery = "SELECT promoName FROM promotion
                        WHERE id= '$promoIden'
                        ";
    $changestatement = $db->prepare($changequery);
    $changestatement->execute();
    $rowcount = $changestatement->rowCount();

    $pNameTitle = filter_input(INPUT_POST, 'new_pName');
    $changePromoName = "UPDATE promotion
    SET promoName = '$pNameTitle' WHERE WHERE id= '$promoIden'";
    $db->exec($changePromoName);


    $changequery2 = "SELECT code FROM promotion
                        WHERE id= '$promoIden'
                        ";
    $changestatement2 = $db->prepare($changequery2);
    $changestatement2->execute();
    $rowcount2 = $changestatement2->rowCount();

    $pCodes = filter_input(INPUT_POST, 'new_pCode');
    $changePromoCode = "UPDATE promotion
    SET code = '$pCodes' WHERE WHERE id= '$promoIden'";
    $db->exec($changePromoCode);  
    
    $changequery3 = "SELECT promDescription FROM promotion
                        WHERE id= '$promoIden'
                        ";
    $changestatement3 = $db->prepare($changequery3);
    $changestatement3->execute();
    $rowcount3 = $changestatement3->rowCount();

    $pDescriptions = filter_input(INPUT_POST, 'new_pDescription');
    $changePromoDescription = "UPDATE promotion
    SET promDescription = '$pDescriptions' WHERE WHERE id= '$promoIden'";
    $db->exec($changePromoDescription);

    include("../HTML/adminMenu.php");
?>