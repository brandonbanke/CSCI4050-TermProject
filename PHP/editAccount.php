<?php 
    require("../PHP/database.php");
    

    $changequery = "SELECT firstName FROM user
                        WHERE active = 1
                        ";
    $changestatement = $db->prepare($changequery);
    $changestatement->execute();
    $rowcount = $changestatement->rowCount();

    $fName = filter_input(INPUT_POST, 'new_firstName');
    $changeFirstName = "UPDATE user
    SET firstName = '$fName' WHERE active=1";
    $db->exec($changeFirstName);


    $changequery2 = "SELECT lastName FROM user
                        WHERE active = 1
                        ";
    $changestatement2 = $db->prepare($changequery2);
    $changestatement2->execute();
    $rowcount2 = $changestatement2->rowCount();

    $lName = filter_input(INPUT_POST, 'new_lastName');
    $changeLastName = "UPDATE user
    SET lastName = '$lName' WHERE active=1";
    $db->exec($changeLastName);


    $changequery3 = "SELECT userId FROM user
                        WHERE active = 1
                        ";
    $changestatement3 = $db->prepare($changequery3);
    $changestatement3->execute();
    $rowcount3 = $changestatement3->rowCount();

    $uName = filter_input(INPUT_POST, 'new_userId');
    $changeuserId = "UPDATE user
    SET userId = '$uName' WHERE active=1";
    $db->exec($changeuserId);

    include("../HTML/home.html");
?>