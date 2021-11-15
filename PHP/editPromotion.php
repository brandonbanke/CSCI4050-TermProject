<?php 
    require("../PHP/database.php");
    
    $promotionIden = filter_input(INPUT_POST, 'promotion_id');
    


    $changequery = "SELECT promoName FROM promotion
                        WHERE id= '$promotionIden'
                        ";
    $changestatement = $db->prepare($changequery);
    $changestatement->execute();
    $rowcount = $changestatement->rowCount();

    $pNameTitle = filter_input(INPUT_POST, 'new_pName');
    $changeNameTitle = "UPDATE promotion
    SET promoName = '$pNameTitle' WHERE id= '$promotionIden'";
    $db->exec($changeNameTitle);


    $changequery2 = "SELECT code FROM promotion
                        WHERE id= '$promotionIden'
                        ";
    $changestatement2 = $db->prepare($changequery2);
    $changestatement2->execute();
    $rowcount2 = $changestatement2->rowCount();

    $pCodeTitle = filter_input(INPUT_POST, 'new_pCode');
    $changeCodeTitle = "UPDATE promotion
    SET code = '$pCodeTitle' WHERE id= '$promotionIden'";
    $db->exec($changeCodeTitle);


    $changequery3 = "SELECT promDescription FROM promotion
                        WHERE id= '$promotionIden'
                        ";
    $changestatement3 = $db->prepare($changequery3);
    $changestatement3->execute();
    $rowcount3 = $changestatement3->rowCount();

    $pDescr = filter_input(INPUT_POST, 'new_pDescription');
    $changeDescrip = "UPDATE promotion
    SET promDescription = '$pDescr' WHERE id= '$promotionIden'";
    $db->exec($changeDescrip);

    header("Location: ../HTML/adminMenu.php");
?>