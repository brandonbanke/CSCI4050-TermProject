<?php 
    require("../PHP/database.php");
    

    $changequery = "SELECT firstName FROM payment_card
                        WHERE active = 1
                        ";
    $changestatement = $db->prepare($changequery);
    $changestatement->execute();
    $rowcount = $changestatement->rowCount();

    $fName = filter_input(INPUT_POST, 'new_firstName');
    $changeFirstName = "UPDATE user
    SET firstName = '$fName' WHERE active=1";
    $db->exec($changeFirstName);

?>